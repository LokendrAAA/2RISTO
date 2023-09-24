// script.js
document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'events.php', // Load events from the server
        eventClick: function(info) {
            // Handle event click (modify or delete event)
            // You can implement event editing logic here
            alert('Event: ' + info.event.title);
        },
        dateClick: function(info) {
            // Handle date click (add an image or event)
            // You can implement date click logic here
            alert('Clicked on: ' + info.dateStr);
        }
    });
    calendar.render();
});
