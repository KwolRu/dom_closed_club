(async function() {
    const versionURL = "/version.txt"; // путь к файлу версии
    const versionKey = "site_version"; // ключ для хранения версии в localStorage

    try {
        // Получаем текущую версию с сервера
        const response = await fetch(versionURL, { cache: "no-store" });
        const latestVersion = await response.text();
        
        const savedVersion = localStorage.getItem(versionKey);

        if (savedVersion !== latestVersion.trim()) {
            // Версия изменилась → очищаем кэш
            localStorage.setItem(versionKey, latestVersion.trim());
            clearCacheAndReload();
        }
    } catch (e) {
        console.error("Ошибка проверки версии:", e);
    }
})();

// Функция очистки кэша и перезагрузки
function clearCacheAndReload() {
    console.log("Обновление версии сайта! Очистка кэша...");

    // Очищаем кэшированные файлы
    if ('caches' in window) {
        caches.keys().then(names => {
            names.forEach(name => caches.delete(name));
        });
    }

    // задержка перед перезагрузкой для отображения логов
    setTimeout(() => window.location.reload(true), 1000);
}
