document.addEventListener('DOMContentLoaded', function() {
    const progressBar = document.getElementById('loader-progress-bar');
    const percentageText = document.getElementById('loader-percentage');
    const loaderOverlay = document.getElementById('loader-overlay');
    const lineLoaders = document.querySelectorAll('.line-loader');
    const loaderMotivation = document.querySelector('.loader-motivation');
    
    let loadProgress = 0;
    let currentDisplayNumber = 0;
    let lastTimestamp = null;
    
    // Check if mobile device for timing adjustments
    const isMobile = window.innerWidth <= 768;
    
    // Ultra-smooth loading calculation (Apple-style)
    const baseSpeed = isMobile ? 45 : 40; // Slightly faster on mobile
    const initialDelay = isMobile ? 200 : 300; // Shorter delay on mobile
    let hasStarted = false;
    
    // Animate the motivation lines sequentially - adjusted for mobile
    function animateMotivationLines() {
        const staggerDelay = isMobile ? 500 : 700; // Faster animation for mobile
        
        lineLoaders.forEach((line, index) => {
            setTimeout(() => {
                line.style.width = isMobile ? '80%' : '100%';
            }, index * staggerDelay);
        });
    }
    
    // Start the animation of motivation lines
    setTimeout(animateMotivationLines, isMobile ? 300 : 500);
    
    // Very smooth progress animation
    function updateProgress(timestamp) {
        if (!hasStarted) {
            setTimeout(() => { 
                hasStarted = true; 
                requestAnimationFrame(updateProgress);
            }, initialDelay);
            return;
        }
        
        if (!lastTimestamp) lastTimestamp = timestamp;
        const elapsed = timestamp - lastTimestamp;
        lastTimestamp = timestamp;
        
        // Calculate a silky-smooth progress rate that slows down naturally
        const remainingProgress = 100 - loadProgress;
        const progressRate = baseSpeed * Math.pow(remainingProgress / 100, 0.8); // Gentle deceleration
        
        // Apply micro-increment based on elapsed time
        const increment = (progressRate * elapsed) / 1000;
        
        if (loadProgress < 99) {
            loadProgress += increment;
            loadProgress = Math.min(loadProgress, 99);
            
            // Update progress bar with the ultra-smooth transition set in CSS
            progressBar.style.width = loadProgress + '%';
            
            // Update percentage text without animation
            updatePercentageText(Math.floor(loadProgress));
            
            requestAnimationFrame(updateProgress);
        }
    }
    
    // Simple percentage text update without animation
    function updatePercentageText(value) {
        // Only update when integer changes to reduce DOM operations
        if (value !== currentDisplayNumber) {
            currentDisplayNumber = value;
            percentageText.textContent = value + '%';
        }
    }
    
    // Start the animation after a short delay
    setTimeout(() => {
        requestAnimationFrame(updateProgress);
    }, isMobile ? 50 : 100);
    
    // When page is fully loaded, complete to 100%
    window.addEventListener('load', function() {
        // Ensure at least 2-2.5 seconds of loading experience (shorter on mobile)
        const minimumLoadingTime = isMobile ? 2000 : 2500; 
        const loadStartTime = performance.now();
        
        const finishLoading = function() {
            // Apply the final progress with the smooth transition from CSS
            loadProgress = 100;
            progressBar.style.width = '100%';
            updatePercentageText(100);
            
            // Make sure all motivation lines are fully filled
            lineLoaders.forEach(line => {
                line.style.width = isMobile ? '80%' : '100%';
            });
            
            // Add a slight delay before hiding to allow the progress bar to complete
            setTimeout(completeLoading, isMobile ? 600 : 800);
        };
        
        const timeElapsed = performance.now() - loadStartTime;
        const remainingTime = Math.max(0, minimumLoadingTime - timeElapsed);
        
        setTimeout(() => {
            // Ensure a smooth transition to 100%
            finishLoading();
        }, remainingTime);
    });
    
    function completeLoading() {
        document.body.classList.add('loaded');
        
        // Fade out the loader with a longer, smoother transition
        loaderOverlay.style.opacity = 0;
        
        // After transition effect, remove the loader completely
        setTimeout(function() {
            loaderOverlay.style.display = 'none';
        }, 1000);
    }
    
    // Handle orientation changes
    window.addEventListener('resize', function() {
        const newIsMobile = window.innerWidth <= 768;
        
        // If device type changed (mobile/desktop), adjust the layout
        if (newIsMobile !== isMobile) {
            // Refresh the page to get proper layouts
            // Or alternatively just adjust styles without refreshing
            lineLoaders.forEach(line => {
                if (line.style.width !== '0px') {
                    line.style.width = newIsMobile ? '80%' : '100%';
                }
            });
        }
    });
});