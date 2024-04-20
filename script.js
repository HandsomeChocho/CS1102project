document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Here you would normally gather the form data and send it to the server
        // For demonstration purposes, we'll just log it to the console
        const formData = new FormData(contactForm);
        for (let [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }

        // Show a simple message or do something after form submission
        alert('Thank you for your message. We will get back to you shortly.');

        // Reset the form after submission
        contactForm.reset();
    });
});
