document.addEventListener('DOMContentLoaded', () => {
    const navItems = document.querySelectorAll('nav ul li');
    const initialActive = document.querySelector('nav ul li.active');
    let activeItem = initialActive;
    const nav = document.querySelector('nav ul');
    const headerHeight = document.querySelector('header').offsetHeight;
    const offset = 20; // Additional offset in pixels
    
    const background = document.createElement('div');
    background.classList.add('nav-background');
    nav.appendChild(background);

    // Set initial size and position
    function updateBackground(item) {
        if (!item) return;
        background.style.width = `${item.offsetWidth}px`;
        background.style.height = `${item.offsetHeight}px`;
        background.style.transform = `translateX(${item.offsetLeft}px)`;
    }

    // Optimize mouse following
    let rafId = null;
    let isHovering = false;

    function smoothFollow(e) {
        if (isHovering) return;
        
        if (rafId) cancelAnimationFrame(rafId);
        
        rafId = requestAnimationFrame(() => {
            const navRect = nav.getBoundingClientRect();
            const mouseX = e.clientX - navRect.left;
            const backgroundWidth = initialActive.offsetWidth;
            const centeredX = mouseX - (backgroundWidth / 2);
            
            // Boundary limits
            const maxX = navRect.width - backgroundWidth;
            const boundedX = Math.max(0, Math.min(centeredX, maxX));
            
            background.style.width = `${backgroundWidth}px`;
            background.style.transform = `translateX(${boundedX}px)`;
        });
    }

    // Smooth scroll function
    function scrollToElement(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerHeight - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }

    // Initial position
    updateBackground(activeItem);

    // Event handlers
    nav.addEventListener('mousemove', smoothFollow);
    nav.addEventListener('mouseleave', () => {
        if (rafId) cancelAnimationFrame(rafId);
        updateBackground(activeItem);
    });

    navItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            isHovering = true;
            if (rafId) cancelAnimationFrame(rafId);
            updateBackground(item);
        });

        item.addEventListener('mouseleave', () => {
            isHovering = false;
        });

        item.addEventListener('click', () => {
            updateBackground(item);
            const sectionId = item.getAttribute('data-scroll');
            scrollToElement(sectionId);
            updateDshState(true);
        });
    });

    // Update active menu item on scroll
    window.addEventListener('scroll', function() {
        let current = '';
        const sections = document.querySelectorAll('section');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - headerHeight - offset;
            if (window.pageYOffset >= sectionTop) {
                current = section.getAttribute('id');
            }
        });

        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('data-scroll') === current) {
                item.classList.add('active');
            }
        });
    });

    const sidebar = document.querySelector('.sidebar');
    const closeSidebarBtn = document.querySelector('.close-sidebar');
    const dshEl = document.querySelector('.dsh');

    function updateDshState(isActive) {
        if (!dshEl) return;
        if (isActive) dshEl.classList.add('active');
        else dshEl.classList.remove('active');
    }

    document.querySelector('.menu-toggle').addEventListener('click', () => {
        sidebar.classList.add('active');
        updateDshState(true);
    });
    closeSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('active');
        updateDshState(false);
    });

    document.querySelector('.menu-toggle').addEventListener('click', () => {
        document.querySelector('nav').classList.toggle('active');
    });

    document.querySelectorAll('.sidebar ul li').forEach(sideItem => {
        sideItem.addEventListener('click', () => {
            sidebar.classList.remove('active');
            updateDshState(false);
            const target = sideItem.getAttribute('data-scroll');
            if (target) scrollToElement(target);
        });
    });

    const header = document.querySelector('header');
    const menuItems = document.querySelectorAll('header nav ul li, .sidebar ul li');
    let lastScrollTop = 0;

    // Header scroll behavior
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add/remove header background when scrolling
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        lastScrollTop = scrollTop;

        // Update active menu item based on scroll position
        const sections = document.querySelectorAll('section[id]');
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            if (scrollTop >= sectionTop && scrollTop < sectionTop + sectionHeight) {
                menuItems.forEach(item => {
                    item.classList.remove('active');
                    if (item.getAttribute('data-scroll') === section.getAttribute('id')) {
                        item.classList.add('active');
                    }
                });
            }
        });
    });

    // Smooth scroll to section when clicking menu items
    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            const sectionId = item.getAttribute('data-scroll');
            const section = document.getElementById(sectionId);
            if (section) {
                window.scrollTo({
                    top: section.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    const menuToggle = document.querySelector('.menu-toggle');
    const sidebarLinks = document.querySelectorAll('.sidebar li');
    const joinBtn = document.querySelector('.sidebar .join-btn');

    function toggleSidebar() {
        sidebar.classList.toggle('active');
    }

    function closeSidebar() {
        sidebar.classList.remove('active');
    }

    menuToggle.addEventListener('click', toggleSidebar);
    closeSidebarBtn.addEventListener('click', closeSidebar);

    // Close sidebar when clicking on links
    sidebarLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

    // Close sidebar when clicking join button
    if (joinBtn) {
        joinBtn.addEventListener('click', closeSidebar);
    }

    // Close sidebar when clicking outside
    document.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target) && sidebar.classList.contains('active')) {
            closeSidebar();
        }
    });
});
