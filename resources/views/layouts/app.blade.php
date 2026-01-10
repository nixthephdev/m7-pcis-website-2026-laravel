<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'M7 Philippine Cambridge School')</title>
    
    <!-- FONTS: Playfair (Headers), Montserrat (Nav/Sub), Lato (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Lato"', 'sans-serif'],
                        header: ['"Playfair Display"', 'serif'],
                        sub: ['"Montserrat"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            blue: '#00539C',   /* Deep Blue */
                            gold: '#F4A300',   /* Warm Gold */
                            red: '#D72638',    /* Bold Red */
                            teal: '#009688',   /* Vivid Teal */
                        },
                        bg: {
                            primary: '#F9F9F9',
                            secondary: '#F4F4F4',
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 83, 156, 0.1)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg-primary text-gray-800 flex flex-col min-h-screen font-sans antialiased">

    <!-- Brand Strip -->
    <div class="flex h-1.5 w-full sticky top-0 z-[60]">
        <div class="w-1/4 bg-brand-blue"></div>
        <div class="w-1/4 bg-brand-red"></div>
        <div class="w-1/4 bg-brand-gold"></div>
        <div class="w-1/4 bg-brand-teal"></div>
    </div>

    <!-- Top Bar -->
    <div class="hidden md:block bg-brand-blue text-white text-xs py-2">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="flex space-x-6 font-medium tracking-wide">
                <span class="flex items-center gap-2">📞 +63 917 7217 800</span>
                <span class="flex items-center gap-2">☎️ +6346 458 6588</span>
            </div>
            <div class="flex space-x-4 font-medium">
                <a href="#" class="hover:text-brand-gold transition">Parent Portal</a>
                <span class="text-white/30">|</span>
                <a href="#" class="hover:text-brand-gold transition">Staff Login</a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-soft sticky top-1.5 z-50 backdrop-blur-md bg-white/95">
        <div class="max-w-[1400px] mx-auto px-4 py-4"> <!-- Increased max-width to fit links -->
            <div class="flex justify-between items-center">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group shrink-0">
                    <img src="{{ asset('images/logo.png') }}" class="h-12 md:h-16 w-auto transition transform group-hover:scale-105" alt="PCIS Logo"> 
                    <div class="flex flex-col justify-center">
                        <h1 class="font-header font-bold text-brand-blue text-sm md:text-lg leading-none uppercase tracking-wide">
                            M7 Philippine Cambridge<br>
                            <span class="hidden md:inline">International School</span>
                        </h1>
                    </div>
                </a>

                <!-- Desktop Menu (FLAT STRUCTURE) -->
                <div class="hidden xl:flex items-center gap-6 font-sub font-semibold text-[13px] text-gray-600 uppercase tracking-wide">
                    <a href="{{ route('home') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">About</a>
                    <a href="{{ route('team') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Team</a>
                    <a href="{{ route('programmes') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Academics</a>
                    <a href="{{ route('admissions') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Admissions</a>
                    <a href="{{ route('families') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Intl. Families</a>
                    <a href="{{ route('life') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Life @ PCIS</a>
                    <a href="{{ route('contact') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-4 decoration-brand-gold transition">Contact</a>
                    
                    <!-- Primary CTA -->
                    <a href="{{ route('apply.form') }}" class="bg-brand-blue text-white px-6 py-2.5 rounded shadow-md hover:bg-[#003f75] transition transform hover:-translate-y-0.5 font-bold tracking-wide ml-2 whitespace-nowrap">
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

        <!-- Mobile Menu (FLAT LIST) -->
        <div id="mobile-menu" class="hidden xl:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-2xl max-h-screen overflow-y-auto">
            <div class="flex flex-col px-6 py-6 space-y-4 font-sub font-bold text-gray-700 uppercase tracking-wide text-sm">
                <a href="{{ route('home') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">Home</a>
                <a href="{{ route('about') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">About Us</a>
                <a href="{{ route('team') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">Academic Team</a>
                <a href="{{ route('programmes') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">Academics</a>
                <a href="{{ route('admissions') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">Admissions</a>
                <a href="{{ route('families') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">International Families</a>
                <a href="{{ route('life') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">Life at PCIS</a>
                <a href="{{ route('contact') }}" class="block hover:text-brand-blue border-b border-gray-50 pb-2">Contact Us</a>
                
                <a href="{{ route('apply.form') }}" class="block text-center bg-brand-blue text-white py-4 rounded shadow-md mt-4">Enroll Now</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-blue text-white pt-16 pb-8 border-t-[6px] border-brand-gold">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <!-- Brand -->
            <div>
                <img src="{{ asset('images/logo.png') }}" class="h-14 w-auto brightness-0 invert opacity-90 mb-4" alt="White Logo">
                <p class="text-sm text-blue-100/80 leading-relaxed font-light">
                    Unity, Integrity, Growth. Shaping global leaders through world-class Cambridge education.
                </p>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="font-header font-bold text-brand-gold text-lg mb-4 tracking-wide">Contact Us</h4>
                <div class="text-sm text-blue-100/80 space-y-2 font-light">
                    <p>Km. 25 Gen. Aguinaldo Highway,<br>Anabu II-D, Imus, Cavite</p>
                    <p>+6346 458 6588</p>
                    <p>admissions@pcis.edu.ph</p>
                </div>
            </div>
            <!-- Directory -->
            <div>
                <h4 class="font-header font-bold text-brand-gold text-lg mb-4 tracking-wide">Directory</h4>
                <ul class="text-sm space-y-2 text-blue-100/80 font-light">
                    <li><a href="mailto:registrar@pcis.edu.ph" class="hover:text-white">Registrar's Office</a></li>
                    <li><a href="mailto:admin@pcis.edu.ph" class="hover:text-white">IT Support</a></li>
                    <li><a href="mailto:headmaster@pcis.edu.ph" class="hover:text-white">Deputy Headmaster</a></li>
                </ul>
            </div>
            <!-- Links -->
            <div>
                <h4 class="font-header font-bold text-brand-gold text-lg mb-4 tracking-wide">Quick Links</h4>
                <ul class="text-sm space-y-2 text-blue-100/80 font-light">
                    <li><a href="{{ route('apply.form') }}" class="hover:text-white">Online Application</a></li>
                    <li><a href="#" class="hover:text-white">Tuition Fees</a></li>
                </ul>
            </div>
        </div>

        <!-- SOCIAL MEDIA STRIP (Matches your Screenshot) -->
        <div class="flex justify-center gap-4 mb-8">
            <!-- Instagram -->
            <a href="#" class="bg-white w-12 h-12 rounded-xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300 group">
                <svg class="w-6 h-6 text-gray-600 group-hover:text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </a>
            <!-- Facebook -->
            <a href="#" class="bg-white w-12 h-12 rounded-xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300 group">
                <svg class="w-6 h-6 text-gray-600 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
            <!-- YouTube -->
            <a href="#" class="bg-white w-12 h-12 rounded-xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300 group">
                <svg class="w-6 h-6 text-gray-600 group-hover:text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </a>
            <!-- Medium/Blog -->
            <a href="#" class="bg-white w-12 h-12 rounded-xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300 group">
                <svg class="w-6 h-6 text-gray-600 group-hover:text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.54 12a6.8 6.8 0 01-6.77 6.82A6.8 6.8 0 010 12a6.8 6.8 0 016.77-6.82A6.8 6.8 0 0113.54 12zM20.96 12c0 3.54-1.51 6.42-3.38 6.42-1.87 0-3.39-2.88-3.39-6.42s1.52-6.42 3.39-6.42 3.38 2.88 3.38 6.42M24 12c0 3.17-.53 5.75-1.19 5.75-.66 0-1.19-2.58-1.19-5.75s.53-5.75 1.19-5.75C23.47 6.25 24 8.83 24 12z"/>
                </svg>
            </a>
        </div>

        <div class="border-t border-white/10 pt-8 text-center text-xs text-white/40 font-light">
            &copy; {{ date('Y') }} M7 Philippine Cambridge International School. All Rights Reserved.
        </div>
    </footer>
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });
    </script>
</body>
</html>