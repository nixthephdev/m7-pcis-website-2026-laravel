<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'M7 Philippine Cambridge School')</title>
    
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&family=Montserrat:wght@500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Lato"', 'sans-serif'],
                        header: ['"Playfair Display"', 'serif'],
                        royal: ['"Cinzel"', 'serif'], // Added Cinzel for Logo
                        sub: ['"Montserrat"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            blue: '#00539C',   
                            gold: '#F4A300',   
                            red: '#D72638',    
                            teal: '#009688',   
                            dark: '#0a1a4a', // Deep Navy for Footer
                        },
                        bg: {
                            primary: '#F9F9F9',
                            secondary: '#F4F4F4',
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 83, 156, 0.1)',
                        'glow': '0 0 15px rgba(244, 163, 0, 0.5)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen font-sans antialiased selection:bg-brand-yellow selection:text-brand-blue pt-[180px] xl:pt-[150px]">

    <!-- STICKY HEADER -->
    <header class="fixed top-0 left-0 w-full z-[100] shadow-2xl transition-all duration-300">
        
        <!-- 1. BRAND STRIP -->
        <div class="flex h-2 w-full">
            <div class="w-1/4 bg-gradient-to-r from-[#0e2b86] to-[#1a4bd6]"></div>
            <div class="w-1/4 bg-gradient-to-r from-[#da251d] to-[#ff4d4d]"></div>
            <div class="w-1/4 bg-gradient-to-r from-[#fcd116] to-[#ffe566]"></div>
            <div class="w-1/4 bg-gradient-to-r from-[#009245] to-[#00c957]"></div>
        </div>

        <!-- 2. LEAD GEN BAR -->
        <div class="bg-[#1a0b2e] text-white py-4 border-b border-white/10 relative">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            <div class="max-w-[1400px] mx-auto px-4 relative z-10">
                <form action="{{ route('download.fees') }}" method="POST" class="flex flex-col xl:flex-row items-center justify-between gap-4">
                    @csrf
                    <div class="flex items-center gap-4 shrink-0 mb-2 xl:mb-0">
                        <span class="bg-brand-gold text-[#1a0b2e] text-xs font-bold px-3 py-1 rounded shadow-glow uppercase tracking-wider hidden md:block">Admissions Open 2026</span>
                        <span class="text-sm md:text-base font-header tracking-wide text-gray-100">Do you want your child to be a future leader?</span>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-3 w-full xl:w-auto justify-center xl:justify-end">
                        <input type="text" name="name" required class="w-full md:w-40 h-10 px-4 rounded bg-white/10 border border-white/20 text-white text-sm focus:outline-none focus:bg-white focus:text-gray-900 focus:ring-2 focus:ring-brand-gold placeholder-gray-300 transition" placeholder="Parent Name">
                        <input type="email" name="email" required class="w-full md:w-40 h-10 px-4 rounded bg-white/10 border border-white/20 text-white text-sm focus:outline-none focus:bg-white focus:text-gray-900 focus:ring-2 focus:ring-brand-gold placeholder-gray-300 transition" placeholder="Email Address">
                        <input type="text" name="phone" required class="w-full md:w-32 h-10 px-4 rounded bg-white/10 border border-white/20 text-white text-sm focus:outline-none focus:bg-white focus:text-gray-900 focus:ring-2 focus:ring-brand-gold placeholder-gray-300 transition" placeholder="Phone No.">
                        <div class="relative w-full md:w-48">
                            <select name="level" required class="w-full h-10 px-4 rounded bg-white/10 border border-white/20 text-white text-sm focus:outline-none focus:bg-white focus:text-gray-900 focus:ring-2 focus:ring-brand-gold appearance-none cursor-pointer transition">
                                <option value="" disabled selected class="text-gray-500">Select Grade Level</option>
                                <option value="EYP" class="text-gray-900">IB Early Years</option>
                                <option value="PYP" class="text-gray-900">IB Primary Years</option>
                                <option value="MYP" class="text-gray-900">IB Middle Years</option>
                                <option value="IBDP" class="text-gray-900">IB Diploma</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full md:w-auto h-10 px-6 bg-gradient-to-r from-brand-red to-[#b91c1c] text-white font-bold text-xs uppercase tracking-widest rounded shadow-lg hover:shadow-red-500/50 transition transform hover:-translate-y-0.5 border border-white/10">Get Fees</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- 3. PREMIUM NAVIGATION -->
        <nav class="bg-white/95 backdrop-blur-xl border-b border-gray-100">
            <div class="max-w-[1400px] mx-auto px-4 py-3">
                <div class="flex justify-between items-center">
                    
                    <!-- LOGO (Compact & Clean) -->
                    <a href="{{ url('/') }}" class="flex items-center gap-3 group shrink-0">
                        <img src="{{ asset('images/logo.png') }}" class="h-12 md:h-14 w-auto transition transform group-hover:scale-105 drop-shadow-sm" alt="PCIS Logo"> 
                        <div class="flex flex-col justify-center">
                            <h1 class="font-royal font-bold text-brand-blue text-sm md:text-base leading-none tracking-wide lining-nums">
                                <span class="mr-1"><span class="text-brand-blue">M</span><span class="text-brand-red inline-block relative bottom-[0.5px]">7</span></span>
                                PHILIPPINE CAMBRIDGE<br>INTERNATIONAL SCHOOL</h1>
                                
                        </div>
                    </a>

                    <!-- DESKTOP MENU (Optimized Spacing) -->
                    <div class="hidden xl:flex items-center gap-5 font-sub font-bold text-[13px] text-gray-700 uppercase tracking-widest">
                        <a href="{{ route('home') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Home</a>
                        <a href="{{ route('about') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">About</a>
                        <a href="{{ route('team') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Team</a>
                        <a href="{{ route('programmes') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Academics</a>
                        <a href="{{ route('admissions') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Admissions</a>
                        <a href="{{ route('families') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Intl. Families</a>
                        <a href="{{ route('life') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Life @ PCIS</a>
                        <a href="{{ route('contact') }}" class="hover:text-brand-blue hover:underline decoration-2 underline-offset-8 decoration-brand-gold transition py-2">Contact</a>
                        
                        <a href="{{ route('apply.form') }}" class="bg-brand-blue text-white px-5 py-2.5 rounded shadow-md hover:bg-[#003f75] hover:shadow-lg transition transform hover:-translate-y-0.5 font-bold tracking-wide ml-2 whitespace-nowrap border border-white/20 text-[11px]">
                            Enroll Now
                        </a>
                    </div>

                    <!-- MOBILE MENU BTN -->
                    <div class="xl:hidden flex items-center">
                        <button id="mobile-menu-btn" class="text-brand-blue focus:outline-none p-2">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- MOBILE MENU -->
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
    </header>

    <!-- CONTENT -->
    <main class="flex-grow relative z-0">
        @yield('content')
    </main>

    <!-- PREMIUM FOOTER (Dark Navy) -->
    <footer class="bg-brand-dark text-white pt-20 pb-10 border-t-[8px] border-brand-gold relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        
        <div class="max-w-[1400px] mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 relative z-10">
            <!-- Brand -->
            <div>
                <img src="{{ asset('images/logo.png') }}" class="h-16 w-auto brightness-0 invert opacity-90 mb-6" alt="White Logo">
                <p class="text-sm text-blue-200 leading-relaxed font-light">
                    Unity, Integrity, Growth. Shaping global leaders through world-class Cambridge education.
                </p>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="font-royal font-bold text-brand-gold text-lg mb-6 tracking-widest uppercase">Contact Us</h4>
                <div class="text-sm text-blue-200 space-y-3 font-light">
                    <p class="flex items-start gap-3"><span class="text-brand-red">📍</span> Km. 25 Gen. Aguinaldo Highway,<br>Anabu II-D, Imus, Cavite</p>
                    <p class="flex items-center gap-3"><span class="text-brand-red">📞</span> +6346 458 6588</p>
                    <p class="flex items-center gap-3"><span class="text-brand-red">✉️</span> admissions@pcis.edu.ph</p>
                </div>
            </div>
            <!-- Directory -->
            <div>
                <h4 class="font-royal font-bold text-brand-gold text-lg mb-6 tracking-widest uppercase">Directory</h4>
                <ul class="text-sm space-y-3 text-blue-200 font-light">
                    <li><a href="mailto:registrar@pcis.edu.ph" class="hover:text-white hover:translate-x-1 transition inline-block">Registrar's Office</a></li>
                    <li><a href="mailto:admin@pcis.edu.ph" class="hover:text-white hover:translate-x-1 transition inline-block">IT Support</a></li>
                    <li><a href="mailto:headmaster@pcis.edu.ph" class="hover:text-white hover:translate-x-1 transition inline-block">Deputy Headmaster</a></li>
                </ul>
            </div>
            <!-- Links -->
            <div>
                <h4 class="font-royal font-bold text-brand-gold text-lg mb-6 tracking-widest uppercase">Quick Links</h4>
                <ul class="text-sm space-y-3 text-blue-200 font-light">
                    <li><a href="{{ route('apply.form') }}" class="hover:text-white hover:translate-x-1 transition inline-block">Online Application</a></li>
                    <li><a href="#" class="hover:text-white hover:translate-x-1 transition inline-block">Tuition Fees</a></li>
                    <li><a href="{{ route('admin.login') }}" class="hover:text-brand-gold transition text-white/30">Staff Portal</a></li>
                </ul>
            </div>
        </div>

        <!-- Social Media (Centered) -->
        <!-- Social Media (Centered) -->
        <div class="flex justify-center gap-6 mb-10 relative z-10">
            
            <!-- Facebook -->
            <a href="#" class="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-[#1877F2] transition duration-300 group backdrop-blur-sm border border-white/10">
                <svg class="w-5 h-5 text-white group-hover:text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>

            <!-- Instagram -->
            <a href="#" class="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-[#E4405F] transition duration-300 group backdrop-blur-sm border border-white/10">
                <svg class="w-5 h-5 text-white group-hover:text-[#E4405F]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>

            <!-- YouTube (New) -->
            <a href="#" class="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-red-600 transition duration-300 group backdrop-blur-sm border border-white/10">
                <svg class="w-5 h-5 text-white group-hover:text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
            </a>

            <!-- Email (New) -->
            <a href="mailto:admissions@pcis.edu.ph" class="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-brand-gold transition duration-300 group backdrop-blur-sm border border-white/10">
                <svg class="w-5 h-5 text-white group-hover:text-brand-gold" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </a>

        </div>

        <div class="border-t border-white/10 pt-8 text-center text-xs text-white/30 font-light relative z-10">
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