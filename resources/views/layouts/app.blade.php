<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'M7 Philippine Cambridge School')</title>
    
    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                        royal: ['"Cinzel"', 'serif'],
                    },
                    colors: {
                        brand: {
                            blue: '#0e2b86',   
                            red: '#da251d',    
                            yellow: '#fcd116', 
                            green: '#009245',  
                            dark: '#0a1a4a',
                        }
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(252, 209, 22, 0.4)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-sans antialiased selection:bg-brand-yellow selection:text-brand-blue">

    <!-- 4-Color Brand Strip -->
    <div class="flex h-1.5 w-full sticky top-0 z-[60]">
        <div class="w-1/4 bg-brand-blue"></div>
        <div class="w-1/4 bg-brand-red"></div>
        <div class="w-1/4 bg-brand-yellow"></div>
        <div class="w-1/4 bg-brand-green"></div>
    </div>

    <!-- Top Bar -->
    <div class="hidden md:block bg-brand-blue text-white/90 text-xs py-2 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="flex space-x-6 font-medium tracking-wide">
                <span class="flex items-center gap-2">📞 +63 917 7217 800</span>
                <span class="flex items-center gap-2">☎️ +6346 458 6588</span>
            </div>
            <div class="flex space-x-4 font-medium">
                <a href="#" class="hover:text-brand-yellow transition">Parent Portal</a>
                <span class="text-white/20">|</span>
                <a href="#" class="hover:text-brand-yellow transition">Staff Login</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-xl sticky top-1.5 z-50 backdrop-blur-lg bg-white/95">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-20 w-auto drop-shadow-lg transition transform group-hover:scale-105" alt="PCIS Logo"> 
                    <div class="flex flex-col justify-center">
                        <h1 class="font-royal font-bold text-brand-blue text-xs md:text-xl leading-none uppercase tracking-wide">
                            M7 Philippine Cambridge<br>
                            <span class="hidden md:inline">International School</span>
                            <span class="md:hidden">Intl. School</span>
                        </h1>
                    </div>
                </a>

                <!-- DESKTOP MENU WITH DROPDOWNS -->
                <div class="hidden xl:flex items-center gap-6 font-bold text-xs text-gray-600 uppercase tracking-widest">
                    
                    <a href="{{ route('home') }}" class="hover:text-brand-blue transition py-2">Home</a>

                    <!-- About Dropdown -->
                    <div class="relative group py-2">
                        <button class="flex items-center hover:text-brand-blue transition">
                            About <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 w-48 bg-white shadow-2xl rounded-lg overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border-t-4 border-brand-blue">
                            <a href="{{ route('about') }}" class="block px-4 py-3 hover:bg-gray-50 hover:text-brand-blue normal-case tracking-normal border-b border-gray-100">Our Story</a>
                            <a href="{{ route('team') }}" class="block px-4 py-3 hover:bg-gray-50 hover:text-brand-blue normal-case tracking-normal">Academic Team</a>
                        </div>
                    </div>

                    <!-- Academics Link -->
                    <a href="{{ route('programmes') }}" class="hover:text-brand-red transition py-2">Academics</a>

                    <!-- Admissions Dropdown -->
                    <div class="relative group py-2">
                        <button class="flex items-center hover:text-brand-green transition">
                            Admissions <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 w-56 bg-white shadow-2xl rounded-lg overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border-t-4 border-brand-green">
                            <a href="{{ route('admissions') }}" class="block px-4 py-3 hover:bg-gray-50 hover:text-brand-green normal-case tracking-normal border-b border-gray-100">Process & Requirements</a>
                            <a href="{{ route('families') }}" class="block px-4 py-3 hover:bg-gray-50 hover:text-brand-green normal-case tracking-normal">International Families</a>
                        </div>
                    </div>

                    <a href="{{ route('life') }}" class="hover:text-brand-yellow transition py-2">Life at PCIS</a>
                    <a href="{{ route('contact') }}" class="hover:text-brand-blue transition py-2">Contact</a>
                    
                    <a href="{{ route('apply.form') }}" class="bg-brand-red text-white px-6 py-2.5 rounded-full shadow-lg hover:bg-red-700 hover:shadow-glow transition transform hover:-translate-y-0.5 font-bold tracking-wider ml-2">
                        Enroll Now
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="xl:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-brand-blue focus:outline-none p-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU LIST -->
        <div id="mobile-menu" class="hidden xl:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-2xl max-h-screen overflow-y-auto">
            <div class="flex flex-col px-6 py-6 space-y-4 font-bold text-gray-700 uppercase tracking-wide text-sm">
                <a href="{{ route('home') }}" class="block hover:text-brand-blue">Home</a>
                
                <div class="border-l-2 border-brand-blue pl-4 space-y-3">
                    <p class="text-xs text-gray-400">About</p>
                    <a href="{{ route('about') }}" class="block hover:text-brand-blue">Our Story</a>
                    <a href="{{ route('team') }}" class="block hover:text-brand-blue">Academic Team</a>
                </div>

                <a href="{{ route('programmes') }}" class="block hover:text-brand-red">Academics</a>
                
                <div class="border-l-2 border-brand-green pl-4 space-y-3">
                    <p class="text-xs text-gray-400">Admissions</p>
                    <a href="{{ route('admissions') }}" class="block hover:text-brand-green">Process</a>
                    <a href="{{ route('families') }}" class="block hover:text-brand-green">Intl. Families</a>
                </div>

                <a href="{{ route('life') }}" class="block hover:text-brand-yellow">Life at PCIS</a>
                <a href="{{ route('contact') }}" class="block hover:text-brand-blue">Contact Us</a>
                
                <a href="{{ route('apply.form') }}" class="block text-center bg-brand-red text-white py-4 rounded-lg shadow-md mt-4">Enroll Now</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-blue text-white pt-16 pb-8 border-t-[6px] border-brand-yellow">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Brand -->
            <div>
                <img src="{{ asset('images/logo.png') }}" class="h-14 w-auto brightness-0 invert opacity-90 mb-4" alt="White Logo">
                <p class="text-sm text-blue-100/80 leading-relaxed font-light">
                    Unity, Integrity, Growth. Shaping global leaders through world-class Cambridge education.
                </p>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="font-royal font-bold text-brand-yellow text-lg mb-4 tracking-wide">Contact Us</h4>
                <div class="text-sm text-blue-100/80 space-y-2 font-light">
                    <p>Km. 25 Gen. Aguinaldo Highway,<br>Anabu II-D, Imus, Cavite</p>
                    <p>+6346 458 6588</p>
                    <p>admissions@pcis.edu.ph</p>
                </div>
            </div>
            <!-- Directory -->
            <div>
                <h4 class="font-royal font-bold text-brand-yellow text-lg mb-4 tracking-wide">Directory</h4>
                <ul class="text-sm space-y-2 text-blue-100/80 font-light">
                    <li><a href="mailto:registrar@pcis.edu.ph" class="hover:text-white">Registrar's Office</a></li>
                    <li><a href="mailto:admin@pcis.edu.ph" class="hover:text-white">IT Support</a></li>
                    <li><a href="mailto:headmaster@pcis.edu.ph" class="hover:text-white">Deputy Headmaster</a></li>
                </ul>
            </div>
            <!-- Links -->
            <div>
                <h4 class="font-royal font-bold text-brand-yellow text-lg mb-4 tracking-wide">Quick Links</h4>
                <ul class="text-sm space-y-2 text-blue-100/80 font-light">
                    <li><a href="{{ route('apply.form') }}" class="hover:text-white">Online Application</a></li>
                    <li><a href="#" class="hover:text-white">Tuition Fees</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10 pt-8 text-center text-xs text-white/40 font-light">
            &copy; {{ date('Y') }} M7 Philippine Cambridge International School.
        </div>
    </footer>

    <!-- Script for Mobile Menu -->
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>