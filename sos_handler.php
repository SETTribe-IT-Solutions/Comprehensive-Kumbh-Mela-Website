<?php
require_once 'include/connect.php';

header('Content-Type: application/json');

// Process SOS alert if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sos_alert'])) {
    try {
        // Validate and sanitize location data
        $latitude = isset($_POST['latitude']) ? (float)$_POST['latitude'] : null;
        $longitude = isset($_POST['longitude']) ? (float)$_POST['longitude'] : null;
        $accuracy = isset($_POST['accuracy']) ? (float)$_POST['accuracy'] : null;
        
        // Validate coordinates if provided
        if ($latitude !== null && $longitude !== null) {
            if ($latitude < -90 || $latitude > 90 || $longitude < -180 || $longitude > 180) {
                throw new Exception('Invalid coordinates received');
            }
            
            // Additional validation for obviously wrong coordinates (0,0)
            if (abs($latitude) < 0.0001 && abs($longitude) < 0.0001) {
                throw new Exception('Invalid zero coordinates received');
            }
        }
        
        $timestamp = date('Y-m-d H:i:s');
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Start transaction
        $pdo->beginTransaction();

        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO sos_alerts 
                              (latitude, longitude, accuracy, timestamp, ip_address, user_agent) 
                              VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$latitude, $longitude, $accuracy, $timestamp, $ip_address, $user_agent]);

        $alert_id = $pdo->lastInsertId();
        
        // If we have coordinates, try to get approximate address
        $address = null;
        if ($latitude && $longitude) {
            try {
                $address = getApproximateAddress($latitude, $longitude);
                
                // Update record with address if available
                if ($address) {
                    $updateStmt = $pdo->prepare("UPDATE sos_alerts SET approximate_address = ? WHERE id = ?");
                    $updateStmt->execute([$address, $alert_id]);
                }
            } catch (Exception $e) {
                // Silently fail geocoding - it's optional
                error_log("Geocoding failed: " . $e->getMessage());
            }
        }

        // Commit transaction
        $pdo->commit();

        // Prepare response
        $response = [
            'status' => 'success',
            'message' => 'Emergency alert received. Help is on the way!',
            'alert_id' => $alert_id,
            'location_received' => ($latitude !== null && $longitude !== null),
            'approximate_address' => $address
        ];
        
        // Send notifications (in background if possible)
        sendNotifications($alert_id, $latitude, $longitude, $address);
        
        echo json_encode($response);
        exit;
        
    } catch (Exception $e) {
        // Rollback transaction if there was an error
        if (isset($pdo) && $pdo->inTransaction()) {
            $pdo->rollBack();
        }
        
        error_log("SOS Handler Error: " . $e->getMessage());
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => 'Could not process emergency alert. Please try again.',
            'error' => $e->getMessage(),
            'error_type' => get_class($e)
        ]);
        exit;
    }
}

/**
 * Get approximate address from coordinates using Nominatim (OpenStreetMap)
 */
function getApproximateAddress($latitude, $longitude) {
    $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$latitude&lon=$longitude&zoom=18&addressdetails=1";
    
    $options = [
        'http' => [
            'header' => "User-Agent: KumbhMelaSOSApp\r\n"
        ]
    ];
    
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    
    if ($response === false) {
        throw new Exception('Geocoding service unavailable');
    }
    
    $data = json_decode($response, true);
    
    if (isset($data['error'])) {
        throw new Exception($data['error']['message']);
    }
    
    // Format a simple address string
    $addressParts = [];
    if (isset($data['address']['road'])) $addressParts[] = $data['address']['road'];
    if (isset($data['address']['suburb'])) $addressParts[] = $data['address']['suburb'];
    if (isset($data['address']['city'])) $addressParts[] = $data['address']['city'];
    if (isset($data['address']['state'])) $addressParts[] = $data['address']['state'];
    if (isset($data['address']['country'])) $addressParts[] = $data['address']['country'];
    
    return implode(', ', $addressParts);
}

/**
 * Send notifications to emergency responders
 */
function sendNotifications($alert_id, $latitude, $longitude, $address = null) {
    // In a real implementation, this would connect to your notification system
    // For now, we'll just log it
    
    $message = "New SOS Alert #$alert_id";
    if ($latitude && $longitude) {
        $message .= " at coordinates $latitude,$longitude";
        if ($address) {
            $message .= " ($address)";
        }
        $message .= " - https://www.google.com/maps?q=$latitude,$longitude";
    } else {
        $message .= " (no location data)";
    }
    
    error_log($message);
    
    // In production, you would:
    // 1. Send SMS to emergency responders
    // 2. Send push notifications
    // 3. Trigger alarms if needed
}

// If not a POST request
http_response_code(405);
echo json_encode([
    'status' => 'error',
    'message' => 'Method not allowed'
]);
exit;