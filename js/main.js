document.addEventListener('DOMContentLoaded', () => {

    // --- 1. COUNTDOWN TIMER LOGIC (CORRECTED & SAFE) ---

    const countdownTimerEl = document.getElementById('countdown-timer');
    
    // This 'if' statement is the main gatekeeper.
    // It prevents this entire block from running on pages without a countdown timer.
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

                // These elements are now safely inside the main 'if' block.
                const daysEl = document.getElementById('days');
                const hoursEl = document.getElementById('hours');
                const minutesEl = document.getElementById('minutes');
                const secondsEl = document.getElementById('seconds');
                
                // This second layer of checks ensures we don't get an error
                // even if one of the inner elements is missing.
                if (daysEl && hoursEl && minutesEl && secondsEl) {
                    daysEl.innerText = String(days).padStart(3, '0');
                    hoursEl.innerText = String(hours).padStart(2, '0');
                    minutesEl.innerText = String(minutes).padStart(2, '0');
                    secondsEl.innerText = String(seconds).padStart(2, '0');
                }

            } else {
                // This part is also safe because countdownTimerEl is guaranteed to exist here.
                clearInterval(interval);
                countdownTimerEl.innerHTML = "<h3 class='text-white'>The event has started!</h3>";
            }
        };
        
        const interval = setInterval(countdown, 1000);
        countdown();
    }

    // --- UNIVERSAL API-DRIVEN TRANSLATION ENGINE ---
    // This code will run on every page.

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


          // =========================================================
    // --- 3. FINAL & ROBUST IMAGE/VIDEO LIGHTBOX LOGIC ---
    // =========================================================
    const mediaCards = document.querySelectorAll('.media-card');
    const lightbox = document.getElementById('lightbox');

    if (mediaCards.length > 0 && lightbox) {
        
        const lightboxImg = document.getElementById('lightbox-img');
        // Get the container, not the video itself
        const lightboxVideoContainer = document.getElementById('lightbox-video');
        const closeBtn = document.querySelector('.lightbox-close');

        if (lightboxImg && lightboxVideoContainer && closeBtn) {

            const openLightbox = (e) => {
            const clickedCard = e.currentTarget;
            const type = clickedCard.dataset.type;

            lightboxImg.style.display = 'none';
            lightboxVideoContainer.style.display = 'none';
            lightboxVideoContainer.innerHTML = '';

            if (type === 'video') {
                const videoEl = clickedCard.querySelector('video');
                const videoSrc = videoEl?.querySelector('source')?.src || videoEl?.src;

                if (videoSrc) {
                    lightboxVideoContainer.style.display = 'block';
                    lightboxVideoContainer.innerHTML = `<video class="lightbox-content" controls autoplay><source src="${videoSrc}" type="video/mp4"></video>`;

                    // Attach close handler to video if desired
                }
                } else {
                    const imgSrc = clickedCard.querySelector('img').src;
                    lightboxImg.src = imgSrc;
                    lightboxImg.style.display = 'block';

                }

                lightbox.classList.add('lightbox-active');
                document.body.classList.add('lightbox-open'); // ✅ Prevent scroll
            };

            const closeLightbox = () => {
                lightbox.classList.remove('lightbox-active');
                document.body.classList.remove('lightbox-open'); // ✅ Restore scroll
                lightboxVideoContainer.innerHTML = '';
                lightboxImg.src = '';
            };

            mediaCards.forEach(card => {
                    card.addEventListener('click', openLightbox);
                });

                closeBtn.addEventListener('click', closeLightbox);
                
            lightbox.addEventListener('click', (e) => {
                const lightboxInner = document.querySelector('.lightbox-inner');
                if (!lightboxInner.contains(e.target)) {
                    closeLightbox();
                }
            });


        }
        
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

        // =========================================================
    // --- 6. BOOTSTRAP FORM VALIDATION (FOR MODALS, ETC.) ---
    // =========================================================
    // This is a self-invoking function that finds all forms with the 'needs-validation' class
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()

        // =========================================================
    // --- 7. CULTURE PAGE ENROLLMENT FORM SUBMISSION ---
    // =========================================================
    const enrollmentForm = document.getElementById('enrollment-form');

    // Only run this code if the enrollment form exists on the page
    if (enrollmentForm) {

        enrollmentForm.addEventListener('submit', function(event) {
            // Stop the form from submitting the traditional way
            event.preventDefault();
            event.stopPropagation();

            // Check if the form is valid according to Bootstrap's rules
            if (enrollmentForm.checkValidity()) {
                
                // If valid, show the success alert
                Swal.fire({
                    icon: 'success',
                    title: 'Enrollment Successful!',
                    text: 'Thank you for your interest. We will contact you with more details shortly.',
                    confirmButtonColor: '#FF9933' // Using your theme's saffron color
                }).then((result) => {
                    // This code runs after the user clicks "OK"
                    if (result.isConfirmed) {
                        enrollmentForm.reset();
                        enrollmentForm.classList.remove('was-validated');
                        
                        // Get the modal instance and hide it
                        const enrollModalEl = document.getElementById('enrollModal');
                        const modal = bootstrap.Modal.getInstance(enrollModalEl);
                        if (modal) {
                            modal.hide();
                        }
                    }
                });

            }

            // This line adds the validation styles (e.g., green/red borders)
            enrollmentForm.classList.add('was-validated');
        });
    }

}); // This is the closing brace of the main DOMContentLoaded listener