document.addEventListener('DOMContentLoaded', function() {
    const monthHeaders = document.querySelectorAll('.flex.mouth');
    
    // Open first month by default
    if (monthHeaders.length > 0) {
        const firstMonth = monthHeaders[0];
        firstMonth.classList.add('active');
        const firstContent = firstMonth.parentElement.querySelector('.forech');
        firstContent.classList.add('active');
    }

    monthHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const foreachContent = this.parentElement.querySelector('.forech');
            const isActive = foreachContent.classList.contains('active');
            
            // Remove active state from all headers and contents
            monthHeaders.forEach(h => h.classList.remove('active'));
            document.querySelectorAll('.forech').forEach(content => {
                content.classList.remove('active');
            });

            // Toggle current section
            if (!isActive) {
                foreachContent.classList.add('active');
                this.classList.add('active');
            }
        });
    });
});
