document.addEventListener('DOMContentLoaded', function() {
    // Only run on desktop devices
    if (window.innerWidth <= 768) return;

    const blocks = document.querySelectorAll('.block');
    const defaultSmallHeight = '320px';
    const expandedHeight = '620px';
    const adjustedExpandedHeight = '320px';

    function resetBlockHeights() {
        blocks.forEach(block => {
            if (block.classList.contains('leisure') ||
                block.classList.contains('invest') ||
                block.classList.contains('expertise')) {
                block.style.height = defaultSmallHeight;
            } else {
                block.style.height = expandedHeight;
            }
        });
    }

    function handleBlockHover(event) {
        const block = event.currentTarget;
        
        if (event.type === 'mouseenter') {
            block.style.height = expandedHeight;
            
            // Управление высотой блоков в первой колонке
            if (block.classList.contains('leisure')) {
                const familyBlock = document.querySelector('.block.family');
                if (familyBlock) familyBlock.style.height = adjustedExpandedHeight;
            }
            
            // Управление высотой блоков во второй колонке
            if (block.classList.contains('invest')) {
                const networkBlock = document.querySelector('.block.network');
                if (networkBlock) networkBlock.style.height = adjustedExpandedHeight;
            }
            
            // Управление высотой блоков в третьей колонке
            if (block.classList.contains('expertise')) {
                const bonusBlock = document.querySelector('.block.bonus');
                if (bonusBlock) bonusBlock.style.height = adjustedExpandedHeight;
            }
            
        } else if (event.type === 'mouseleave') {
            // Возврат к исходным размерам при отведении мыши
            if (block.classList.contains('leisure') ||
                block.classList.contains('invest') ||
                block.classList.contains('expertise')) {
                block.style.height = defaultSmallHeight;
            }
            
            // Возврат высоты нижних блоков
            const familyBlock = document.querySelector('.block.family');
            const networkBlock = document.querySelector('.block.network');
            const bonusBlock = document.querySelector('.block.bonus');
            
            if (block.classList.contains('leisure') && familyBlock) {
                familyBlock.style.height = expandedHeight;
            }
            if (block.classList.contains('invest') && networkBlock) {
                networkBlock.style.height = expandedHeight;
            }
            if (block.classList.contains('expertise') && bonusBlock) {
                bonusBlock.style.height = expandedHeight;
            }
        }
    }

    // Initialize blocks
    resetBlockHeights();

    // Add event listeners only for desktop
    blocks.forEach(block => {
        block.addEventListener('mouseenter', handleBlockHover);
        block.addEventListener('mouseleave', handleBlockHover);
    });
});
