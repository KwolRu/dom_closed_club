document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.classList.add('loaded');
        // Changed: Select canvas from the current card instead of document-wide.
        const canvas = card.querySelector('canvas');
        const ctx = canvas.getContext("2d");

        function resizeCanvas() {
            canvas.width = canvas.clientWidth;
            canvas.height = canvas.clientHeight;
        }

        // Подгоняем размер canvas под контейнер
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        // Задаём фон и применяем CSS‑размытие ко всему canvas
        canvas.style.backgroundColor = "black";
        canvas.style.filter = "blur(60px)";
        canvas.style.transform = "translateZ(0)";

        // Настройки анимации – изменяйте параметры здесь
        const ANIMATION_SETTINGS = {
            CIRCLE_COUNT: 30,      // количество фигур (не используется, если задан COLOR_COUNTS)
            MIN_RADIUS: 120,       // минимальный радиус/размер
            MAX_RADIUS: 180,       // максимальный радиус/размер
            MIN_SPEED: -0.2,       // минимальная скорость
            MAX_SPEED: 1,          // максимальная скорость
            COLORS: ["black", "white", "#F00F38"],  // доступные цвета
            MIN_Z_INDEX: 1,        // минимальный z-index
            MAX_Z_INDEX: 100,      // максимальный z-index
            // Определяет количество фигур для каждого цвета
            COLOR_COUNTS: {        
                "black": 10,
                "white": 10,
                "#F00F38": 10
            }
        };

        const shapes = [];

        // Вспомогательная функция для выбора случайного целого числа
        function randomInt(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

        // Конструктор для круга
        class Circle {
            constructor(x, y, radius, color, dx, dy, zIndex) {
                this.x = x;
                this.y = y;
                this.radius = radius;
                this.color = color;
                this.dx = dx;
                this.dy = dy;
                this.zIndex = zIndex;
            }
            // Отрисовка круга без применения ctx.filter
            draw(ctx) {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.globalCompositeOperation = 'destination-over';
                ctx.fill();
                ctx.closePath();
            }
            // Обновление положения и перерисовка круга
            update(ctx) {
                this.x += this.dx;
                this.y += this.dy;

                // Отскок от границ canvas
                if (this.x + this.radius / 2 > canvas.width || this.x - this.radius / 2 < 0) {
                    this.dx = -this.dx;
                }
                if (this.y + this.radius / 2 > canvas.height || this.y - this.radius / 2 < 0) {
                    this.dy = -this.dy;
                }
                this.draw(ctx);
            }
        }

        // Конструктор для квадрата
        class Square {
            constructor(x, y, size, color, dx, dy, zIndex) {
                this.x = x;
                this.y = y;
                this.size = size;
                this.color = color;
                this.dx = dx;
                this.dy = dy;
                this.zIndex = zIndex;
            }
            // Отрисовка квадрата без применения ctx.filter
            draw(ctx) {
                ctx.beginPath();
                ctx.fillStyle = this.color;
                ctx.globalCompositeOperation = 'destination-over';
                // Центрируем квадрат по (x, y)
                ctx.fillRect(this.x - this.size / 2, this.y - this.size / 2, this.size, this.size);
                ctx.closePath();
            }
            // Обновление положения и перерисовка квадрата
            update(ctx) {
                this.x += this.dx;
                this.y += this.dy;
                if (this.x + this.size / 2 > canvas.width || this.x - this.size / 2 < 0) {
                    this.dx = -this.dx;
                }
                if (this.y + this.size / 2 > canvas.height || this.y - this.size / 2 < 0) {
                    this.dy = -this.dy;
                }
                this.draw(ctx);
            }
        }

        function createCircleOnBorder(color) {
            const radius = randomInt(ANIMATION_SETTINGS.MIN_RADIUS, ANIMATION_SETTINGS.MAX_RADIUS);

            let dx = 0;
            while (dx === 0) {
                dx = randomInt(ANIMATION_SETTINGS.MIN_SPEED, ANIMATION_SETTINGS.MAX_SPEED);
            }
            let dy = 0;
            while (dy === 0) {
                dy = randomInt(ANIMATION_SETTINGS.MIN_SPEED, ANIMATION_SETTINGS.MAX_SPEED);
            }
            const zIndex = randomInt(ANIMATION_SETTINGS.MIN_Z_INDEX, ANIMATION_SETTINGS.MAX_Z_INDEX);

            // Выбираем случайную сторону: left, right, top, bottom
            const sides = ["left", "right", "top", "bottom"];
            const side = sides[Math.floor(Math.random() * sides.length)];

            let x, y;
            if (side === "left") {
                x = radius;
                y = randomInt(radius, canvas.height - radius);
            } else if (side === "right") {
                x = canvas.width - radius;
                y = randomInt(radius, canvas.height - radius);
            } else if (side === "top") {
                x = randomInt(radius, canvas.width - radius);
                y = radius;
            } else {
                x = randomInt(radius, canvas.width - radius);
                y = canvas.height - radius;
            }
            return new Circle(x, y, radius, color, dx, dy, zIndex);
        }

        function createSquareOnBorder(color) {
            const size = randomInt(ANIMATION_SETTINGS.MIN_RADIUS, ANIMATION_SETTINGS.MAX_RADIUS);
            let dx = 0;
            while (dx === 0) {
                dx = randomInt(ANIMATION_SETTINGS.MIN_SPEED, ANIMATION_SETTINGS.MAX_SPEED);
            }
            let dy = 0;
            while (dy === 0) {
                dy = randomInt(ANIMATION_SETTINGS.MIN_SPEED, ANIMATION_SETTINGS.MAX_SPEED);
            }
            const zIndex = randomInt(ANIMATION_SETTINGS.MIN_Z_INDEX, ANIMATION_SETTINGS.MAX_Z_INDEX);
            const sides = ["left", "right", "top", "bottom"];
            const side = sides[Math.floor(Math.random() * sides.length)];
            let x, y;
            if (side === "left") {
                x = size / 2;
                y = randomInt(size / 2, canvas.height - size / 2);
            } else if (side === "right") {
                x = canvas.width - size / 2;
                y = randomInt(size / 2, canvas.height - size / 2);
            } else if (side === "top") {
                x = randomInt(size / 2, canvas.width - size / 2);
                y = size / 2;
            } else {
                x = randomInt(size / 2, canvas.width - size / 2);
                y = canvas.height - size / 2;
            }
            return new Square(x, y, size, color, dx, dy, zIndex);
        }

        function createShapeOnBorder(color) {
            const shapeTypes = ["circle", "square"];
            const chosen = shapeTypes[Math.floor(Math.random() * shapeTypes.length)];
            return chosen === "circle"
                ? createCircleOnBorder(color)
                : createSquareOnBorder(color);
        }

        // Создаём фигуры с учётом заданных цветов
        if (ANIMATION_SETTINGS.COLOR_COUNTS) {
            for (const color in ANIMATION_SETTINGS.COLOR_COUNTS) {
                const count = ANIMATION_SETTINGS.COLOR_COUNTS[color];
                for (let i = 0; i < count; i++) {
                    shapes.push(createShapeOnBorder(color));
                }
            }
        } else {
            const colorsCount = ANIMATION_SETTINGS.COLORS.length;
            const shapesPerColor = Math.floor(ANIMATION_SETTINGS.CIRCLE_COUNT / colorsCount);
            ANIMATION_SETTINGS.COLORS.forEach(color => {
                for (let i = 0; i < shapesPerColor; i++) {
                    shapes.push(createShapeOnBorder(color));
                }
            });
            const remainingShapes = ANIMATION_SETTINGS.CIRCLE_COUNT % colorsCount;
            for (let i = 0; i < remainingShapes; i++) {
                const randomColor = ANIMATION_SETTINGS.COLORS[Math.floor(Math.random() * colorsCount)];
                shapes.push(createShapeOnBorder(randomColor));
            }
        }

        // Сортировка фигур по z-index для корректного наложения
        shapes.sort((a, b) => a.zIndex - b.zIndex);

        // Функция анимации
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            shapes.forEach(shape => shape.update(ctx));
            requestAnimationFrame(animate);
        }

        animate();
    });
});
