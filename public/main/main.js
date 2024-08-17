document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector(".menu-button");
    const navLinks = document.querySelector(".nav-links");
    const nav = document.querySelector("nav");

    menuButton.addEventListener("click", function() {
        navLinks.classList.toggle("active");
        nav.classList.toggle("active");
    });

    // 點擊選單按鈕後關閉菜單
    navLinks.addEventListener("click", function(e) {
        if (e.target.tagName === 'A') {
            navLinks.classList.remove("active");
            nav.classList.remove("active");
        }
    });

    // 處理窗口大小變化
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            navLinks.classList.remove("active");
            nav.classList.remove("active"); // 窗口大小變化時移除 nav 的 active 類別
        }
    });
});
