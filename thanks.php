<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dom Club - Закрытый клуб для предпринимателей и C-level руководителей</title>
    <meta name="description" content="Dom Club - Закрытый клуб для предпринимателей и C-level руководителей. Присоединяйтесь к нашему сообществу и развивайтесь вместе с нами.">
    <meta name="keywords" content="Dom Club, предприниматели, C-level руководители, бизнес, сообщество, нетворкинг">
    <meta name="author" content="Dom Club">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/tarif-cards.css">
    <link rel="stylesheet" href="assets/css/adaptation.css">
    <link rel="stylesheet" href="assets/css/input-styles.css">
    <link rel="stylesheet" href="assets/css/notifications.css">
    <link rel="stylesheet" href="assets/css/loader.css">
    <link rel="stylesheet" href="assets/css/text-animation.css">
    <link rel="stylesheet" href="assets/css/regalia-animation.css">
</head>

<body>
    
    
    
    <section id="main" class="b-main">
        <video src="assets/video/tiser-dom.mp4 " autoplay muted loop playsinline></video>
        
        <div class="full-screen container">
            <div class="flex-center">
            <a class="logo" href="index.php"><img src="assets/img/logo.svg" alt="logo"></a>
                <div class="flex title">
                    <h1>
                        <span>Спасибо, наш менеджер</span>
                        <span>свяжется с вами в ближайшее время</span>
                    </h1>
                </div>
                <div class="images-circle">
                    <div class="flex cuqer">
                        <img src="assets/img/circle-photo/1.webp" alt="1">
                        <img src="assets/img/circle-photo/2.webp" alt="1">
                        <img src="assets/img/circle-photo/3.webp" alt="1">
                        <img src="assets/img/circle-photo/4.webp" alt="1">
                        <img src="assets/img/circle-photo/5.webp" alt="1">
                        <img src="assets/img/circle-photo/6.webp" alt="1">
                        <img src="assets/img/circle-photo/7.webp" alt="1">
                        <img class="last" src="assets/img/circle-photo/0.webp" alt="1">

                    </div>
                    <p class="right-text">Резидентов в Москве и по всей России</p>
                </div>
                <a href="/" class="btn-primary">Вернуться на главную</a>
                
            </div>

        </div>
    </section>
    
    <footer>
        <div class="container">
            <div class="footer">
                <div class="footer-top">
                    <div class="footer-item">
                        <span>Основные запросы</span>
                        <a href="mailto:hello@dom.club">hello@dom.club</a>
                    </div>
                    <div class="footer-item">
                        <span>Телефон</span>
                        <a href="tel:+74999516431">+7 (499) 951-64-31</a>
                    </div>
                    <!-- <div class="footer-item">
                        <span>Социальные сети</span>
                        <div class="social-links">

                        </div>
                    </div> -->
                </div>
                <div class="footer-center-left">
                    <div class="footer-item">
                        <span>Офис</span>
                        <p>Ярославль, Московский проспект, 93, офис 2</p>
                    </div>
                </div>
                <div class="footer-bottom">

                    <div class="footer-item">
                        <span>&copy; 2025 Dom.club. Все права защищены.</span>
                    </div>
                    <div class="footer-item">
                        <a href="https://kwol.ru" target="_blank">Разработано при поддержке KWOL</a>
                    </div>
                    <div class="footer-item">
                        <a href="#">Политика конфиденциальности</a>
                    </div>
                </div>
            </div>

        </div>
    </footer>


<script src="assets/js/validation.js"></script>
<script src="assets/js/header.js"></script>
<script src="assets/js/input-animation.js"></script>
<script src="assets/js/flip-cards.js"></script>
<script src="assets/js/cards-our-team.js"></script>
<script src="assets/js/events-accordion.js"></script>
<script src="assets/js/regalia-animation.js"></script>
<script src="assets/js/scroll.js"></script>
<script src="assets/js/block-height-manager.js"></script>
<script src="assets/js/text-animation.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Добавляем анимацию для карточки тарифов -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.tarif .card').forEach(card => {
            card.classList.add('loaded');
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
</script>
<script src="assets/js/tarif-cards.js"></script>
<script src="assets/js/loader.js"></script>
<script src="assets/js/mobile-flip.js"></script>
<script src="assets/js/team-cards-scroll.js"></script>
</body>
</html>