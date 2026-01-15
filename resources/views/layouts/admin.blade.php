<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal') - M7 PCIS</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <!-- PREMIUM FONTS -->
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
                            blue: '#00539C', // Royal Blue
                            dark: '#0B1120', // Deep Navy
                            card: '#151e32', // Card Dark
                            gold: '#F4A300',
                            red: '#D72638',
                            green: '#009245'
                        }
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(0, 83, 156, 0.15)',
                        'card': '0 2px 10px rgba(0, 0, 0, 0.03)',
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(156, 163, 175, 0.5); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(156, 163, 175, 0.8); }
    </style>
</head>
<body class="bg-[#F8FAFC] dark:bg-[#020617] font-sans text-slate-600 dark:text-slate-300 transition-colors duration-300 min-h-screen flex flex-col relative">

    <!-- BACKGROUND MESH -->
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-50/50 to-transparent dark:from-brand-blue/10 dark:to-transparent"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] dark:opacity-[0.05]"></div>
    </div>

    <!-- 1. TOP NAVIGATION -->
    <nav x-data="{ open: false }" 
         class="bg-gradient-to-r from-[#002855] via-[#00539C] to-[#002855] text-white shadow-lg sticky top-0 z-50 border-b border-white/10 relative">
        
        <!-- Texture Overlay -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 mix-blend-overlay pointer-events-none"></div>
        
        <!-- Glow Effect -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-1/2 h-full bg-white/5 blur-3xl pointer-events-none"></div>

        <!-- CENTERED CONTAINER -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-18 py-3 relative z-10 items-center">
                
                <!-- Left: Logo & Links -->
                <div class="flex items-center gap-10">
                    <!-- Logo -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/20 rounded-full blur-md group-hover:blur-lg transition duration-500"></div>
                            <!-- Updated Size: h-10 -->
                            <img src="{{ asset('images/logo.png') }}" class="relative h-10 w-auto drop-shadow-md transform group-hover:scale-105 transition" alt="Logo">
                        </div>
                        <div class="leading-tight">
                            <!-- M (White), 7 (Red), PCIS (White) -->
                            <h1 class="font-royal font-bold text-2xl tracking-wide drop-shadow-md">
                                <span class="text-white">M</span><span class="text-[#D72638]">7</span> <span class="text-white">PCIS</span>
                            </h1>
                            <p class="text-[10px] text-blue-100 uppercase tracking-[0.2em] font-semibold opacity-80">Registrar</p>
                        </div>
                    </a>

                    <!-- Desktop Links (Larger Text) -->
                    <div class="hidden lg:flex items-center gap-2 ml-4">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-4 py-2 text-sm font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                           Dashboard
                        </a>
                        <a href="{{ route('admin.applications') }}" 
                           class="px-4 py-2 text-sm font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.applications') ? 'bg-white/10 text-white shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                           Applicants
                        </a>
                        <a href="#" class="px-4 py-2 text-sm font-bold rounded-lg transition-all duration-200 text-blue-100 hover:text-white hover:bg-white/5">
                           Reports
                        </a>
                    </div>
                </div>

                <!-- Right: User Profile (Bigger & Bolder) -->
                <div class="flex items-center gap-4">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-3 pl-1.5 pr-5 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/10 transition duration-300 group shadow-sm">
                            <!-- Avatar: w-10 h-10 -->
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-gold to-yellow-600 flex items-center justify-center text-sm font-bold text-white shadow-inner border border-white/20 group-hover:scale-105 transition overflow-hidden">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}?v={{ time() }}" class="w-full h-full object-cover">
                                @else
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                @endif
                            </div>
                            <div class="text-left hidden md:block">
                                <!-- Name: text-sm -->
                                <p class="text-sm font-bold text-white leading-none group-hover:text-brand-gold transition">{{ auth()->user()->name }}</p>
                                <!-- Role: text-[10px] -->
                                <p class="text-[10px] text-blue-200 leading-none mt-1 font-medium tracking-wide">Administrator</p>
                            </div>
                            <svg class="w-4 h-4 text-blue-200 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <!-- Dropdown Content -->
                        <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-3 w-60 bg-white dark:bg-[#151e32] rounded-xl shadow-2xl border border-gray-100 dark:border-white/5 py-2 z-50 origin-top-right ring-1 ring-black/5 animate-fade-in-down">
                            <div class="px-5 py-3 border-b border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Signed in as</p>
                                <p class="text-xs text-slate-500 truncate mt-0.5">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="py-2">
                                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-5 py-2.5 text-sm font-medium text-slate-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-white/5 hover:text-brand-blue dark:hover:text-white transition">
                                    <div class="w-6 h-6 rounded bg-blue-100 dark:bg-blue-900/30 text-brand-blue dark:text-blue-400 flex items-center justify-center"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                                    Profile Settings
                                </a>
                            </div>
                            <div class="border-t border-gray-100 dark:border-white/5 py-2 px-2">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button class="flex w-full items-center gap-3 px-5 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition group">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                        Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. MAIN CONTENT (Centered max-w-7xl) -->
    <main class="flex-grow py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full relative z-10">
        <!-- Page Title -->
        <div class="mb-10 flex items-end justify-between">
            <div>
                <h2 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">@yield('header')</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">@yield('subheader', now()->format('l, F j, Y'))</p>
            </div>
        </div>

        @yield('content')
    </main>
    

    <!-- 3. DARK MODE TOGGLE (Floating Glass) -->
    <button @click="darkMode = !darkMode" 
            class="fixed bottom-8 right-8 z-50 p-3.5 rounded-full bg-white/80 dark:bg-[#1e293b]/80 backdrop-blur-md shadow-2xl border border-white/20 text-slate-500 dark:text-white hover:scale-110 transition-all duration-300 group">
        <svg x-show="darkMode" class="w-5 h-5 text-brand-gold animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <svg x-show="!darkMode" class="w-5 h-5 text-brand-blue group-hover:rotate-12 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
    </button>

</body>
</html>