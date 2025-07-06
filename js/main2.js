

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

    