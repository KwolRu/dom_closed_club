
// Initialize cards animation
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.flip-card');

    cards.forEach(card => {
        // Add mouse enter animation with slight delay
        card.addEventListener('mouseenter', (e) => {
            card.style.transition = 'transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            setTimeout(() => {
                card.style.transform = 'rotateY(180deg)';
            }, 50);
        });

        // Add mouse leave animation
        card.addEventListener('mouseleave', (e) => {
            card.style.transition = 'transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            card.style.transform = 'rotateY(0)';
        });

        // Add touch support for mobile
        card.addEventListener('touchstart', (e) => {
            e.preventDefault();
            card.style.transform = card.style.transform === 'rotateY(180deg)' 
                ? 'rotateY(0)' 
                : 'rotateY(180deg)';
        });
    });

    // Add entrance animation
    const blocks = document.querySelectorAll('.block');
    blocks.forEach((block, index) => {
        block.style.opacity = '0';
        block.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            block.style.transition = 'all 0.5s ease-out';
            block.style.opacity = '1';
            block.style.transform = 'translateY(0)';
        }, 100 * index);
    });
});
