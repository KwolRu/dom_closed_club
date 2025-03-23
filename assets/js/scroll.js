document.addEventListener('DOMContentLoaded', () => {
    const popupOverlay = document.getElementById('popupOverlay');
    const closePopupBtn = document.getElementById('closePopupBtn');
    let hasModalBeenShown = false;

    function closeModal() {
        popupOverlay.classList.remove('visible');
        setTimeout(() => {
            popupOverlay.style.display = 'none';
        }, 300);
    }

    function showModal() {
        if (!hasModalBeenShown) {
            popupOverlay.style.display = 'flex';
            setTimeout(() => {
                popupOverlay.classList.add('visible');
            }, 10);
            hasModalBeenShown = true;
        }
    }

    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                showModal();
            }
        });
    }, { threshold: 0.5 });

    // Observe the block-img section
    const blockImgSection = document.getElementById('block-img-section');
    if (blockImgSection) {
        observer.observe(blockImgSection);
    }

    // Close button click handler
    closePopupBtn.addEventListener('click', (e) => {
        e.preventDefault();
        closeModal();
    });

    // Close on overlay click
    popupOverlay.addEventListener('click', (e) => {
        if (e.target === popupOverlay) {
            closeModal();
        }
    });
});
