document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-links a, .nav-right a');
    const homeLink = document.querySelector('.home-link');

    // 獲取當前頁面的名稱
    const currentPage = window.location.pathname.split("/").pop();

    // 檢查是否有儲存的鏈接
    let activeLink = localStorage.getItem('activeLink');

    function setActiveLink(link) {
        navLinks.forEach(navLink => navLink.classList.remove('active'));
        link.classList.add('active');
        localStorage.setItem('activeLink', link.getAttribute('href'));
    }

    // 如果沒有儲存的鏈接，或者當前頁面是首頁，則設置「訊息公告」為活動狀態
    if (!activeLink || currentPage === '' || currentPage === 'index.html' || currentPage === 'announcement.html') {
        setActiveLink(homeLink);
    } else {
        navLinks.forEach(link => {
            if (link.getAttribute('href') === activeLink) {
                setActiveLink(link);
            }
        });
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (this !== homeLink) {
                setActiveLink(this);
            } else {
                navLinks.forEach(navLink => navLink.classList.remove('active'));
                localStorage.removeItem('activeLink');
            }
        });
    });
});