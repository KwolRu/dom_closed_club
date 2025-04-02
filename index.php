<?php
error_reporting(0);
?>
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
    <link rel="stylesheet" href="assets/css/main.css?v=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/tarif-cards.css?v=2.0">
    <link rel="stylesheet" href="assets/css/flip-cards-mobile.css?v=1.0">
    <link rel="stylesheet" href="assets/css/adaptation.css?v=1.0">
    <link rel="stylesheet" href="assets/css/input-styles.css?v=1.0">
    <link rel="stylesheet" href="assets/css/notifications.css?v=1.0">
    <link rel="stylesheet" href="assets/css/loader.css?v=1.0">
    <link rel="stylesheet" href="assets/css/header.css?v=1.0">
    <link rel="stylesheet" href="assets/css/modal.css?v=1.0">
    <link rel="stylesheet" href="assets/css/regalia-animation.css?v=1.0">
</head>
<script>
    // Добавьте в assets/js/video-optimization.js
document.addEventListener('DOMContentLoaded', () => {
    // Отложенная загрузка видео ниже первого экрана
    const lazyVideos = document.querySelectorAll('video[data-src]');
    
    const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const video = entry.target;
                if (video.dataset.src) {
                    const sources = video.querySelectorAll('source');
                    sources.forEach(source => {
                        if (source.dataset.src) {
                            source.src = source.dataset.src;
                        }
                    });
                    video.load();
                    if (video.autoplay) video.play();
                    videoObserver.unobserve(video);
                }
            }
        });
    }, {rootMargin: "100px 0px"});
    
    lazyVideos.forEach(video => {
        videoObserver.observe(video);
    });
});
</script>
<body>
    <div id="loader-overlay">
        <div class="loader-container">
            <div class="logo-loader">
                <div class="loader-motivation">
                    <div>бизнес</div>
                    <div>баланс</div>
                    <div>окружение</div>
                    <div>вдохновение</div>
                </div>


            </div>
            <div class="loader-progress">
                <div class="loader-progress-bar" id="loader-progress-bar"></div>
            </div>
            <div class="loader-percentage" id="loader-percentage">0%</div>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="flex">
                <a class="logo" href="index.php"><img src="assets/img/logo.svg" alt="logo"></a>
                <nav>
                    <ul>
                        <li data-scroll="main" class="active">Главная</li>
                        <li data-scroll="what-you-get">Что получишь</li>
                        <li data-scroll="events">Мероприятия</li>
                        <!-- <a target="_blank" href="https://open.dom-club.com"><li>Открытая встреча</li></a> -->
                        <li data-scroll="tarifs">Тарифы</li>
                        <li data-scroll="contacts">Контакты</li>
                    </ul>
                </nav>
                <div class="flex gap-10">
                    <div class="flex">
                        <a class="btn-primary" href="#contacts">Присоединиться</a>
                    </div>
                    <div class="menu-toggle">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="sidebar">
        <button class="close-sidebar">&times;</button>
        <ul>
            <li data-scroll="main">Главная</li>
            <li data-scroll="what-you-get">Что получишь</li>
            <li data-scroll="events">Мероприятия</li>
            <!-- <a target="_blank" href="https://open.dom-club.com"><li>Открытая встреча</li></a> -->
            <li data-scroll="tarifs">Тарифы</li>
            <li data-scroll="contacts">Контакты</li>
        </ul>
        <a class="join-btn btn-primary" href="#contacts">Присоединиться</a>
    </div>
    <section id="main" class="b-main">
        <style>
            video.desktop,
            video.mobile {
                display: none;
            }

            @media (min-width: 768px) {
                video.desktop {
                    display: block;
                }
            }

            @media (max-width: 767px) {
                video.mobile {
                    display: block;
                    width: 100%;
                }
            }
        </style>
        <video
            class="desktop"
            preload="metadata"
            poster="assets/img/video-poster-desktop.jpg"
            playsinline
            muted
            loop
             loading="lazy"
            autoplay>
            <source type="video/MP4" src="assets/video/dd.MP4">
        </video>

        <video
            class="mobile"
            preload="metadata"
            playsinline
            muted
            autoplay
            loopя
             loading="lazy">
            <source type="video/MP4" src="assets/video/dm.MP4">
        </video>

        <div class="full-screen container">
            <div class="flex-center">
                <div class="flex title">
                    <h1>
                        <span>Семейный бизнес-клуб для </span><span>предпринимателей</span>
                    </h1>
                </div>

                <div class="form-main">
                    <form id="mainJoinForm" class="g-10 flex" action="send.php" method="post" novalidate>
                        <input class="p2 maskphone" placeholder="Введите телефон" maxlength="30" type="tel" id="phone" name="phone" required>
                        <button class="btn-primary" type="submit">Присоединиться</button>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <section id="what-you-get" class="how-you-have">
        <div class="container">
            <div class="flex-center">
                <div class="flex">
                    <h2>Что ты получишь?</h2>
                </div>

                <div class="f3b">
                    <div class="flex flex-colomn">
                        <div class="block leisure">
                            <div class="flip-card">
                                <div class="flip-front">
                                    <h4>Бизнес</h4>
                                    <img class="how-svg" src="assets/img/illustrations/how.svg" alt="">
                                </div>
                                <div class="flip-back">
                                    <h4>Бизнес</h4>
                                    <ul class="features-list">
                                        <li>Мастермайнд спич-встречи <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Нетворкинг <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Отраслевые чаты <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Форум группа <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Доступ к офису <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Фирменный мерч <img src="assets/img/illustrations/point.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="block family">
                            <div class="flip-card">
                                <div class="flip-front">
                                    <h4>Инвестиции</h4>
                                    <img class="how-svg" src="assets/img/illustrations/how.svg" alt="">
                                </div>
                                <div class="flip-back">
                                    <h4>Инвестиции</h4>
                                    <ul class="features-list">
                                        <li>Привлечение капиталов<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Инвест питчинг<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Разбор инвестиционных стратегий<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Курсы по управлению капиталом<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Менторские программы<img src="assets/img/illustrations/point.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-colomn">
                        <div class="block network">
                            <div class="flip-card">
                                <div class="flip-front">
                                    <h4>Экспертность</h4>
                                    <img class="how-svg" src="assets/img/illustrations/how.svg" alt="">
                                </div>
                                <div class="flip-back">
                                    <h4>Экспертность</h4>
                                    <ul class="features-list">
                                        <li>Встреча с экспертом<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Zoom с экспертом<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Экскурсии в корпорации<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Бизнес-завтраки<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Разбор клубных кейсов<img src="assets/img/illustrations/point.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="block invest">
                            <div class="flip-card">
                                <div class="flip-front">
                                    <h4>Семья</h4>
                                    <img class="how-svg" src="assets/img/illustrations/how.svg" alt="">
                                </div>
                                <div class="flip-back">
                                    <h4>Семья</h4>
                                    <ul class="features-list">
                                        <li>Мероприятие для “вторых половинок”<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Экскурсии в корпорации резидентов<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>PR детских проектов<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Kids/Junior events<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Лекции/семинары<img src="assets/img/illustrations/point.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-colomn">
                        <div class="block expertise">
                            <div class="flip-card">
                                <div class="flip-front">
                                    <h4>Досуг</h4>
                                    <img class="how-svg" src="assets/img/illustrations/how.svg" alt="">
                                </div>
                                <div class="flip-back">
                                    <h4>Досуг</h4>
                                    <ul class="features-list">
                                        <li>Спорт<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Культура<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Travel<img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Развлечение<img src="assets/img/illustrations/point.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="block bonus">
                            <div class="flip-card">
                                <div class="flip-front">
                                    <h4>Партнерство/Поддержка</h4>
                                    <img class="how-svg" src="assets/img/illustrations/how.svg" alt="">
                                </div>
                                <div class="flip-back">
                                    <h4>Партнерство/Поддержка</h4>
                                    <ul class="features-list">
                                        <li>PR личного бренда <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Бадди <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Психологические групповые сессии <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Личный комьюнити менеджер <img src="assets/img/illustrations/point.svg" alt=""></li>
                                        <li>Создание совместных проектов <img src="assets/img/illustrations/point.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="descor">
        <div class="container ">
            <div class="flex-center">
                <div class="column title">


                </div>
                <div class="flex">
                    <div class="card-descor">
                        <div class="content">
                            <div class="sub-content">
                                <p class="title">Мастер-майнд</p>
                                <img src="assets/img/circle.svg" alt="">
                            </div>
                            <p class="description">формат работы в группе, при котором участники помогают друг другу достигать цели или решать проблемы, обмениваясь опытом и идеями, поддерживая друг друга</p>

                        </div>
                    </div>
                    <div class="card-descor">
                        <div class="content">
                            <div class="sub-content">
                                <p class="title">Нетворкинг</p>
                                <img src="assets/img/circle.svg" alt="">
                            </div>
                            <p class="description">сильное окружение, которое помогает расти, развивайте взаимовыгодные связи и контакты</p>

                        </div>
                    </div>

                </div>
                <div class="flex">
                    <div class="card-descor">
                        <div class="content">
                            <div class="sub-content">
                                <p class="title">Инвест—питчинг</p>
                                <img src="assets/img/circle.svg" alt="">
                            </div>
                            <p class="description">локальные встречи внутри клуба с возможностью инвестирования или привлечения средств в вашу идею</p>

                        </div>
                    </div>
                    <div class="card-descor">
                        <div class="content">
                            <div class="sub-content">
                                <p class="title">Форум-группа</p>
                                <img src="assets/img/circle.svg" alt="">
                            </div>
                            <p class="description">вы и еще 9 предпринимателей, которые встречаются 1 раз в месяц для решения личных и бизнес запросов</p>

                        </div>
                    </div>

                </div>




            </div>
        </div>
    </section>












    <section id="events" class="how-you-have full-screen">
        <div class="flex-event">
            <?php
            $jsonFile = 'data/events.json';

            if (file_exists($jsonFile)) {
                $jsonData = file_get_contents($jsonFile);
                $monthsData = json_decode($jsonData, true);

                if ($monthsData && isset($monthsData['months'])) {
                    foreach ($monthsData['months'] as $monthData) {
            ?>
                        <div class="flex afisha">
                            <div class="flex mouth">
                                <h3><?= htmlspecialchars($monthData['name']) ?></h3>
                                <p><?= htmlspecialchars($monthData['eventCount']) ?> мероприятия</p>
                            </div>
                            <div class="forech">
                                <?php foreach ($monthData['events'] as $event): ?>
                                    <div class="flex ivent">
                                        <div class="top">
                                            <div class="flex event">
                                                <div class="day">
                                                    <p><?= htmlspecialchars($event['dayOfWeek']) ?></p>
                                                </div>
                                                <div class="flex c-p">
                                                    <div class="time">
                                                        <p class="date-text"><?= htmlspecialchars($event['date']) ?></p>
                                                        <p class="time-text"><?= htmlspecialchars($event['time']) ?></p>

                                                        <img src="assets/img/circle.svg" alt="">
                                                    </div>
                                                </div>

                                                <div class="names-text">
                                                    <p class="title"><?= htmlspecialchars($event['title']) ?></p>
                                                    <div class="flex">
                                                        <ul>
                                                            <?php foreach ($event['features'] as $feature): ?>
                                                                <li><?= htmlspecialchars($feature) ?></li>
                                                            <?php endforeach; ?>

                                                        </ul>
                                                        <div class="bottom-adress">
                                                            <?php if (isset($event['location'])): ?>
                                                                <!-- выводим адрес события если он есть -->
                                                                <?= htmlspecialchars($event['location']) ?>
                                                            <?php endif; ?>

                                                            <!-- блок с ссылкой на событие -->
                                                            <?php if (isset($event['link']) && isset($event['name_link'])): ?>
                                                                <a class="link" href="<?= htmlspecialchars($event['link']) ?>">
                                                                    <?= htmlspecialchars($event['name_link']) ?>
                                                                    <img src="assets/img/link.svg" alt="">
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>

                                                    </div>

                                                    <?php if (!empty($event['calendarLink'])): ?>
                                                        <a class="btn-primary" target="_blank" href="<?= htmlspecialchars($event['calendarLink']) ?>">Добавить в календарь</a>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="bottom-vill">
                                                    <img class="event-img" src="<?= htmlspecialchars($event['img']) ?>" alt="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "<p>Ошибка загрузки данных</p>";
                }
            } else {
                echo "<p>Файл с данными не найден</p>";
            }
            ?>
        </div>
    </section>











    <section class="cards-our-team">
        <!-- Карточка 1 -->
        <div class="card">
            <h3 class="card-title">Предназначение</h3>
            <img class="lustr" src="assets/img/our-1.svg" alt="">
            <div class="card-gradient" style="overflow: hidden; background-color: black;">
                <canvas id="canvas" width="1920" height="1080" style="display: block; filter: blur(100px); will-change: filter; transform: translateZ(0);"></canvas>
            </div>
            <img class="card-our" src="assets/img/card-our/1.webp" alt="">
            <!-- Основной текст, который будет появляться -->
            <div class="card-text">
                <div class="text-section">
                    <p>• Помогать людям проживать полноценную сбалансированную жизнь</p><br>
                    <p>• Объединить единомышленников по балансу бизнеса и семьи</p><br>
                    <p>• Помогать резидентам выделять время на развитие себя и своей семьи</p><br>
                    <p>• Помогать совмещать бизнес с семьей</p>
                </div>
                <div class="card-image">
                    <img src="assets/img/out-1.svg" alt="">
                </div>
            </div>
        </div>
        <!-- Карточка 2 -->
        <div class="card">
            <h3 class="card-title">Цель</h3>
            <img class="lustr" src="assets/img/our-2.svg" alt="">
            <div class="card-gradient" style="overflow: hidden; background-color: black;">
                <canvas id="canvas" width="1920" height="1080" style="display: block; filter: blur(100px); will-change: filter; transform: translateZ(0);"></canvas>
            </div>
            <img class="card-our" src="assets/img/card-our/2.webp" alt="">
            <!-- Основной текст, который будет появляться -->
            <div class="card-text">
                <div class="text-section">
                    <p>• Создать самый большой семейный бизнес-клуб для предпринимателей</p><br>
                    <p>• Достичь показателей в 300 резидентов к осени 2025 года и 1000 резидентов к 2027 году</p><br>
                    <p>• Открыть представительство клуба в Москве к осени 2025 года и филиал клуба в Дубае к маю 2026 года</p>
                </div>
                <div class="card-image">
                    <img src="assets/img/out-2.svg" alt="">
                </div>
            </div>
        </div>
        <!-- Карточка 3 -->
        <div class="card">
            <h3 class="card-title">Ценности</h3>
            <img class="lustr" src="assets/img/our-3.svg" alt="">
            <div class="card-gradient" style="overflow: hidden; background-color: black;">
                <canvas id="canvas" width="1920" height="1080" style="display: block; filter: blur(100px); will-change: filter; transform: translateZ(0);"></canvas>
            </div>
            <img class="card-our" src="assets/img/card-our/3.webp" alt="">
            <!-- Основной текст, который будет появляться -->
            <div class="card-text">
                <div class="text-section">
                    <p>• Баланс</p><br>
                    <p>• Окружение</p><br>
                    <p>• Бизнес</p><br>
                    <p>• Вдохновение</p>
                </div>
                <div class="card-image">
                    <img src="assets/img/out-3.svg" alt="">
                </div>
            </div>
        </div>

    </section>









    <section class="founder ">
        <div class="container ">
            <div class="flex-center">
                <img class="mobile-founder" src="assets/img/founder_mobile.webp" alt="">
                <div class="flex column title">
                    <h3>
                        <span>Александр</span> <span>Казаченко</span>
                    </h3>
                    <p class="description">Основатель Alliance Group</p>
                </div>
                <div class="regalia  flex">
                    <ul>
                        <li>900+ инвест. объектов</li>
                        <li>7 бизнес-юнитов</li>
                        <li>3 млрд оборот</li>
                        <li>25 лет в бизнесе</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- <section id="residents" class="residents">
        <div class="container">
            <div class="flex-center">
                <div>
                    <h3>Спикеры</h3>
                </div>
                <div class="slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <video class="resident-video" playsinline muted preload="metadata" src="assets/video/1.MP4" onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;"></video>
                                <div class="resident-info">
                                    <h4 class="resident-name">Саша Ермоленко</h4>
                                    <p class="resident-description">Директор департамента дизайна сервисов в VK. Пишет и выступает о дизайне, инклюзии, управлении командами и личностном росте.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <video class="resident-video" playsinline muted preload="metadata" src="assets/video/2.MP4" onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;"></video>
                                <div class="resident-info">
                                    <h4 class="resident-name">Саша Ермоленко</h4>
                                    <p class="resident-description">Директор департамента дизайна сервисов в VK. Пишет и выступает о дизайне, инклюзии, управлении командами и личностном росте.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <video class="resident-video" playsinline muted preload="metadata" src="assets/video/3.MP4" onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;"></video>
                                <div class="resident-info">
                                    <h4 class="resident-name">Саша Ермоленко</h4>
                                    <p class="resident-description">Директор департамента дизайна сервисов в VK. Пишет и выступает о дизайне, инклюзии, управлении командами и личностном росте.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <video class="resident-video" playsinline muted preload="metadata" src="assets/video/4.MP4" onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;"></video>
                                <div class="resident-info">
                                    <h4 class="resident-name">Саша Ермоленко</h4>
                                    <p class="resident-description">Директор департамента дизайна сервисов в VK. Пишет и выступает о дизайне, инклюзии, управлении командами и личностном росте.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <video class="resident-video" playsinline muted preload="metadata" src="assets/video/1.MP4" onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;"></video>
                                <div class="resident-info">
                                    <h4 class="resident-name">Саша Ермоленко</h4>
                                    <p class="resident-description">Директор департамента дизайна сервисов в VK. Пишет и выступает о дизайне, инклюзии, управлении командами и личностном росте.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider-buttons">
                            <div class="custom-navigation">
                                <button class="custom-button prev" onclick="swiper.slidePrev()">
                                    <img src="assets/img/illustrations/arrow-left.svg" alt="">
                                </button>
                                <button class="custom-button next" onclick="swiper.slideNext()">
                                    <img src="assets/img/illustrations/arrow-right.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section id="our_partners" class="our_partners">
        <div class="">
            <div class="flex-center">
                <div class="flex title">
                    <h3><span>Сферы бизнеса, объединяющие </span> <span>участников клуба</span></h3>
                    <img class="opi-1 block-img desktop" src="assets/img/illustrations/our-partners-back.webp" alt="">
                    <img class="opi-1 block-img mobile" src="assets/img/illustrations/our-partners-back-mobile.webp" alt="">
                </div>

            </div>
        </div>
    </section>

    <section id="tarifs" class="tarifs">
        <div class="container">
            <div class="flex-center">
            <img class="tarif-illustration" src="assets/img/illustrations/tarifs.svg" alt="">

                <div class="tarif">
                <div class="card family">
                        <div class="front-card">
                            <div class="header">
                            <div class="title">ПЕРСОНАЛЬНЫЙ <span class="color-red">&bull;</span></div> 
                            <div class="center">для себя</div>

                            </div>
                            
                            <div class="footer">
                                <p>первые 100 резидентов</p>
                                <div class="price">35 000 ₽ <span class="old-price">45 000 ₽</span> <span>месяц</span></div>

                            </div>
                        </div>
                        <div class="back-card">
                            <div class="tarif-card-top">
                                <div class="title">ПЕРСОНАЛЬНЫЙ <span class="color-red">&bull;</span></div>
                                <div class="center">для себя</div>
                               
                                <ul>
                                    <li>Отраслевые чаты</li>
                                    <li>Встречи с экспертом</li>
                                    <li>Форум-группа / мастермайнд</li>
                                    <li>Инвест-питчинг</li>
                                    <li>Поддержка комьюнити-менеджера</li>
                                    <li>Доступ к деловым и развлекательным мероприятиям</li>
                                    <li>Экскурсии в крупные компании и корпорации</li>
                                    <li>Персональный бадди</li>
                                    <li>Участие в клубных слётах</li>
                                    <li>Разбор бизнеса</li>
                                    <li>TRAVEL программа</li>
                                </ul>
                            </div>
                            <div class="footer">
                                <p>первые 100 резидентов</p>
                                <div class="price">35 000 ₽ <span class="old-price">45 000 ₽</span> <span>месяц</span></div>
                                <a class="btn-primary" href="#contacts">Присоединиться</a>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="card family">
                        <div class="front-card">
                            <div class="header">
                            <div class="title">СЕМЕЙНЫЙ <span class="color-red">&bull;&bull;&bull;</span></div> 
                            <div class="center">для семьи</div>

                            </div>
                            
                            <div class="footer">
                                <p>первые 100 резидентов</p>
                                <div class="price">55 000 ₽ <span class="old-price">65 000 ₽</span> <span>месяц</span></div>

                            </div>
                        </div>
                        <div class="back-card">
                            <div class="tarif-card-top">
                                <div class="title">СЕМЕЙНЫЙ <span class="color-red">&bull;&bull;&bull;</span></div>
                                <div class="center">для семьи</div>
                                <p class="description">Всё из тарифа <span class="color-red">ПЕРСОНАЛЬНЫЙ +</span></p>
                                <ul>
                                    <li>Детские и семейные мероприятия</li>
                                    <li>VIP места для всей семьи</li>
                                    <li>Фирменный мерч</li>
                                    <li>PR личного бренда</li>
                                  
                                </ul>
                            </div>
                            <div class="footer">
                                <p>первые 100 резидентов</p>
                                <div class="price">55 000 ₽ <span class="old-price">65 000 ₽</span> <span>месяц</span></div>
                                <a class="btn-primary" href="#contacts">Присоединиться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="famaly">
        <img class="full-photo" src="assets/img/famaly.webp" alt="">
        <div class="container ">
            <div class="flex-center">
                <div class="column title">
                    <h3>
                        <span>СЕМЬЯ & ДЕТИ</span>
                    </h3>
                    <p class="description">Занимают особое место в бизнес-клубе</p>

                </div>
                <div class="nonormal">
                    <p class="description">
                        <span>С нами вы больше не разрываетесь между работой и домом. </span> <br>
                        <span>Ваши дети растут в правильном окружении, а семья становится не жертвой успеха, а его частью.  
                            Здесь вы снова чувствуете вкус жизни.  </span>
                    </p>
                    <img src="assets/img/illustrations/shapeline.svg" alt="">
                </div>
                <p class="title-famaly">FAMILY</p>
                <div class="strange-cards">

                    <div class="strange-cards-flex">
                        <div class="strange-card-content b1-1">
                            <p class="titile">Семейные дни</p>
                            <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                        </div>
                        <div class="strange-card-content b1-2 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Семейные путешествия</p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-2">
                                    <p>Организованные поездки,
                                        в которых можно не только отдохнуть,
                                        но и провести время с пользой

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="strange-card-content b1-3">
                            <p class="titile">Киноклуб/книжный клуб</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                    </div>
                    <div class="strange-cards-flex">
                        <div class="strange-card-content b2-1 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Семейные бизнес-игры</p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-1">
                                    <p>Уникальный формат, в котором родители и дети вместе разрабатывают идеи, участвуют в стратегических играх
                                        и учатся работать в команде
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="strange-card-content b2-2">
                            <p class="titile">Театральные постановки</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                        <div class="strange-card-content b2-3 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Кулинарные мастер-классы</p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-4-4">
                                    <p>Возможность всей семьей научиться готовить блюда от лучших шеф-поваров


                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="strange-cards-flex">
                        <div class="strange-card-content b3-1">
                            <p class="titile">Фотодни и видеопроекты</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                        <div class="strange-card-content b3-2 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Воркшопы по финансовой грамотности для семей</p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-3">
                                    <p>Как правильно управлять семейным бюджетом, инвестировать и учить детей разумному отношению к деньгам


                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="strange-card-content b3-3">
                            <p class="titile">Родительский нетворкинг</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="starter">
        <img class="block-img desktop " src="assets/img/starter.webp" alt="">
        <img class="block-img mobile" src="assets/img/starter-m.webp" alt="">
    </section>
    <section class="famaly">
        <div class="container ">
            <div class="flex-center">

                <p class="title-famaly">KIDS CLUB</p>

                <div class="nonormal">
                    <p class="description">
                        <span>Мы предусмотрели разные форматы для совместного<br> отдыха, развития и укрепления семейных ценностей, для <br>того, чтобы наши резиденты проживали сбалансированную<br> полноценную жизнь</span> <br>
                        <span>Ваши дети растут в правильном окружении, а семья становится не жертвой успеха, а его частью.  
                            Здесь вы снова чувствуете вкус жизни.  </span>
                    </p>
                </div>
                <div class="strange-cards">
                    <div class="strange-cards-flex">
                        <div class="strange-card-content b1-1">
                            <p class="titile">Школа юного предпринимателя</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                        <div class="strange-card-content b1-2 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Бизнес-квесты и симуляции</p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-4">
                                    <p>Игровые форматы, в которых дети пробуют себя в роли стартаперов, инвесторов и управленцев.



                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="strange-card-content b1-3">
                            <p class="titile">Развлекательные мероприятия</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                    </div>
                    <div class="strange-cards-flex">
                        <div class="strange-card-content b2-1 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Творческие мастер-классы </p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-5">
                                    <p>(Рисование, лепка, музыка, актерское мастерство)
                                        — развитие воображения, креативности
                                        и уверенности в себе




                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="strange-card-content b2-2">
                            <p class="titile">Образовательные кружки</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                        <div class="strange-card-content b2-3 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">PR и развитие
                                        детских проектов</p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-6-6">
                                    <p>Помощь и поддержка в развитии детских инициатив и проектов

                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="strange-cards-flex">
                        <div class="strange-card-content b3-1">
                            <p class="titile">Публичные выступления</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                        <div class="strange-card-content b3-2 flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <p class="titile">Финансовая грамотность
                                        и бизнес-игры </p>
                                    <img class="strange-svg" src="assets/img/illustrations/strange-circle.svg" alt="">
                                </div>
                                <div class="flip-card-back fbi-6">
                                    <p>Интерактивные занятия, где дети учатся считать деньги, составлять бюджеты
                                        и управлять ресурсами.




                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="strange-card-content b3-3">
                            <p class="titile">Экскурсии в корпорации</p>
                            <img class="strange-svg" src="assets/img/illustrations/how.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="saving">
        <div class="container ">
            <div class="flex-center">
                <div class="column title">
                    <h3>
                        <span>Безопасность для наших</span> <span>резидентов на всех уровнях</span>
                    </h3>
                </div>
                <div class="flex" id="securityCards">
                    <div class="card-save" data-default-image="assets/img/o1.webp" data-hover-image="assets/img/o1.webp">
                        <div class="card-bg"></div>
                        <div class="card-content">
                            <img src="assets/img/our-1.svg" alt="">
                            <p class="title">Адмиссия на входе</p>
                            <div class="line"></div>
                            <ul class="description">
                                <li>Тщательная проверка кандидатов</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-save" data-default-image="assets/img/o2.webp" data-hover-image="assets/img/o2.webp">
                        <div class="card-bg"></div>
                        <div class="card-content">
                            <img src="assets/img/our-2.svg" alt="">
                            <p class="title">Контроль внутри</p>
                            <div class="line"></div>
                            <ul class="description">
                                <li>комфорт и защита для резидентов</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-save" data-default-image="assets/img/o1.webp" data-hover-image="assets/img/o3.webp">
                        <div class="card-bg"></div>
                        <div class="card-content">
                            <img src="assets/img/our-3.svg" alt="">
                            <p class="title">Доверенная среда</p>
                            <div class="line"></div>
                            <ul class="description">
                                <li>общение только с проверенными участниками</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <style>
                    .card-save {
                        position: relative;
                        overflow: hidden;
                    }

                    .card-bg {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-size: cover;
                        background-position: center;
                        opacity: 0;
                        /* Initially hidden */
                        transition: opacity 0.5s ease;
                        z-index: 1;
                    }

                    .card-content {
                        position: relative;
                        z-index: 2;
                        /* Above the background */
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const securityCards = document.querySelectorAll('#securityCards .card-save');

                        securityCards.forEach(card => {
                            // Get image URLs from data attributes
                            const hoverImage = card.getAttribute('data-hover-image');

                            // Set background image on the background element
                            const bgElement = card.querySelector('.card-bg');
                            bgElement.style.backgroundImage = `url('${hoverImage}')`;

                            // Add hover events
                            card.addEventListener('mouseenter', function() {
                                bgElement.style.opacity = 1;
                            });

                            card.addEventListener('mouseleave', function() {
                                bgElement.style.opacity = 0;
                            });
                        });
                    });
                </script>




            </div>
        </div>
    </section>



    <section class="video" id="video">
    <!-- Десктопное видео с отложенной загрузкой -->
    <video 
        class="desktop" 
        preload="none" 
        poster="assets/img/video-poster-desktop.jpg" 
        muted 
        loop 
        playsinline 
        loading="lazy" 
        data-src="true">
        <source data-src="assets/video/md.webm" type="video/webm" media="(min-width: 768px)">
        <source data-src="assets/video/md.MP4" type="video/mp4" media="(min-width: 768px)">
    </video>
    
    <!-- Мобильное видео с отложенной загрузкой -->
    <video 
        class="mobile" 
        preload="none" 
        poster="assets/img/video-poster-mobile.jpg" 
        muted 
        loop 
        playsinline 
        loading="lazy" 
        data-src="true">
        <source data-src="assets/video/mm.webm" type="video/webm" media="(max-width: 767px)">
        <source data-src="assets/video/mm.MP4" type="video/mp4" media="(max-width: 767px)">
    </video>
    
    <!-- Слоган и другой контент -->
    <!-- <div class="slogan">...</div> -->
</section>
    <section class="slet">
        <img class="block-img desktop" src="assets/img/1.webp" alt="">
        <img class="block-img mobile" src="assets/img/2.webp" alt="">
        <div class="bottom-slet">
            <a class="btn-primary" target="_blank" href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=СЛЁТ+DOM&dates=20250707T100000Z/20250708T180000Z&details=Dom+Club+-+Закрытый+клуб+для+предпринимателей+и+C-level+руководителей.+Слёт+в+Охта+Парке,+Санкт-Петербург&location=Охта+Парк">Добавить в календарь</a>

        </div>
    </section>
    <section class="lid" id="contacts">
        <div class="container">
            <div class="call-back">
                <div class="title">
                    <img src="assets/img/illustrations/arrow.svg" alt="">
                    <h2>
                        <span class="accent">Стань</span><span> резидентом</span>
                    </h2>
                </div>
                <div class="lid-form">

                    <form id="footerJoinForm" action="send.php" method="POST" novalidate>
                        <div class="lid">
                            <div class="input-container">
                                <input type="text" id="name" name="name" maxlength="30" placeholder=" " required>
                                <label for="name">Имя</label>
                            </div>

                            <div class="input-container">
                                <input class="maskphone" type="tel" id="phone" name="phone" placeholder=" " required>
                                <label for="phone">Телефон</label>
                            </div>

                            <div class="input-container">
                                <input type="email" placeholder=" " maxlength="30" name="email" required>
                                <label for="email">Email</label>
                            </div>

                        </div>
                        <button class="btn-primary" type="submit">Отправить</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="footer">
                <div class="footer-top">
                    <div class="footer-item">
                        <span>Основные запросы</span>
                        <a href="mailto:hello@dom.club">hello@dom-club.com</a>
                    </div>
                    <div class="footer-item">
                        <span>Телефон</span>
                        <a href="tel:+74991301160">8-499-130-11-60</a>
                    </div>
                    <div class="footer-item">
                        <span>Социальные сети</span>
                        <div class="social-links">
                            <a class="btn-social btn-instagram" href="https://instagram.com/dom.club.ru?" target="_blank">
                                <img width="20" height="20" src="assets/img/illustrations/inst.svg" alt="">
                                <span>Instagram</span>
                            </a>
                            <a class="btn-social btn-telegram" href="https://t.me/dombusinessclub" target="_blank">
                                <img width="20" height="20" src="assets/img/illustrations/tg.svg" alt="">
                                <span>Telegram</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer-center-left">
                    <div class="footer-item">
                        <span>Фактический Адрес:</span>
                        <p>Огородный проезд 16/1с4</p>
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
                        <a href="#contacts">Политика конфиденциальности</a>
                    </div><div class="footer-item">
                        <a href="#contacts">Договор оферты</a>
                    </div>
                </div>
            </div>

        </div>
    </footer>


    <div class="modal-overlay" id="popupOverlay">
        <div class="modal" id="popup">
            <!-- Кнопка закрытия -->
            <button class="close-btn" id="closePopupBtn">×</button>
            <h2 class="modal-header">
                — всё, что нужно для роста бизнеса в Telegram-канале бизнес-клуба «Дом»
            </h2>
            <div class="modal-card-grid">
                <div class="modal-card">Лекции</div>
                <div class="modal-card">Спикеры</div>
                <div class="modal-card">Анонсы мероприятий</div>
                <div class="modal-card">Форум группа</div>
                <div class="modal-card">Отраслевые чаты</div>
            </div>
            <div class="social-buttons">
                <a class="btn-social btn-instagram" href="https://instagram.com/dom.club.ru?" target="_blank">
                    <img width="20" height="20" src="assets/img/illustrations/inst.svg" alt="">
                    <span>Instagram</span>
                </a>
                <a class="btn-social btn-telegram" href="https://t.me/dombusinessclub" target="_blank">
                    <img width="20" height="20" src="assets/img/illustrations/tg.svg" alt="">
                    <span>Telegram</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalOverlay = document.getElementById('popupOverlay');
            const modal = document.getElementById('popup');
            const closeModalBtn = document.getElementById('closePopupBtn');
            const sletSection = document.querySelector('.slet');
            let hasShown = localStorage.getItem('modalShown') === 'true';

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !hasShown) {
                        setTimeout(() => {
                            modalOverlay.classList.add('show');
                            modal.classList.add('show');
                            hasShown = true;
                            localStorage.setItem('modalShown', 'true');
                        }, 1000);
                    }
                });
            }, {
                threshold: 0.3
            });

            if (sletSection) {
                observer.observe(sletSection);
            }

            const closeModal = () => {
                modal.classList.remove('show');
                modalOverlay.classList.remove('show');
            };

            closeModalBtn.addEventListener('click', closeModal);

            modalOverlay.addEventListener('click', (event) => {
                if (event.target === modalOverlay) {
                    closeModal();
                }
            });
        });
    </script>










    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sidebar functionality
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');
            const closeSidebarBtn = document.querySelector('.close-sidebar');

            // Sidebar toggle
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });

            closeSidebarBtn.addEventListener('click', () => {
                sidebar.classList.remove('open');
            });

            // Close sidebar on menu item click
            sidebar.querySelectorAll('li[data-scroll]').forEach(item => {
                item.addEventListener('click', () => {
                    sidebar.classList.remove('open');
                });
            });
        });
    </script>
    <script src="assets/js/cash.js"></script>
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
    <script src="assets/js/video-optimization.js"></script>

    <!-- Yandex.Metrika Event Tracking -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form submissions tracking
            if (document.getElementById("mainJoinForm")) {
                document.getElementById("mainJoinForm").addEventListener("submit", function() {
                    ym(100329183, 'reachGoal', 'main_form_submit');
                });
            }

            if (document.getElementById("footerJoinForm")) {
                document.getElementById("footerJoinForm").addEventListener("submit", function() {
                    ym(100329183, 'reachGoal', 'footer_form_submit');
                });
            }

            // Join button clicks tracking
            document.querySelectorAll('.btn-primary').forEach(button => {
                button.addEventListener('click', function() {
                    ym(100329183, 'reachGoal', 'join_button_click');
                });
            });

            // Tariff selection tracking
            document.querySelectorAll('.tarif .btn-primary').forEach(btn => {
                btn.addEventListener('click', function() {
                    const tariffName = this.closest('.card').querySelector('.title').textContent.trim();
                    ym(100329183, 'reachGoal', 'tariff_selected', {
                        tariff: tariffName
                    });
                });
            });

            // Event registration tracking
            document.querySelectorAll('a[href*="calendar.google.com"]').forEach(link => {
                link.addEventListener('click', function() {
                    const eventTitle = this.closest('.ivent')?.querySelector('.title')?.textContent.trim();
                    ym(100329183, 'reachGoal', 'event_added_to_calendar', {
                        event: eventTitle || 'Unknown Event'
                    });
                });
            });

            // Social media clicks tracking
            document.querySelectorAll('.btn-social').forEach(link => {
                link.addEventListener('click', function() {
                    const platform = this.classList.contains('btn-instagram') ? 'Instagram' : 'Telegram';
                    ym(100329183, 'reachGoal', 'social_click', {
                        platform: platform
                    });
                });
            });
        });
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(100329183, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/100329183" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->


</body>

</html>