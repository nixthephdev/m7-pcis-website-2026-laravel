<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('applicant_theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('applicant_theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Portal - M7 PCIS</title>
    
    <!-- LIVEWIRE -->
    @livewireStyles

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        royal: ['"Cinzel"', 'serif'] 
                    },
                    colors: {
                        brand: {
                            blue: '#00539C',
                            dark: '#0B1120',
                            navy: '#101426', // Premium Navy
                            gold: '#F4A300',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .dark ::-webkit-scrollbar-thumb { background: #334155; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#F8FAFC] dark:bg-[#0B1120] min-h-screen flex flex-col font-sans text-slate-600 dark:text-slate-300 transition-colors duration-300 relative">

    <!-- SUCCESS TOAST -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
             class="fixed top-24 right-6 z-[100] bg-white dark:bg-[#1E253E] border-l-4 border-emerald-500 shadow-2xl rounded-lg p-4 flex items-center gap-4 max-w-sm animate-fade-in-down">
            <div class="bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 p-2 rounded-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-800 dark:text-white text-sm">Success</h4>
                <p class="text-xs text-slate-500 dark:text-slate-400">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- BACKGROUND MESH -->
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-50/50 to-transparent dark:from-[#101426] dark:to-transparent"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] dark:opacity-[0.02]"></div>
    </div>

    <!-- 1. PREMIUM NAVY HEADER -->
    <nav class="bg-[#101426] h-20 shadow-xl relative z-50 border-b border-white/5">
        
        <!-- Texture Overlay -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-5 mix-blend-overlay pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 h-full flex justify-between items-center relative z-10">
            
            <!-- Brand -->
            <a href="{{ route('applicant.dashboard') }}" class="flex items-center gap-4 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition duration-500"></div>
                    <img src="{{ asset('images/logo.png') }}" class="relative h-10 w-auto drop-shadow-md transform group-hover:scale-105 transition" alt="Logo">
                </div>
                <div class="leading-tight text-white">
                    <h1 class="font-royal font-bold text-xl tracking-wide drop-shadow-md">
                        M<span class="text-[#D72638]">7</span> PCIS
                    </h1>
                    <p class="text-[10px] text-blue-200 uppercase tracking-[0.2em] font-semibold opacity-70">Applicant Portal</p>
                </div>
            </a>

            <!-- User Menu -->
            @auth
            <div class="flex items-center gap-6">
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 bg-white/5 hover:bg-white/10 border border-white/10 px-5 py-2 rounded-full text-xs font-bold text-white transition shadow-sm backdrop-blur-sm group">
                        <span>LOG OUT</span>
                        <svg class="w-3 h-3 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
            @endauth

        </div>
    </nav>

    <!-- 2. CONTENT AREA -->
    <main class="flex-grow relative z-10">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    <!-- 3. FOOTER -->
    <footer class="bg-white dark:bg-[#101426] border-t border-slate-200 dark:border-white/5 py-8 text-center relative z-10 transition-colors duration-300">
        <div class="flex justify-center items-center gap-2 mb-2 opacity-50 grayscale hover:grayscale-0 transition duration-500">
            <img src="{{ asset('images/logo.png') }}" class="h-6 w-auto">
            <span class="font-royal font-bold text-slate-400 dark:text-slate-500 text-xs tracking-widest">M7 PCIS</span>
        </div>
        <p class="text-[10px] text-slate-400 dark:text-slate-600 uppercase tracking-wide">
            &copy; {{ date('Y') }} Philippine Cambridge International School. All Rights Reserved.
        </p>
    </footer>

    <!-- 4. DARK MODE TOGGLE -->
    <button @click="darkMode = !darkMode" 
            class="fixed bottom-8 right-8 z-50 p-3.5 rounded-full bg-white/80 dark:bg-[#1E253E]/80 backdrop-blur-md shadow-2xl border border-white/20 text-slate-500 dark:text-white hover:scale-110 transition-all duration-300 group">
        <svg x-show="darkMode" class="w-5 h-5 text-brand-gold animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <svg x-show="!darkMode" class="w-5 h-5 text-brand-blue group-hover:rotate-12 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
    </button>

    @livewireScripts
</body>
</html>