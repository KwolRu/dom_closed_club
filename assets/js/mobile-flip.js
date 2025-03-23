document.addEventListener('DOMContentLoaded', () => {
  if (window.innerWidth <= 768) {
    // Обработка тарифных карточек
    const tarifObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        const card = entry.target;
        if (entry.isIntersecting) {
          card.querySelector('.front-card').style.transform = 'rotateY(180deg)';
          card.querySelector('.back-card').style.transform = 'rotateY(0deg)';
        } else {
          card.querySelector('.front-card').style.transform = 'rotateY(0deg)';
          card.querySelector('.back-card').style.transform = 'rotateY(180deg)';
        }
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('.tarif .card').forEach(card => {
      tarifObserver.observe(card);
    });

    // Обработка флип-карточек в секции "Что ты получишь?"
    const flipCards = document.querySelectorAll('.flip-card');
    let activeCard = null;
    
    flipCards.forEach(card => {
      card.addEventListener('click', function(e) {
        e.stopPropagation();
        
        if (activeCard && activeCard !== this) {
          activeCard.classList.remove('flipped');
        }
        
        this.classList.toggle('flipped');
        activeCard = this.classList.contains('flipped') ? this : null;
      });
    });

    // Закрытие при клике вне карточки
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.flip-card') && activeCard) {
        activeCard.classList.remove('flipped');
        activeCard = null;
      }
    });
  }
});
