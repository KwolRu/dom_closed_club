document.addEventListener("DOMContentLoaded", () => {
    const regaliaElem = document.querySelector(".regalia");
    if (!regaliaElem) return;
    const items = regaliaElem.querySelectorAll("li");

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add("red-fill");
                        setTimeout(() => {
                            item.classList.remove("red-fill");
                        }, 1500);
                    }, index * 300);
                });
                observer.disconnect();
            }
        });
    });

    observer.observe(regaliaElem);
});
