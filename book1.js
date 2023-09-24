// script.js
const checkInDate = document.getElementById('check-in-date');
const checkOutDate = document.getElementById('check-out-date');
const roomType = document.getElementById('room-type');
const guests = document.getElementById('guests');
const submitButton = document.getElementById('submit-button');

// Add an event listener to the form for input validation
document.getElementById('booking-form').addEventListener('input', () => {
    // Check if all form fields are valid
    const isValid = checkInDate.validity.valid &&
                    checkOutDate.validity.valid &&
                    roomType.validity.valid &&
                    guests.validity.valid;

    // Enable or disable the submit button based on validity
    submitButton.disabled = !isValid;
});
