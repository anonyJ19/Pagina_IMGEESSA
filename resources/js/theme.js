// Script para alternar favicon según el tema del navegador/sistema
(function() {
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    function setFavicon(isDark) {
        const favicon = document.getElementById('favicon');
        if (favicon) {
            favicon.setAttribute('href', isDark ? "/img/logo-d.png?v=3" : "/img/logo-l.png?v=3");
        }
    }
    setFavicon(mediaQuery.matches);
    try {
        mediaQuery.addEventListener('change', (e) => setFavicon(e.matches));
    } catch (err) {
        mediaQuery.addListener((e) => setFavicon(e.matches));
    }
})();

// Script inicial para prevenir parpadeo de Dark Mode
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-theme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    window.isDark = true;
} else {
    document.documentElement.classList.remove('dark');
    window.isDark = false;
}
