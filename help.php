<?php
require_once 'include/connect.php';

$pageTitle = "Emergency Response - Kumbh Mela 2027";
$activePage = "help";

try {
    // Get all SOS alerts sorted by most recent
    $stmt = $pdo->query("SELECT id, latitude, longitude, accuracy, timestamp FROM sos_alerts ORDER BY timestamp DESC");
    $alerts = $stmt->fetchAll();
    
    // Get specific alert if ID is provided
    $alertId = $_GET['id'] ?? null;
    $selectedAlert = null;
    
    if ($alertId) {
        $stmt = $pdo->prepare("SELECT id, latitude, longitude, accuracy, timestamp FROM sos_alerts WHERE id = ?");
        $stmt->execute([$alertId]);
        $selectedAlert = $stmt->fetch();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <style>
        #map-container {
            height: 60vh;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }
        .alert-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 15px;
            border-left: 4px solid #dc3545;
            transition: all 0.3s ease;
        }
        .badge-emergency {
            background-color: #dc3545;
        }
        .alert-time {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .alert-location {
            margin: 10px 0;
            font-weight: 500;
        }
        .sos-list {
            max-height: 70vh;
            overflow-y: auto;
            padding-right: 10px;
        }
        .active-alert {
            background-color: #fff8f8;
            border-left: 4px solid #ff6b6b;
            transform: scale(1.02);
        }
        .coordinates-info {
            font-family: monospace;
            background: #f8f9fa;
            padding: 5px;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        .distance-info {
            background: #e9f7ef;
            padding: 8px;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: 500;
        }
        .leaflet-routing-container {
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            max-height: 200px;
            overflow-y: auto;
        }
        .pulse-icon {
            display: block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #dc3545;
            box-shadow: 0 0 0 rgba(220, 53, 69, 0.7);
            animation: pulse 1.5s infinite;
            position: relative;
        }
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(220, 53, 69, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
            }
        }
        .responder-icon {
            display: block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #007bff;
            box-shadow: 0 0 0 rgba(0, 123, 255, 0.7);
            animation: pulse-blue 1.5s infinite;
            position: relative;
        }
        @keyframes pulse-blue {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(0, 123, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
            }
        }
        .route-instructions {
            max-height: 200px;
            overflow-y: auto;
            background: white;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .instruction-step {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        .instruction-step:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <main class="container py-4">
        <h1 class="text-center mb-4">Emergency Response Dashboard</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <div class="row">
            <!-- SOS Alerts List -->
            <div class="col-md-4">
                <h4><i class="bi bi-exclamation-triangle"></i> Active Emergency Alerts</h4>
                <div class="sos-list">
                    <?php if (count($alerts) > 0): ?>
                        <?php foreach ($alerts as $alert): ?>
                            <div class="alert-card <?php echo ($selectedAlert && $selectedAlert['id'] == $alert['id']) ? 'active-alert' : ''; ?>">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5>
                                        <span class="badge badge-emergency">SOS</span>
                                        Alert #<?php echo $alert['id']; ?>
                                    </h5>
                                    <span class="alert-time">
                                        <?php echo date('g:i A', strtotime($alert['timestamp'])); ?>
                                    </span>
                                </div>
                                
                                <?php if ($alert['latitude'] && $alert['longitude']): ?>
                                    <div class="alert-location">
                                        <i class="bi bi-geo-alt"></i> 
                                        <span class="coordinates-info">
                                            <?php echo round($alert['latitude'], 6); ?>, <?php echo round($alert['longitude'], 6); ?>
                                            <?php if ($alert['accuracy']): ?>
                                                <br><small>±<?php echo round($alert['accuracy']); ?>m accuracy</small>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                <?php else: ?>
                                    <div class="alert-location text-warning">
                                        <i class="bi bi-exclamation-triangle"></i> 
                                        No location data
                                    </div>
                                <?php endif; ?>
                                
                                <div class="alert-actions">
                                    <a href="help.php?id=<?php echo $alert['id']; ?>" 
                                       class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-compass"></i> Get Directions
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info">
                            <i class="bi bi-check-circle"></i> No active emergency alerts
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Map and Directions -->
            <div class="col-md-8">
                <?php if ($selectedAlert): ?>
                    <?php if ($selectedAlert['latitude'] && $selectedAlert['longitude']): ?>
                        <div id="map-container"></div>
                        <div class="alert alert-info">
                            <i class="bi bi-compass"></i> 
                            <strong>Emergency Location:</strong>
                            <span class="coordinates-info">
                                <?php echo round($selectedAlert['latitude'], 6); ?>, <?php echo round($selectedAlert['longitude'], 6); ?>
                                <?php if ($selectedAlert['accuracy']): ?>
                                    (Accuracy: ±<?php echo round($selectedAlert['accuracy']); ?>m)
                                <?php endif; ?>
                            </span>
                            <div id="distance-info" class="distance-info mt-2 d-none">
                                <i class="bi bi-signpost"></i> 
                                <span id="distance-text"></span> away - 
                                <span id="time-text"></span> estimated travel time
                            </div>
                        </div>
                        
                        <div id="route-instructions" class="route-instructions d-none">
                            <h6><i class="bi bi-list-ol"></i> Route Instructions</h6>
                            <div id="instructions-list"></div>
                        </div>

                        <!-- Leaflet JS -->
                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                        <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
                        <script>
                            // Initialize map centered on emergency location
                            const map = L.map('map-container').setView(
                                [<?php echo $selectedAlert['latitude']; ?>, <?php echo $selectedAlert['longitude']; ?>], 
                                16
                            );
                            
                            // Add OpenStreetMap base layer
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);
                            
                            // Create custom icons
                            const emergencyIcon = L.divIcon({
                                className: 'pulse-icon',
                                iconSize: [20, 20],
                                iconAnchor: [10, 10]
                            });
                            
                            const responderIcon = L.divIcon({
                                className: 'responder-icon',
                                iconSize: [20, 20],
                                iconAnchor: [10, 10]
                            });
                            
                            // Add emergency marker with pulsing effect
                            const emergencyMarker = L.marker(
                                [<?php echo $selectedAlert['latitude']; ?>, <?php echo $selectedAlert['longitude']; ?>],
                                {
                                    icon: emergencyIcon,
                                    zIndexOffset: 1000
                                }
                            ).addTo(map).bindPopup("<b>Emergency Location</b><br>Alert #<?php echo $selectedAlert['id']; ?>");
                            
                            // Add accuracy circle if available
                            <?php if ($selectedAlert['accuracy']): ?>
                                L.circle(
                                    [<?php echo $selectedAlert['latitude']; ?>, <?php echo $selectedAlert['longitude']; ?>],
                                    {
                                        radius: <?php echo $selectedAlert['accuracy']; ?>,
                                        color: '#dc3545',
                                        fillColor: '#f03',
                                        fillOpacity: 0.2
                                    }
                                ).addTo(map);
                            <?php endif; ?>
                            
                            // Initialize routing control
                            const control = L.Routing.control({
                                waypoints: [
                                    L.latLng(0, 0), // Temporary start point
                                    L.latLng(<?php echo $selectedAlert['latitude']; ?>, <?php echo $selectedAlert['longitude']; ?>)
                                ],
                                routeWhileDragging: true,
                                showAlternatives: false,
                                collapsible: true,
                                addWaypoints: false,
                                draggableWaypoints: false,
                                lineOptions: {
                                    styles: [{color: '#dc3545', opacity: 0.8, weight: 6}]
                                },
                                createMarker: function() { return null; }, // Disable default markers
                                formatter: new L.Routing.Formatter({
                                    language: 'en',
                                    units: 'metric'
                                })
                            }).addTo(map);
                            
                            // Store route instructions
                            let routeInstructions = [];
                            
                            // Listen for route changes
                            control.on('routesfound', function(e) {
                                const routes = e.routes;
                                const route = routes[0];
                                
                                // Update distance and time info
                                document.getElementById('distance-info').classList.remove('d-none');
                                document.getElementById('distance-text').textContent = 
                                    (route.summary.totalDistance / 1000).toFixed(1) + ' km';
                                document.getElementById('time-text').textContent = 
                                    Math.round(route.summary.totalTime / 60) + ' minutes';
                                
                                // Update route instructions
                                document.getElementById('route-instructions').classList.remove('d-none');
                                const instructionsList = document.getElementById('instructions-list');
                                instructionsList.innerHTML = '';
                                
                                routeInstructions = route.instructions;
                                routeInstructions.forEach((instruction, index) => {
                                    const step = document.createElement('div');
                                    step.className = 'instruction-step';
                                    step.innerHTML = `
                                        <strong>${index + 1}.</strong> ${instruction.text}
                                        <small class="text-muted d-block">${(instruction.distance / 1000).toFixed(1)} km</small>
                                    `;
                                    instructionsList.appendChild(step);
                                });
                            });
                            
                            // Track responder's location
                            if (navigator.geolocation) {
                                navigator.geolocation.watchPosition(
                                    (position) => {
                                        const responderLocation = L.latLng(
                                            position.coords.latitude, 
                                            position.coords.longitude
                                        );
                                        
                                        // Update route start point
                                        control.spliceWaypoints(0, 1, responderLocation);
                                        
                                        // Add/update responder marker
                                        if (!window.responderMarker) {
                                            window.responderMarker = L.marker(responderLocation, {
                                                icon: responderIcon,
                                                zIndexOffset: 900
                                            }).addTo(map).bindPopup("<b>Your Location</b>");
                                            
                                            // Add accuracy circle
                                            if (position.coords.accuracy) {
                                                window.accuracyCircle = L.circle(responderLocation, {
                                                    radius: position.coords.accuracy,
                                                    color: '#007bff',
                                                    fillColor: '#007bff',
                                                    fillOpacity: 0.2
                                                }).addTo(map);
                                            }
                                        } else {
                                            window.responderMarker.setLatLng(responderLocation);
                                            if (window.accuracyCircle) {
                                                window.accuracyCircle.setLatLng(responderLocation);
                                                window.accuracyCircle.setRadius(position.coords.accuracy);
                                            }
                                        }
                                        
                                        // Auto-center map to show both points if they're far apart
                                        const bounds = L.latLngBounds([responderLocation, emergencyMarker.getLatLng()]);
                                        map.fitBounds(bounds, { padding: [50, 50] });
                                    },
                                    (error) => {
                                        console.error('Geolocation error:', error);
                                        document.querySelector('.alert-info').innerHTML += `
                                            <div class="mt-2 text-danger">
                                                <i class="bi bi-exclamation-triangle"></i>
                                                Error getting location: ${error.message}
                                            </div>
                                        `;
                                    },
                                    {
                                        enableHighAccuracy: true,
                                        maximumAge: 0,
                                        timeout: 10000
                                    }
                                );
                            } else {
                                document.querySelector('.alert-info').innerHTML += `
                                    <div class="mt-2 text-danger">
                                        <i class="bi bi-exclamation-triangle"></i>
                                        Geolocation not supported by this browser
                                    </div>
                                `;
                            }
                            
                            // Add zoom control to show all markers
                            map.on('zoomend', function() {
                                if (window.responderMarker && emergencyMarker) {
                                    const bounds = L.latLngBounds([
                                        window.responderMarker.getLatLng(), 
                                        emergencyMarker.getLatLng()
                                    ]);
                                    if (!map.getBounds().contains(bounds)) {
                                        map.fitBounds(bounds, { padding: [50, 50] });
                                    }
                                }
                            });
                        </script>
                    <?php else: ?>
                        <div class="alert alert-warning text-center py-5">
                            <i class="bi bi-exclamation-triangle-fill" style="font-size: 2rem;"></i>
                            <h4 class="mt-3">No Location Data Available</h4>
                            <p>This emergency alert was sent without location information.</p>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center py-5">
                        <i class="bi bi-compass" style="font-size: 2rem;"></i>
                        <h4 class="mt-3">Select an Emergency Alert</h4>
                        <p>Choose an alert from the list to view directions.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>