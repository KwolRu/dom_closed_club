document.addEventListener('DOMContentLoaded', () => {
    const cursorWrapper = document.createElement('div');
    cursorWrapper.className = 'cursor-wrapper';
    
    const cursor = document.createElement('div');
    cursor.className = 'cursor';
    
    const cursorBorder = document.createElement('div');
    cursorBorder.className = 'cursor-border';
    
    cursorWrapper.appendChild(cursor);
    cursorWrapper.appendChild(cursorBorder);
    document.body.appendChild(cursorWrapper);

    // Hide default cursor and ensure it stays hidden for all elements
    document.body.style.cursor = 'none';
    const styleSheet = document.createElement('style');
    styleSheet.textContent = `
        * {
            cursor: none !important;
        }
    `;
    document.head.appendChild(styleSheet);
    
    // Add cursor trail elements
    for (let i = 0; i < 5; i++) {
        const trail = document.createElement('div');
        trail.className = 'cursor-trail';
        trail.style.setProperty('--delay', `${i * 0.05}s`);
        cursorWrapper.appendChild(trail);
    }

    // Cursor position variables
    let currentX = 0, currentY = 0;
    let targetX = 0, targetY = 0;

    document.addEventListener('mousemove', (e) => {
        targetX = e.clientX;
        targetY = e.clientY;
    });

    // Smooth cursor animation
    function animate() {
        // Lerp for smooth movement
        currentX += (targetX - currentX) * 0.15;
        currentY += (targetY - currentY) * 0.15;

        // Update cursor positions
        cursor.style.left = currentX + 'px';
        cursor.style.top = currentY + 'px';
        cursorBorder.style.left = currentX + 'px';
        cursorBorder.style.top = currentY + 'px';

        // Update trail positions
        document.querySelectorAll('.cursor-trail').forEach((trail, index) => {
            setTimeout(() => {
                trail.style.left = currentX + 'px';
                trail.style.top = currentY + 'px';
            }, index * 50);
        });

        requestAnimationFrame(animate);
    }
    animate();

    // Add hover effect on clickable elements
    const clickableElements = document.querySelectorAll('a, button, input, .card, [data-scroll]');
    clickableElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            cursorWrapper.classList.add('pointer');
            cursorBorder.style.transform = 'scale(1.5)';
            cursor.style.transform = 'scale(0.5)';
        });
        element.addEventListener('mouseleave', () => {
            cursorWrapper.classList.remove('pointer');
            cursorBorder.style.transform = 'scale(1)';
            cursor.style.transform = 'scale(1)';
        });
    });

    // Enhanced click animation
    document.addEventListener('mousedown', () => {
        cursorWrapper.classList.add('click');
        cursor.style.transform = 'scale(0.8)';
        cursorBorder.style.transform = 'scale(1.4)';
    });
    
    document.addEventListener('mouseup', () => {
        cursorWrapper.classList.remove('click');
        cursor.style.transform = 'scale(1)';
        cursorBorder.style.transform = 'scale(1)';
    });
});
