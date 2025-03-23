document.addEventListener('DOMContentLoaded', function() {
    const monthElement = document.querySelector('.mouth h3');
    const eventCountElement = document.querySelector('.mouth p');
    const foreachContainer = document.querySelector('.forech');

    if (!monthElement || !eventCountElement || !foreachContainer) {
        console.error('Required elements not found');
        return;
    }

    monthElement.textContent = eventsData.month;
    eventCountElement.textContent = `${eventsData.eventCount} мероприятия`;

    foreachContainer.innerHTML = eventsData.events.map(event => `
        <div class="flex ivent">
            <div class="top">
                <div class="flex event">
                    <div class="day">
                        <p>${event.dayOfWeek}</p>
                    </div>
                    <div class="flex c-p">
                        <img src="assets/img/circle.svg" alt="">
                        <div class="time">
                            <p class="date-text">${event.date}</p>
                            <p class="time-text">${event.timeRange}</p>
                        </div>
                    </div>
                    <div class="bottom-vill"></div>
                    <div class="names-text">
                        <p class="title">${event.title}</p>
                        <ul>
                            ${event.features.map(feature => `<li>${feature}</li>`).join('')}
                        </ul>
                        <a class="btn-primary" href="#">Добавить в календарь</a>
                    </div>
                </div>
                <div class="bottom">
                    <div class="bottom-adress">
                        ${event.location}
                    </div>
                    <a href="${event.link}" class="link">
                        <img src="assets/img/link.svg" alt="">
                        <p>ссылка</p>
                    </a>
                </div>
            </div>
        </div>
    `).join('');

    console.log('Events loaded:', eventsData.events.length); // Для отладки
});
