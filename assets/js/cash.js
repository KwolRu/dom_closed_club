// (async function() {
//     const versionURL = "/version.txt";
//     const versionKey = "site_version";

//     try {
//         const response = await fetch(versionURL, { cache: "no-store" });
//         const latestVersion = await response.text();
//         const savedVersion = localStorage.getItem(versionKey);

//         if (savedVersion !== latestVersion.trim()) {
//             localStorage.setItem(versionKey, latestVersion.trim());
//             await clearCacheAndReload();
//         }
//     } catch (e) {
//         console.error("Ошибка проверки версии:", e);
//     }
// })();

// async function clearCacheAndReload() {
//     console.log("Обновление версии сайта! Очистка кэша...");

//     try {
//         // Очистка Cache API
//         if ('caches' in window) {
//             const cacheKeys = await caches.keys();
//             await Promise.all(cacheKeys.map(key => caches.delete(key)));
//         }

//         // Очистка Service Worker
//         if ('serviceWorker' in navigator) {
//             const registrations = await navigator.serviceWorker.getRegistrations();
//             await Promise.all(registrations.map(reg => reg.unregister()));
//         }

//         // Очистка Application Cache (для старых браузеров)
//         if (window.applicationCache) {
//             window.applicationCache.abort();
//         }

//         // Очистка локального хранилища
//         localStorage.clear();
//         sessionStorage.clear();

//         // Очистка индексированной БД
//         if (window.indexedDB) {
//             const databases = await window.indexedDB.databases();
//             databases.forEach(db => window.indexedDB.deleteDatabase(db.name));
//         }

//         // Перезагрузка с очисткой кэша
//         setTimeout(() => {
//             window.location.href = window.location.href + '?clear=' + Date.now();
//         }, 1000);
//     } catch (err) {
//         console.error("Ошибка при очистке кэша:", err);
//         window.location.reload(true);
//     }
// }
