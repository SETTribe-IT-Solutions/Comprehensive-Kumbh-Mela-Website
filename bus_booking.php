<?php
// Start session to store search parameters if needed
session_start();

// Include the database connection
require 'include/connect.php';
include 'include/header.php';
include 'include/navbar.php';

// --- 1. GET SEARCH, FILTER & SORT PARAMETERS ---

// Get main search parameters (from a previous form on travel.php, for example)
// Use htmlspecialchars for security when displaying user input
$from_city = isset($_GET['from']) ? htmlspecialchars($_GET['from']) : 'Mumbai';
$to_city = isset($_GET['to']) ? htmlspecialchars($_GET['to']) : 'Nashik';
$search_date = isset($_GET['date']) ? htmlspecialchars($_GET['date']) : '2025-07-03';
// Format date for display
$display_date = date("d M Y", strtotime($search_date));

// Get filter parameters
$departure_times = isset($_GET['departure_time']) ? $_GET['departure_time'] : [];
$bus_types = isset($_GET['bus_type']) ? $_GET['bus_type'] : [];
$amenities = isset($_GET['amenities']) ? $_GET['amenities'] : [];

// Get sort parameter
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'departure';


// --- 2. BUILD THE DYNAMIC SQL QUERY ---

$sql = "SELECT s.*, b.operator_name, b.bus_type_description, b.amenities as bus_amenities
        FROM schedules s
        JOIN buses b ON s.bus_id = b.id
        WHERE s.source_city = ? AND s.destination_city = ?";

$params = [$from_city, $to_city];
$param_types = "ss";
$conditions = [];

// -- Filter by Departure Time --
if (!empty($departure_times)) {
    $time_conditions = [];
    foreach ($departure_times as $time) {
        if ($time == 'before6') $time_conditions[] = "HOUR(s.departure_time) < 6";
        if ($time == '6to12') $time_conditions[] = "HOUR(s.departure_time) BETWEEN 6 AND 11";
        if ($time == '12to18') $time_conditions[] = "HOUR(s.departure_time) BETWEEN 12 AND 17";
        if ($time == 'after18') $time_conditions[] = "HOUR(s.departure_time) >= 18";
    }
    if (!empty($time_conditions)) {
        $conditions[] = "(" . implode(" OR ", $time_conditions) . ")";
    }
}

// -- Filter by Bus Type --
if (!empty($bus_types)) {
    $type_conditions = [];
    if (in_array('ac', $bus_types)) $type_conditions[] = "b.is_ac = 1";
    if (in_array('nonac', $bus_types)) $type_conditions[] = "b.is_ac = 0";
    if (in_array('seater', $bus_types)) $type_conditions[] = "b.is_seater = 1";
    if (in_array('sleeper', $bus_types)) $type_conditions[] = "b.is_sleeper = 1";
    
    if (!empty($type_conditions)) {
        $conditions[] = "(" . implode(" OR ", $type_conditions) . ")";
    }
}

// -- Filter by Amenities --
if (!empty($amenities)) {
    foreach ($amenities as $amenity) {
        $conditions[] = "b.amenities LIKE ?";
        $params[] = '%' . $amenity . '%';
        $param_types .= "s";
    }
}


// Append conditions to the main SQL query
if (count($conditions) > 0) {
    $sql .= " AND " . implode(" AND ", $conditions);
}


// -- Add Sorting --
$order_by = " ORDER BY ";
switch ($sort_by) {
    case 'duration':
        $order_by .= "s.duration_minutes ASC";
        break;
    case 'arrival':
        $order_by .= "s.arrival_time ASC";
        break;
    case 'ratings':
        $order_by .= "s.rating DESC";
        break;
    case 'price':
        $order_by .= "s.price ASC";
        break;
    case 'departure':
    default:
        $order_by .= "s.departure_time ASC";
        break;
}
$sql .= $order_by;


// --- 3. EXECUTE THE QUERY ---
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

if (!empty($params)) {
    $stmt->bind_param($param_types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$buses = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();

// Helper function to format duration
function format_duration($minutes) {
    $hours = floor($minutes / 60);
    $mins = $minutes % 60;
    return sprintf('%02dh %02dm', $hours, $mins);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Search Results - Kumbh Mela 2027</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=43">
</head>
<body>

<main>
    <!-- ================== SEARCH SUMMARY BAR (DYNAMIC) ================== -->
    <section class="search-summary-bar shadow-sm">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <div class="search-details">
                <span class="fw-bold fs-5"><?= $from_city ?></span>
                <i class="bi bi-arrow-right mx-2"></i>
                <span class="fw-bold fs-5"><?= $to_city ?></span>
                <span class="vr mx-3"></span>
                <i class="bi bi-calendar3 me-2"></i>
                <span><?= $display_date ?></span>
            </div>
            <a href="travel.php" class="btn btn-outline-danger">Modify Search</a>
        </div>
    </section>

    <!-- ================== RESULTS & FILTERS ================== -->
    <div class="container section-padding">
        <div class="row">
            <!-- ===== FILTERS SIDEBAR (Left Column) ===== -->
            <div class="col-lg-3">
                <!-- Use a form to submit filters. The page will reload with the new filter parameters. -->
                <form action="bus-results.php" method="GET" id="filterForm">
                    <!-- Hidden fields to retain main search query -->
                    <input type="hidden" name="from" value="<?= $from_city ?>">
                    <input type="hidden" name="to" value="<?= $to_city ?>">
                    <input type="hidden" name="date" value="<?= $search_date ?>">

                    <div class="filters-sidebar">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Filter By</h5>
                            <a href="bus-results.php?from=<?= $from_city ?>&to=<?= $to_city ?>&date=<?= $search_date ?>" class="text-decoration-none small">Clear All</a>
                        </div>
                        
                        <div class="accordion" id="filterAccordion">
                            <!-- Departure Time Filter -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDeparture">Departure Time</button>
                                </h2>
                                <div id="collapseDeparture" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="departure_time[]" value="before6" id="time1" onchange="this.form.submit()" <?= in_array('before6', $departure_times) ? 'checked' : '' ?>><label class="form-check-label" for="time1">Before 6 AM</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="departure_time[]" value="6to12" id="time2" onchange="this.form.submit()" <?= in_array('6to12', $departure_times) ? 'checked' : '' ?>><label class="form-check-label" for="time2">6 AM to 12 PM</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="departure_time[]" value="12to18" id="time3" onchange="this.form.submit()" <?= in_array('12to18', $departure_times) ? 'checked' : '' ?>><label class="form-check-label" for="time3">12 PM to 6 PM</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="departure_time[]" value="after18" id="time4" onchange="this.form.submit()" <?= in_array('after18', $departure_times) ? 'checked' : '' ?>><label class="form-check-label" for="time4">After 6 PM</label></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bus Type Filter -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBusType">Bus Type</button>
                                </h2>
                                <div id="collapseBusType" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="bus_type[]" value="ac" id="typeAC" onchange="this.form.submit()" <?= in_array('ac', $bus_types) ? 'checked' : '' ?>><label class="form-check-label" for="typeAC">AC</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="bus_type[]" value="nonac" id="typeNonAC" onchange="this.form.submit()" <?= in_array('nonac', $bus_types) ? 'checked' : '' ?>><label class="form-check-label" for="typeNonAC">Non-AC</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="bus_type[]" value="seater" id="typeSeater" onchange="this.form.submit()" <?= in_array('seater', $bus_types) ? 'checked' : '' ?>><label class="form-check-label" for="typeSeater">Seater</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="bus_type[]" value="sleeper" id="typeSleeper" onchange="this.form.submit()" <?= in_array('sleeper', $bus_types) ? 'checked' : '' ?>><label class="form-check-label" for="typeSleeper">Sleeper</label></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Amenities Filter -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAmenities">Amenities</button>
                                </h2>
                                <div id="collapseAmenities" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="amenities[]" value="wifi" id="amenityWifi" onchange="this.form.submit()" <?= in_array('wifi', $amenities) ? 'checked' : '' ?>><label class="form-check-label" for="amenityWifi"><i class="bi bi-wifi"></i> Wi-Fi</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="amenities[]" value="charging" id="amenityCharging" onchange="this.form.submit()" <?= in_array('charging', $amenities) ? 'checked' : '' ?>><label class="form-check-label" for="amenityCharging"><i class="bi bi-battery-charging"></i> Charging Point</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="amenities[]" value="water" id="amenityWater" onchange="this.form.submit()" <?= in_array('water', $amenities) ? 'checked' : '' ?>><label class="form-check-label" for="amenityWater"><i class="bi bi-droplet-fill"></i> Water Bottle</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="amenities[]" value="gps" id="amenityGPS" onchange="this.form.submit()" <?= in_array('gps', $amenities) ? 'checked' : '' ?>><label class="form-check-label" for="amenityGPS"><i class="bi bi-geo-alt-fill"></i> Live Tracking</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- ===== BUS LISTINGS (Right Column - DYNAMIC) ===== -->
            <div class="col-lg-9">
                <!-- Sort Bar -->
                <div class="sort-bar d-flex justify-content-between align-items-center p-3 mb-3 rounded shadow-sm">
                    <span class="fw-bold">Showing <?= count($buses) ?> Buses</span>
                    <div class="sort-options">
                        <span class="me-3">Sort by:</span>
                        <?php
                            // Build the base URL for sorting links, preserving existing filters
                            $query_params = $_GET;
                        ?>
                        <a href="?<?= http_build_query(array_merge($query_params, ['sort' => 'departure'])) ?>" class="sort-option <?= $sort_by == 'departure' ? 'active' : '' ?>">Departure</a>
                        <a href="?<?= http_build_query(array_merge($query_params, ['sort' => 'duration'])) ?>" class="sort-option <?= $sort_by == 'duration' ? 'active' : '' ?>">Duration</a>
                        <a href="?<?= http_build_query(array_merge($query_params, ['sort' => 'arrival'])) ?>" class="sort-option <?= $sort_by == 'arrival' ? 'active' : '' ?>">Arrival</a>
                        <a href="?<?= http_build_query(array_merge($query_params, ['sort' => 'ratings'])) ?>" class="sort-option <?= $sort_by == 'ratings' ? 'active' : '' ?>">Ratings</a>
                        <a href="?<?= http_build_query(array_merge($query_params, ['sort' => 'price'])) ?>" class="sort-option <?= $sort_by == 'price' ? 'active' : '' ?>">Price</a>
                    </div>
                </div>

                <?php if (count($buses) > 0): ?>
                    <?php foreach ($buses as $bus): ?>
                        <!-- Bus Card (Generated by PHP Loop) -->
                        <div class="bus-card card shadow-sm mb-3">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="fw-bold bus-operator-name"><?= htmlspecialchars($bus['operator_name']) ?></h5>
                                        <p class="text-muted small">
                                            <?= htmlspecialchars($bus['bus_type_description']) ?> | 
                                            <?= $bus['seats_left'] ?> Seats Left | 
                                            <?= $bus['window_seats_left'] ?> Window
                                        </p>
                                        <div class="d-flex align-items-center mt-3 bus-timing">
                                            <div>
                                                <span class="fs-5 fw-bold"><?= date('H:i', strtotime($bus['departure_time'])) ?></span>
                                                <p class="small text-muted mb-0"><?= htmlspecialchars($bus['departure_point']) ?></p>
                                            </div>
                                            <div class="timeline mx-4"></div>
                                            <div class="text-center">
                                                <p class="small text-muted mb-0"><?= format_duration($bus['duration_minutes']) ?></p>
                                            </div>
                                            <div class="timeline mx-4"></div>
                                            <div>
                                                <span class="fs-5 fw-bold"><?= date('H:i', strtotime($bus['arrival_time'])) ?></span>
                                                <p class="small text-muted mb-0"><?= htmlspecialchars($bus['arrival_point']) ?></p>
                                            </div>
                                            <div class="ms-4">
                                                <span class="badge bg-success-subtle text-success-emphasis rounded-pill p-2"><i class="bi bi-star-fill"></i> <?= $bus['rating'] ?></span>
                                                <p class="small text-muted mb-0"><?= $bus['rating_count'] ?> Ratings</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-end d-flex flex-column justify-content-between">
                                        <div>
                                            <p class="mb-0 small">Starts from</p>
                                            <span class="fw-bold fs-4 price-tag">₹ <?= number_format($bus['price']) ?></span>
                                        </div>
                                        <a href="seat-selection.php?schedule_id=<?= $bus['id'] ?>" class="btn btn-brand w-100 mt-3">View Seats</a>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="card-footer-links d-flex gap-4 small">
                                    <a href="#">Amenities</a>
                                    <a href="#">Boarding & Dropping Points</a>
                                    <a href="#">Reviews</a>
                                    <a href="#">Policies</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- No Buses Found Message -->
                    <div class="card shadow-sm">
                        <div class="card-body text-center p-5">
                            <h4 class="fw-bold">No Buses Found</h4>
                            <p class="text-muted">We couldn't find any buses matching your search criteria. Try modifying your search or clearing the filters.</p>
                            <a href="travel.php" class="btn btn-brand">Modify Search</a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'include/footer.php'; ?>