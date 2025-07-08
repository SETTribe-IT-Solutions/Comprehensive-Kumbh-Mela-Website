document.addEventListener('DOMContentLoaded', () => {

    // =========================================================
    // --- 1. COUNTDOWN TIMER LOGIC ---
    // =========================================================
    const countdownTimerEl = document.getElementById('countdown-timer');
    // ** THE FIX IS HERE: Only run the countdown code if the timer exists on the page **
    if (countdownTimerEl) {
        const countdown = () => {
            const targetDate = new Date('July 14, 2027 00:00:00').getTime();
            const now = new Date().getTime();
            const difference = targetDate - now;

            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // These elements are only searched for if the main timer exists
                document.getElementById('days').innerText = String(days).padStart(3, '0');
                document.getElementById('hours').innerText = String(hours).padStart(2, '0');
                document.getElementById('minutes').innerText = String(minutes).padStart(2, '0');
                document.getElementById('seconds').innerText = String(seconds).padStart(2, '0');
            } else {
                clearInterval(interval);
                countdownTimerEl.innerHTML = "<h3 class='text-white'>The event has started!</h3>";
            }
        };
        const interval = setInterval(countdown, 1000);
        countdown();
    }


    // =========================================================
    // --- UNIVERSAL API-DRIVEN TRANSLATION ENGINE ---
    // This code will run on every page.
    // =========================================================
    const languageOptions = document.querySelectorAll('.lang-option');

    // Only set up the engine if language options exist in the navbar
    if (languageOptions.length > 0) {
        
        const changeLanguage = async (lang) => {
            try {
                // 1. Fetch the master translation file for the selected language
                const response = await fetch(`api.php?lang=${lang}&v=${new Date().getTime()}`);
                
                if (!response.ok) {
                    throw new Error(`Could not fetch translation file: ${response.status} ${response.statusText}`);
                }
                
                const langTranslations = await response.json();
                
                // 2. Update the active state in the dropdown menu
                languageOptions.forEach(opt => opt.classList.remove('active'));
                const currentOption = document.querySelector(`.lang-option[data-lang="${lang}"]`);
                if (currentOption) {
                    currentOption.classList.add('active');
                }

                // 3. Loop through ALL translation keys and update any matching element on the CURRENT page
                for (const key in langTranslations) {
                    const element = document.getElementById(key);
                    // This 'if (element)' check is crucial. It only translates what it finds.
                    if (element) {
                        element.textContent = langTranslations[key];
                    }
                }
            } catch (error) {
                console.error('Translation Error:', error);
                // If a language fails (e.g., bad JSON), fall back to English to prevent a broken page
                if (lang !== 'en') {
                    changeLanguage('en');
                }
            }
        };
        
        // 4. Add a click listener to each language option
        languageOptions.forEach(option => {
            option.addEventListener('click', (event) => {
                event.preventDefault();
                const selectedLang = event.target.getAttribute('data-lang');
                // 5. Save the user's choice in the browser's memory
                localStorage.setItem('selectedLanguage', selectedLang);
                // 6. Trigger the language change
                changeLanguage(selectedLang);
            });
        });

        // 7. On ANY page load, check for a saved language choice and apply it. Default to 'en'.
        const savedLanguage = localStorage.getItem('selectedLanguage') || 'en';
        changeLanguage(savedLanguage);
    }


    // --- 3. FINAL IMAGE & VIDEO LIGHTBOX LOGIC ---
    const mediaCards = document.querySelectorAll('.media-card');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxVideo = document.getElementById('lightbox-video');
    const closeBtn = document.querySelector('.lightbox-close');

    if (mediaCards.length > 0 && lightbox && lightboxImg && lightboxVideo && closeBtn) {

        const openLightbox = (e) => {
            const card = e.currentTarget;
            const type = card.dataset.type;

            if (type === 'image') {
                const imgSrc = card.querySelector('img').src;
                lightboxImg.src = imgSrc;
                lightboxImg.style.display = 'block';
                lightboxVideo.style.display = 'none';
                lightboxVideo.pause();
                lightboxVideo.removeAttribute('src');
            } else if (type === 'video') {
                const videoSrc = card.querySelector('video source').src;
                lightboxVideo.src = videoSrc;
                lightboxVideo.style.display = 'block';
                lightboxImg.style.display = 'none';
                lightboxVideo.play();
            }

            lightbox.classList.add('lightbox-active');
        };

        const closeLightbox = () => {
            lightbox.classList.remove('lightbox-active');
            lightboxImg.src = '';
            lightboxVideo.pause();
            lightboxVideo.removeAttribute('src');
            lightboxVideo.style.display = 'none';
            lightboxImg.style.display = 'none';
        };

        mediaCards.forEach(card => {
            card.addEventListener('click', openLightbox);
        });

        closeBtn.addEventListener('click', closeLightbox);

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }


    
    // =========================================================
    // --- 4. ACCOMMODATION DATE VALIDATION ---
    // =========================================================
    const checkinDateEl = document.getElementById('checkin-date');
    const checkoutDateEl = document.getElementById('checkout-date');
    // ** THE FIX IS HERE: Only run date validation if the inputs exist on the page **
    if (checkinDateEl && checkoutDateEl) {
        const getTodayString = () => {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };

        const todayStr = getTodayString();
        checkinDateEl.setAttribute('min', todayStr);

        checkinDateEl.addEventListener('input', () => {
            const checkinValue = checkinDateEl.value;
            if (checkinValue) {
                const checkinDate = new Date(checkinValue);
                checkinDate.setDate(checkinDate.getDate() + 1);
                const minCheckoutDate = checkinDate.toISOString().split('T')[0];
                checkoutDateEl.setAttribute('min', minCheckoutDate);
                if (checkoutDateEl.value && checkoutDateEl.value < minCheckoutDate) {
                    checkoutDateEl.value = '';
                }
            } else {
                checkoutDateEl.value = '';
                checkoutDateEl.removeAttribute('min');
            }
        });
        
        checkoutDateEl.addEventListener('input', () => {
            if (checkinDateEl.value && checkoutDateEl.value) {
                if (new Date(checkoutDateEl.value) <= new Date(checkinDateEl.value)) {
                    alert("Check-out date must be after the check-in date.");
                    checkoutDateEl.value = '';
                }
            }
        });
    }
        // =========================================================
        // =========================================================
    // --- 5. ROBUST DARSHAN PAGE DATE VALIDATION ---
    // =========================================================
    const snanDateInput = document.getElementById('snan-date-input');
    const poojaDateInput = document.getElementById('pooja-date-input');

    // Helper function to get today's date in YYYY-MM-DD format
    const getTodayStringForValidation = () => {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    const todayStr = getTodayStringForValidation();

    // --- Validation for Holy Dip (Snan) Date ---
    if (snanDateInput) {
        // Set the minimum selectable date to today
        snanDateInput.setAttribute('min', todayStr);

        // Add an event listener to re-validate if the user types a past date
        snanDateInput.addEventListener('input', () => {
            if (snanDateInput.value && snanDateInput.value < todayStr) {
                alert("Date for Holy Dip cannot be in the past.");
                snanDateInput.value = '';
            }
        });
    }

    // --- Validation for E-Pandit Pooja Date ---
    if (poojaDateInput) {
        // Set the minimum selectable date to today
        poojaDateInput.setAttribute('min', todayStr);

        // Add an event listener to re-validate if the user types a past date
        poojaDateInput.addEventListener('input', () => {
            if (poojaDateInput.value && poojaDateInput.value < todayStr) {
                alert("Date for Pooja cannot be in the past.");
                poojaDateInput.value = '';
            }
        });
    }

    

}); // This is the closing brace of the main DOMContentLoaded listener