

    // =========================================================
    // ---  TRAVEL PAGE: ALL INTERACTIVE FORMS ---
    // =========================================================
    // This guard ensures the following code only runs on the travel page
    if (document.getElementById('transportTabs')) {

        // --- A. Journey Date Picker Logic ---
        const setupDatePicker = (type) => {
            const displaySpan = document.getElementById(`selected-date-${type}`);
            const dateInput = document.getElementById(`journey-date-${type}`);
            const todayBtn = document.getElementById(`btn-today-${type}`);
            const tomorrowBtn = document.getElementById(`btn-tomorrow-${type}`);

            if (!displaySpan || !dateInput || !todayBtn || !tomorrowBtn) return;

            const dateContainer = displaySpan.parentElement;
            dateContainer.style.cursor = 'pointer';

            const formatDisplayDate = (date) => date.toLocaleDateString("en-GB", { day: "2-digit", month: "short", year: "numeric" });
            const formatInputDate = (date) => date.toISOString().split('T')[0];

            const updateDate = (newDate) => {
                displaySpan.textContent = formatDisplayDate(newDate);
                dateInput.value = formatInputDate(newDate);
                dateInput.min = formatInputDate(new Date());
            };

            dateContainer.addEventListener('click', () => {
                try { dateInput.showPicker(); } catch (e) { dateInput.click(); }
            });

            dateInput.addEventListener('change', () => {
                if(dateInput.value) {
                     const selectedDate = new Date(dateInput.value + 'T00:00:00');
                     displaySpan.textContent = formatDisplayDate(selectedDate);
                }
            });

            todayBtn.addEventListener('click', () => updateDate(new Date()));
            tomorrowBtn.addEventListener('click', () => {
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                updateDate(tomorrow);
            });

            updateDate(new Date()); // Initialize
        };

        ['bus', 'train', 'flight'].forEach(setupDatePicker);


        // --- B. Accommodation Multi-Select Dropdown Logic ---
        const accommodationDropdownBtn = document.getElementById('accommodation-type-dropdown');
        if (accommodationDropdownBtn) {
            const accommodationCheckboxes = document.querySelectorAll('.dropdown-menu .form-check-input[name="accommodation_type[]"]');
            
            const updateDropdownText = () => {
                const selectedLabels = Array.from(accommodationCheckboxes)
                    .filter(cb => cb.checked)
                    .map(cb => document.querySelector(`label[for='${cb.id}']`).textContent.trim());

                if (selectedLabels.length === 0) {
                    accommodationDropdownBtn.textContent = 'All Types';
                } else if (selectedLabels.length === 1) {
                    accommodationDropdownBtn.textContent = selectedLabels[0];
                } else {
                    accommodationDropdownBtn.textContent = `${selectedLabels.length} types selected`;
                }
            };
            
            accommodationCheckboxes.forEach(checkbox => checkbox.addEventListener('change', updateDropdownText));
            updateDropdownText(); // Initialize
        }
        
        // --- C. Accommodation Check-in/Check-out Validation ---
        const checkinDateEl = document.getElementById('checkin-date');
        const checkoutDateEl = document.getElementById('checkout-date');
        if(checkinDateEl && checkoutDateEl) {
            const todayStr = new Date().toISOString().split('T')[0];
            checkinDateEl.min = todayStr;
            checkoutDateEl.min = todayStr;

            checkinDateEl.addEventListener('input', () => {
                if (checkinDateEl.value) {
                    let nextDay = new Date(checkinDateEl.value);
                    nextDay.setDate(nextDay.getDate() + 1);
                    const minCheckoutDate = nextDay.toISOString().split('T')[0];
                    checkoutDateEl.min = minCheckoutDate;
                    if(checkoutDateEl.value && checkoutDateEl.value < minCheckoutDate) {
                        checkoutDateEl.value = '';
                    }
                }
            });
        }
    }

    

   document.addEventListener('DOMContentLoaded', function() {

    // --- 1. DATA SOURCE ---
    // In a real app, you would fetch this from your server/API
    const cities = [
        "Mumbai", "Delhi", "Bengaluru", "Hyderabad", "Ahmedabad", "Chennai",
        "Kolkata", "Surat", "Pune", "Jaipur", "Lucknow", "Kanpur", "Nagpur",
        "Indore", "Thane", "Bhopal", "Visakhapatnam", "Patna", "Vadodara"
    ];

    // --- 2. GET DOM ELEMENTS ---
    const busSearchForm = document.getElementById('bus-search-form');
    const fromInput = document.getElementById('bus-from');
    const toInput = document.getElementById('bus-to'); // Get the 'To' input
    const dateDisplay = document.getElementById('selected-date-bus'); // Get the date span
    const suggestionsPanel = document.getElementById('from-suggestions');

    // --- 3. AUTOCOMPLETE LOGIC (This part is unchanged) ---
    fromInput.addEventListener('input', function() {
        const inputText = fromInput.value.toLowerCase();
        suggestionsPanel.innerHTML = '';
        fromInput.classList.remove('is-invalid');
        if (inputText.length === 0) {
            suggestionsPanel.style.display = 'none';
            return;
        }
        const filteredCities = cities.filter(city =>
            city.toLowerCase().startsWith(inputText)
        );
        if (filteredCities.length > 0) {
            filteredCities.forEach(city => {
                const suggestionItem = document.createElement('a');
                suggestionItem.href = '#';
                suggestionItem.className = 'list-group-item list-group-item-action';
                suggestionItem.textContent = city;
                suggestionItem.addEventListener('click', function(e) {
                    e.preventDefault();
                    fromInput.value = city;
                    suggestionsPanel.innerHTML = '';
                    suggestionsPanel.style.display = 'none';
                });
                suggestionsPanel.appendChild(suggestionItem);
            });
            suggestionsPanel.style.display = 'block';
        } else {
            suggestionsPanel.style.display = 'none';
        }
    });

    // Hide suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (e.target !== fromInput) {
            suggestionsPanel.style.display = 'none';
        }
    });


    // --- 4. FORM SUBMISSION VALIDATION & REDIRECT (This is the updated section) ---
    busSearchForm.addEventListener('submit', function(event) {
        // Stop the form from submitting by default
        event.preventDefault();
        event.stopPropagation();
        
        const fromCity = fromInput.value;

        // The core validation logic: Is the input value in our list of valid cities?
        if (cities.includes(fromCity)) {
            // It's a valid city!
            console.log('Validation successful! Preparing to redirect.');
            fromInput.classList.remove('is-invalid');
            
            // --- NEW REDIRECT LOGIC ---
            // 1. Get all the values from the form
            const toCity = toInput.value;
            const journeyDate = dateDisplay.textContent.trim(); // "03 Jul, 2025"

            // 2. Build the URL with parameters in a safe way (handles special characters)
            const params = new URLSearchParams();
            params.append('from', fromCity);
            params.append('to', toCity);
            params.append('date', journeyDate);
            
            const redirectUrl = `bus_booking.php?${params.toString()}`;

            console.log(`Redirecting to: ${redirectUrl}`);

            // 3. Perform the redirect
            window.location.href = redirectUrl;

        } else {
            // It's NOT a valid city!
            console.log('Validation failed: The city is not in the list.');
            
            // Add Bootstrap's invalid class to show the error message and red border
            fromInput.classList.add('is-invalid');
            
            // Focus the input to draw the user's attention to it
            fromInput.focus();
        }
    });

});




// Bus_booking page

 document.addEventListener('DOMContentLoaded', function() {
            const busSearchForm = document.getElementById('bus-search-form');
            const initialSearchSection = document.getElementById('initial-search-section');
            const busResultsSection = document.getElementById('bus-results-section');
            const modifySearchBtn = document.getElementById('modify-search-btn');
            const busListingsContainer = document.getElementById('bus-listings-container');
            
            // --- 1. Handle Bus Search ---
            busSearchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const fromCity = document.getElementById('bus-from').value;
                const date = document.getElementById('journey-date-bus').value;
                
                if (!fromCity || !date) {
                    alert('Please fill in both "From" city and "Date of Journey".');
                    return;
                }

                // Update results title
                document.getElementById('results-title').textContent = `Buses from ${fromCity} to Nashik`;
                document.getElementById('results-subtitle').textContent = `On ${new Date(date).toDateString()}`;
                
                // Hide search form, show results
                initialSearchSection.classList.add('d-none');
                busResultsSection.classList.remove('d-none');
            });

            // --- 2. Handle Modify Search ---
            modifySearchBtn.addEventListener('click', function() {
                busResultsSection.classList.add('d-none');
                initialSearchSection.classList.remove('d-none');
                // Close any open seat layouts
                document.querySelectorAll('.seat-layout-container').forEach(container => container.classList.add('d-none'));
                document.querySelectorAll('.view-seats-btn').forEach(btn => btn.textContent = 'View Seats');
            });

            // --- 3. Handle "View Seats" Button Click ---
            busListingsContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('view-seats-btn')) {
                    const button = e.target;
                    const price = parseFloat(button.dataset.price);
                    const busCard = button.closest('.bus-card');
                    const seatLayoutContainer = busCard.querySelector('.seat-layout-container');

                    // Toggle visibility
                    const isHidden = seatLayoutContainer.classList.contains('d-none');
                    
                    // Close all other seat layouts before opening a new one
                    document.querySelectorAll('.seat-layout-container').forEach(container => {
                        if (container !== seatLayoutContainer) {
                            container.classList.add('d-none');
                            container.innerHTML = ''; // Clear content to reset
                        }
                    });
                     document.querySelectorAll('.view-seats-btn').forEach(btn => {
                        if(btn !== button) btn.textContent = 'View Seats';
                     });

                    if (isHidden) {
                        button.textContent = 'Hide Seats';
                        seatLayoutContainer.classList.remove('d-none');
                        generateSeatLayout(seatLayoutContainer, price);
                    } else {
                        button.textContent = 'View Seats';
                        seatLayoutContainer.classList.add('d-none');
                        seatLayoutContainer.innerHTML = ''; // Clear content
                    }
                }
            });

            // --- 4. Generate Seat Layout ---
            function generateSeatLayout(container, price) {
                // Dummy seat data
                const layoutType = Math.random() > 0.5 ? 'seater' : 'sleeper';
                let layoutHTML = `
                    <div class="row">
                        <div class="col-md-7">
                            <div class="bg-white p-3 rounded border">
                                <div class="d-flex justify-content-end mb-3"><i class="bi bi-gear-wide-connected fs-4" title="Engine"></i></div>
                                <div class="d-flex justify-content-center flex-wrap">`;
                
                // Generate seats (example logic)
                for (let i = 1; i <= 30; i++) {
                    const state = Math.random();
                    let seatClass = 'available';
                    if (state < 0.3) seatClass = 'booked';
                    else if (state < 0.4) seatClass = 'ladies';

                    let seatTypeClass = layoutType === 'sleeper' ? ' sleeper' : '';
                    layoutHTML += `<div class="seat${seatTypeClass} ${seatClass}" data-seat-number="${i}">${i}</div>`;
                }

                layoutHTML += `
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h6>Seat Legend</h6>
                            <div class="seat-legend small">
                                <p class="mb-1"><span style="background-color: #fff; border: 1px solid #adb5bd;"></span> Available</p>
                                <p class="mb-1"><span style="background-color: #e9ecef; border: 1px solid #ced4da;"></span> Booked</p>
                                <p class="mb-1"><span style="background-color: #fde0e6; border: 1px solid #f5c6cb;"></span> Ladies</p>
                                <p class="mb-3"><span style="background-color: #0d6efd; border: 1px solid #0d6efd;"></span> Selected</p>
                            </div>
                            <hr>
                            <div id="booking-summary">
                                <p class="mb-1">Selected Seats: <span class="fw-bold" id="selected-seats-list">None</span></p>
                                <p class="mb-2">Total Fare: <span class="fw-bold fs-5" id="total-fare">₹ 0</span></p>
                                <button class="btn btn-success w-100" disabled id="proceed-btn">Proceed to Book</button>
                            </div>
                        </div>
                    </div>`;
                container.innerHTML = layoutHTML;

                // Add event listeners for the newly created seats
                addSeatSelectionListeners(container, price);
            }

            // --- 5. Handle Seat Selection ---
            function addSeatSelectionListeners(container, price) {
                const seats = container.querySelectorAll('.seat.available, .seat.ladies');
                const selectedSeatsList = container.querySelector('#selected-seats-list');
                const totalFareEl = container.querySelector('#total-fare');
                const proceedBtn = container.querySelector('#proceed-btn');
                let selectedSeats = [];

                seats.forEach(seat => {
                    seat.addEventListener('click', () => {
                        seat.classList.toggle('selected');
                        const seatNumber = seat.dataset.seatNumber;

                        if (seat.classList.contains('selected')) {
                            selectedSeats.push(seatNumber);
                        } else {
                            selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                        }

                        // Update summary
                        if (selectedSeats.length > 0) {
                            selectedSeatsList.textContent = selectedSeats.join(', ');
                            totalFareEl.textContent = `₹ ${selectedSeats.length * price}`;
                            proceedBtn.disabled = false;
                        } else {
                            selectedSeatsList.textContent = 'None';
                            totalFareEl.textContent = `₹ 0`;
                            proceedBtn.disabled = true;
                        }
                    });
                });
            }

            // --- 6. Handle Filtering ---
            const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
            const allBusCards = document.querySelectorAll('.bus-card');

            function applyFilters() {
                const activeFilters = {
                    busType: [],
                    amenities: []
                };

                filterCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const filterGroup = checkbox.closest('.mb-4') ? 'busType' : 'amenities';
                        activeFilters[filterGroup].push(checkbox.value);
                    }
                });

                allBusCards.forEach(card => {
                    const busTypeData = card.dataset.busType.split(' ');
                    const amenitiesData = card.dataset.amenities.split(' ');
                    
                    const typeMatch = activeFilters.busType.length === 0 || activeFilters.busType.some(filter => busTypeData.includes(filter));
                    const amenityMatch = activeFilters.amenities.length === 0 || activeFilters.amenities.every(filter => amenitiesData.includes(filter));

                    if (typeMatch && amenityMatch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            filterCheckboxes.forEach(checkbox => checkbox.addEventListener('change', applyFilters));
            
            // --- 7. Handle Reset Filters ---
            document.getElementById('reset-filters-btn').addEventListener('click', () => {
                filterCheckboxes.forEach(checkbox => checkbox.checked = false);
                applyFilters();
            });

        });