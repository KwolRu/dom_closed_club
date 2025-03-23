class TextAnimation {
    constructor(element, speed = 50) {
        this.element = element;
        this.speed = speed;
        this.originalText = element.textContent;
        this.originalHTML = element.innerHTML;
        this.isAnimating = false;
    }

    async animateSpan(span) {
        const text = span.textContent;
        const chars = text.split('');
        span.innerHTML = chars.map(char => 
            `<span style="opacity: 1; transition: opacity 0.2s ease">${char}</span>`
        ).join('');

        const charSpans = span.querySelectorAll('span');
        // Сначала делаем все символы прозрачными
        charSpans.forEach(charSpan => {
            charSpan.style.opacity = '0';
        });

        // Затем постепенно показываем каждый символ
        for (let charSpan of charSpans) {
            await new Promise(resolve => setTimeout(resolve, 30));
            charSpan.style.opacity = '1';
        }
    }

    async animate() {
        if (this.isAnimating) return;
        this.isAnimating = true;

        const spans = this.element.querySelectorAll(':scope > span');
        
        if (spans.length > 0) {
            // Сначала скрываем все spans
            spans.forEach(span => {
                span.style.visibility = 'hidden';
            });
            
            // Анимируем каждый span последовательно
            for (const span of spans) {
                // Показываем текущий span перед анимацией
                span.style.visibility = 'visible';
                await this.animateSpan(span);
                // Добавляем задержку между анимацией spans
                await new Promise(resolve => setTimeout(resolve, 200));
            }
        } else {
            await this.animateSpan(this.element);
        }

        this.isAnimating = false;
    }
}

function initTextAnimation() {
    const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p.description');
    
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const animation = new TextAnimation(entry.target);
                animation.animate();
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '50px'
    });

    headings.forEach(heading => observer.observe(heading));
}

// Запускаем после загрузки DOM
document.addEventListener('DOMContentLoaded', initTextAnimation);
