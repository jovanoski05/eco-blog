<header class="bg-white dark:bg-gray-800 shadow-lg">
        <nav class="container mx-auto px-20 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-indigo-800 dark:text-white transition-colors duration-300">
                <img src="/images/logo.png" style="width: 10%; height: 10%;">
            </a>
            <div class="hidden md:flex space-x-6">
                <a href="/" class="nav-link text-gray-700 dark:text-gray-200 dark:hover:text-white transition-colors duration-300">Home</a>
                <a href="/posts" class="nav-link text-gray-700 dark:text-gray-200 dark:hover:text-white transition-colors duration-300">Posts</a>

                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="nav-link text-gray-700 dark:text-gray-200 dark:hover:text-white transition-colors duration-300">Log Out</button>
                    </form>
                @endauth

                @guest
                <a href="/login" class="nav-link text-gray-700 dark:text-gray-200 dark:hover:text-white transition-colors duration-300">Log In</a>
                <a href="/register" class="nav-link text-gray-700 dark:text-gray-200 dark:hover:text-white transition-colors duration-300">Register</a>
                @endguest
            </div>
            <div class="hidden md:flex items-center space-x-4">
                
            </div>
            <button id="mobileMenuButton" class="md:hidden text-gray-700 dark:text-gray-200 hover:text-indigo-800 dark:hover:text-white focus:outline-none transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
        <div id="mobileMenu" class="mobile-menu md:hidden bg-white dark:bg-gray-800 shadow-lg absolute w-full left-0 transform -translate-y-full opacity-0">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="/" class="block text-gray-700 dark:text-gray-200 hover:text-indigo-800 dark:hover:text-white transition-colors duration-300">Home</a>
                <a href="/posts" class="block text-gray-700 dark:text-gray-200 hover:text-indigo-800 dark:hover:text-white transition-colors duration-300">Posts</a>

                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="block text-gray-700 dark:text-gray-200 hover:text-indigo-800 dark:hover:text-white transition-colors duration-300">Log Out</button>
                    </form>
                @endauth

                @guest
                <a href="/login" class="block text-gray-700 dark:text-gray-200 hover:text-indigo-800 dark:hover:text-white transition-colors duration-300">Log In</a>
                <a href="/register" class="block text-gray-700 dark:text-gray-200 hover:text-indigo-800 dark:hover:text-white transition-colors duration-300">Register</a>
                @endguest
            </div>
        </div>
    </header>

    <script>
        const darkModeToggle = document.getElementById('darkModeToggle');
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        let isDarkMode = false;
        let isMobileMenuOpen = false;

        function toggleDarkMode() {
            isDarkMode = !isDarkMode;
            document.documentElement.classList.toggle('dark');
            updateDarkModeIcon();
        }

        function updateDarkModeIcon() {
            darkModeToggle.innerHTML = isDarkMode
                ? '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>';
        }

        function toggleMobileMenu() {
            isMobileMenuOpen = !isMobileMenuOpen;
            if (isMobileMenuOpen) {
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
            } else {
                mobileMenu.classList.remove('translate-y-0', 'opacity-100');
                mobileMenu.classList.add('-translate-y-full', 'opacity-0');
            }
        }

        darkModeToggle.addEventListener('click', toggleDarkMode);
        mobileMenuButton.addEventListener('click', toggleMobileMenu);

        // Toggle dark mode based on system preference
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            toggleDarkMode();
        }

        // Add fade-in animation to nav links
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach((link, index) => {
            link.classList.add('animate-fade-in');
            link.style.animationDelay = `${index * 0.1}s`;
        });
    </script>