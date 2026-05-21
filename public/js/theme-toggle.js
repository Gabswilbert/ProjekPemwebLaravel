/**
 * Dark Theme Toggle Helper
 * Ini adalah script global untuk mengelola dark theme di semua halaman
 */

(function() {
    'use strict';

    // Debug: indicate script loaded
    try { console.debug && console.debug('theme-toggle: script loaded'); } catch (e) {}

    // Initialize theme on page load
    const initializeTheme = () => {
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        const isDark = savedTheme === 'dark' || (savedTheme === null && prefersDark);
        try { console.debug && console.debug('theme-toggle: initializeTheme isDark=', isDark, 'savedTheme=', savedTheme); } catch (e) {}

        if (isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    };

    // Setup theme toggle button
    const setupThemeToggle = () => {
        const toggleBtn = document.getElementById('theme-toggle');
        try { console.debug && console.debug('theme-toggle: setupThemeToggle found toggleBtn=', !!toggleBtn); } catch (e) {}

        if (!toggleBtn) {
            return;
        }

        const updateIcon = () => {
            const icon = toggleBtn.querySelector('i');
            if (!icon) return;
            
            const isDark = document.documentElement.classList.contains('dark');
            icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        };

        // Update icon on load
        updateIcon();
        try { console.debug && console.debug('theme-toggle: updateIcon done'); } catch (e) {}

        // Add click handler
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const isDark = document.documentElement.classList.contains('dark');
            
            if (isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }

            // Update icon
            updateIcon();
            try { console.debug && console.debug('theme-toggle: click toggled, now dark=', document.documentElement.classList.contains('dark')); } catch (e) {}
        });

        // Prevent accidental double clicks
        toggleBtn.addEventListener('dblclick', function(e) {
            e.preventDefault();
        });
    };

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setupThemeToggle();
        });
    } else {
        setupThemeToggle();
    }

    // Initialize theme immediately (before rendering)
    initializeTheme();
    // Mark as initialized so fallback handlers can detect it
    try {
        window.themeToggleLoaded = true;
    } catch (e) {
        // ignore
    }

})();
