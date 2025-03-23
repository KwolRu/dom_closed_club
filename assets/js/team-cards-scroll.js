document.addEventListener('DOMContentLoaded', () => {
  console.log('team-cards-scroll script loaded');
  const teamCards = document.querySelectorAll('.cards-our-team .card');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      console.log(entry.target, entry.isIntersecting);
      if (entry.isIntersecting) {
        entry.target.classList.add('hovered');
      } else {
        entry.target.classList.remove('hovered');
      }
    });
  }, { threshold: 0.1 });

  teamCards.forEach(card => observer.observe(card));
});
