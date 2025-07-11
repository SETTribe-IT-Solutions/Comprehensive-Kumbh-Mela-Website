<?php
require_once 'connect.php';

try {
    $stmt = $pdo->query("SELECT id, latitude, longitude, accuracy, timestamp, status FROM sos_alerts ORDER BY timestamp DESC");
    $alerts = $stmt->fetchAll();
    
    $alertId = $_GET['id'] ?? null;
    
    if (count($alerts) > 0) {
        foreach ($alerts as $alert) {
            $isActive = ($alertId && $alertId == $alert['id']) ? 'active-alert' : '';
            $isResolved = ($alert['status'] == 'resolved') ? 'resolved' : '';
            ?>
            <div class="alert-card <?php echo $isActive; ?> <?php echo $isResolved; ?>">
                <div class="d-flex justify-content-between align-items-start">
                    <h5>
                        <?php if ($alert['status'] == 'resolved'): ?>
                            <span class="badge badge-resolved"><i class="bi bi-check-circle"></i> Resolved</span>
                        <?php else: ?>
                            <span class="badge badge-emergency">SOS</span>
                        <?php endif; ?>
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
                
                <div class="alert-actions mt-2">
                    <a href="help.php?id=<?php echo $alert['id']; ?>" 
                       class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-compass"></i> Get Directions
                    </a>
                    <?php if ($alert['status'] != 'resolved'): ?>
                        <form method="post" style="display: inline-block;" class="mark-resolved-form" data-alert-id="<?php echo $alert['id']; ?>">
                            <input type="hidden" name="alert_id" value="<?php echo $alert['id']; ?>">
                            <button type="submit" name="mark_resolved" class="btn btn-sm btn-success ms-1">
                                <i class="bi bi-check-circle"></i> Mark Resolved
                            </button>
                        </form>
                    <?php else: ?>
                        <span class="resolved-icon"><i class="bi bi-check-circle-fill"></i></span>
                        <small class="text-success">Resolved</small>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<div class="alert alert-info"><i class="bi bi-check-circle"></i> No active emergency alerts</div>';
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Error loading alerts</div>';
}
?>