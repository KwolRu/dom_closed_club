document.addEventListener('DOMContentLoaded', function() {
    const words = document.querySelectorAll('.loader-word');
    const loader = document.querySelector('.loader');
    
    // Animate words sequentially
    words.forEach((word, index) => {
        setTimeout(() => {
            word.classList.add('animate');
        }, index * 400); // 400ms delay between each word
    });

    // Hide loader after all animations complete
    setTimeout(() => {
        loader.classList.add('fade-out');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    }, (words.length * 400) + 1000); // Wait for all words + extra time
});
