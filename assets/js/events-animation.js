document.addEventListener('DOMContentLoaded', () => {
    const mouths = document.querySelectorAll('.mouth');
    let activeMonth = null;

    mouths.forEach(mouth => {
        mouth.addEventListener('click', () => {
            const forech = mouth.nextElementSibling;
            
            // If clicking the same month that's already active, close it
            if (mouth === activeMonth) {
                mouth.classList.remove('active');
                forech.classList.remove('active');
                activeMonth = null;
                return;
            }

            // Close previously active month if exists
            if (activeMonth) {
                activeMonth.classList.remove('active');
                activeMonth.nextElementSibling.classList.remove('active');
            }

            // Open clicked month
            mouth.classList.add('active');
            forech.classList.add('active');
            activeMonth = mouth;
        });
    });
});
