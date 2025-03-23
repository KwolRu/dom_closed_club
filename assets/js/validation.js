document.addEventListener('DOMContentLoaded', function () {
    const emailInputs = document.querySelectorAll("input[name='email']");
    const nameInputs = document.querySelectorAll("input[name='name']");
    const forms = document.querySelectorAll("form");

    // Регулярное выражение для e-mail
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;

    function validateEmailInput(event) {
        const emailInput = event.target;
        const cursorPosition = emailInput.selectionStart; // Запоминаем позицию курсора
        const cleanedValue = emailInput.value.replace(/[^a-zA-Z0-9@._-]/g, ""); // Разрешённые символы

        // Обновляем значение только если оно изменилось
        if (emailInput.value !== cleanedValue) {
            emailInput.value = cleanedValue;
            emailInput.setSelectionRange(cursorPosition - 1, cursorPosition - 1); // Восстанавливаем позицию курсора
        }
    }

    // Маска ввода: запрещаем ввод неразрешённых символов, игнорируем пробелы
    emailInputs.forEach(emailInput => {
        emailInput.addEventListener("input", validateEmailInput);
    });

    // Переменная для отслеживания активных уведомлений
    let activeNotifications = 0;
    const MAX_NOTIFICATIONS = 3;

    function showNotification(title, message, type = 'error') {
        // Проверяем количество активных уведомлений
        if (activeNotifications >= MAX_NOTIFICATIONS) {
            return;
        }

        activeNotifications++;
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerHTML = `
            <div class="notification-title">${title}</div>
            <div class="notification-message">${message}</div>
        `;
        document.body.appendChild(notification);
        
        // Trigger animation
        setTimeout(() => notification.classList.add('show'), 100);
        setTimeout(() => notification.classList.add('shake'), 300);
        
        // Remove notification after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                notification.remove();
                activeNotifications--;
            }, 300);
        }, 5000);
    }

    // Валидация перед отправкой формы
    forms.forEach(form => {
        form.addEventListener("submit", function (e) {
            // Check if phone field exists in the current form
            const phoneInput = form.querySelector(".maskphone");
            if (phoneInput) {
                const phoneValue = phoneInput.value.replace(/\D/g, '');
                
                // Prevent form submission if phone number is invalid
                if (phoneValue.length < 11) {
                    e.preventDefault();
                    showNotification(
                        'Ошибка в номере',
                        'Пожалуйста, введите полный номер телефона'
                    );
                    phoneInput.focus();
                    return;
                }
            }

            // Only check email if it exists in the current form
            const emailInput = form.querySelector("input[name='email']");
            if (emailInput) {
                const emailValue = emailInput.value.trim();
                if (!emailPattern.test(emailValue)) {
                    e.preventDefault();
                    showNotification(
                        'Ошибка в email',
                        'Пожалуйста, введите корректный email адрес (например: example@mail.com)'
                    );
                    emailInput.focus();
                    return;
                }
            }

            // Only check name if it exists in the current form
            const nameInput = form.querySelector("input[name='name']");
            if (nameInput) {
                const nameValue = nameInput.value.trim();
                if (nameValue.length < 2 || nameValue.length > 30) {
                    e.preventDefault();
                    showNotification(
                        'Ошибка в имени',
                        'Имя должно содержать от 2 до 30 символов'
                    );
                    nameInput.focus();
                    return;
                }
                if (/[^a-zA-Zа-яА-ЯёЁ\s]/.test(nameValue)) {
                    e.preventDefault();
                    showNotification(
                        'Неверный формат имени',
                        'Имя должно содержать только буквы и пробелы'
                    );
                    nameInput.focus();
                    return;
                }
            }
        });
    });

    // Маска для номера телефона
    var phoneInputs = document.querySelectorAll(".maskphone");

    phoneInputs.forEach(phoneInput => {
        phoneInput.addEventListener("input", mask);
        phoneInput.addEventListener("focus", mask);
        phoneInput.addEventListener("blur", mask);
    });

    function mask(event) {
        var blank = "+_ (___) ___-__-__";
        var i = 0;
        var val = this.value.replace(/\D/g, "").replace(/^8/, "7").replace(/^9/, "79");

        this.value = blank.replace(/./g, function(char) {
            if (/[_\d]/.test(char) && i < val.length) return val.charAt(i++);
            return i >= val.length ? "" : char;
        });

        if (event.type == "blur") {
            if (this.value.length == 2) this.value = "";
        } else {
            setCursorPosition(this, this.value.length);
        }
    }

    function setCursorPosition(elem, pos) {
        elem.focus();
        if (elem.setSelectionRange) {
            elem.setSelectionRange(pos, pos);
        } else if (elem.createTextRange) {
            var range = elem.createTextRange();
            range.collapse(true);
            range.moveEnd("character", pos);
            range.moveStart("character", pos);
            range.select();
        }
    }
});
