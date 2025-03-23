document.addEventListener('DOMContentLoaded', () => {
    const blocks = document.querySelectorAll('.block');
    
    blocks.forEach(block => {
        let isFlipping = false;
        let timeoutId = null;
        
        const flipCard = block.querySelector('.flip-card');
        
        block.addEventListener('mouseenter', () => {
            if (!isFlipping) {
                isFlipping = true;
                flipCard.style.transform = 'rotateY(180deg)';
            }
        });
        
        block.addEventListener('mouseleave', () => {
            // Clear any existing timeout
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            
            // Add small delay before allowing next flip
            timeoutId = setTimeout(() => {
                isFlipping = false;
                flipCard.style.transform = 'rotateY(0deg)';
            }, 100); // Small delay to prevent flicker
        });
    });
});