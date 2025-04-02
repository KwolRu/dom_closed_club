document.addEventListener('DOMContentLoaded', function() {
    const isMobile = window.innerWidth <= 768;
    const tarifSection = document.querySelector('.tarif');
    
    if (isMobile) {
        // Convert regular cards to slider
        const cards = tarifSection.querySelectorAll('.card');
        const swiperContainer = document.createElement('div');
        swiperContainer.className = 'swiper tarif-slider-container';
        const swiperWrapper = document.createElement('div');
        swiperWrapper.className = 'swiper-wrapper';
        
        cards.forEach(card => {
            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.appendChild(card.cloneNode(true));
            swiperWrapper.appendChild(slide);
        });
        
        swiperContainer.appendChild(swiperWrapper);
        
        // Add navigation
        const prevButton = document.createElement('div');
        prevButton.className = 'swiper-button-prev tarif-prev';
        prevButton.innerHTML = '<img src="assets/img/illustrations/arrow-left.svg" alt="">';
        
        const nextButton = document.createElement('div');
        nextButton.className = 'swiper-button-next tarif-next';
        nextButton.innerHTML = '<img src="assets/img/illustrations/arrow-right.svg" alt="">';
        
        // Create unique container for the navigation buttons
        const navContainer = document.createElement('div');
        navContainer.className = 'tarif-slider-nav';
        navContainer.appendChild(prevButton);
        navContainer.appendChild(nextButton);
        

        // Replace existing cards with slider
        while (tarifSection.firstChild) {
            tarifSection.removeChild(tarifSection.firstChild);
        }
        tarifSection.appendChild(navContainer);
        tarifSection.appendChild(swiperContainer);
        
        // Initialize Swiper
        const tarifSwiper = new Swiper('.tarif-slider-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 'auto',
                }
            }
        });
    }
    
    // Keep existing card flip functionality
    document.querySelectorAll('.tarif .card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.querySelector('.front-card').style.transform = 'rotateY(180deg)';
            card.querySelector('.back-card').style.transform = 'rotateY(0deg)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.querySelector('.front-card').style.transform = 'rotateY(0deg)';
            card.querySelector('.back-card').style.transform = 'rotateY(180deg)';
        });
    });
});

// Handle resize events
window.addEventListener('resize', function() {
    const isMobile = window.innerWidth <= 768;
    const hasSlider = document.querySelector('.tarif-slider-container');
    
    if (isMobile && !hasSlider) {
        location.reload();
    } else if (!isMobile && hasSlider) {
        location.reload();
    }
});

