<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal') - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], royal: ['Cinzel', 'serif'] },
                    colors: {
                        brand: { blue: '#00539C', gold: '#F4A300', red: '#D72638', green: '#009245', dark: '#0B1120' }
                    },
                    animation: { 'pulse-slow': 'pulse 8s cubic-bezier(0.4, 0, 0.6, 1) infinite' }
                }
            }
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-[#F3F4F6] dark:bg-[#050914] flex h-screen overflow-hidden font-sans text-slate-800 dark:text-slate-200 selection:bg-brand-blue selection:text-white transition-colors duration-500 relative">

    <!-- 1. GLOBAL BACKGROUND (Aurora) -->
    <div class="fixed inset-0 z-0 pointer-events-none transition-opacity duration-500">
        <!-- Dark Mode Aurora -->
        <div class="absolute inset-0 opacity-0 dark:opacity-100 transition-opacity duration-500">
            <div class="absolute -top-[20%] -left-[10%] w-[70%] h-[70%] bg-brand-blue/20 rounded-full blur-[150px] animate-pulse-slow"></div>
            <div class="absolute -bottom-[20%] -right-[10%] w-[60%] h-[60%] bg-brand-red/10 rounded-full blur-[150px] animate-pulse-slow" style="animation-delay: 2s;"></div>
            <div class="absolute top-[20%] left-[40%] w-[40%] h-[40%] bg-brand-gold/5 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"></div>
        </div>
        <!-- Light Mode Mesh -->
        <div class="absolute inset-0 opacity-100 dark:opacity-0 transition-opacity duration-500 bg-gradient-to-br from-gray-50 to-blue-50">
            <div class="absolute top-0 right-0 w-[50%] h-[50%] bg-blue-200/20 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 left-0 w-[50%] h-[50%] bg-gold-200/10 rounded-full blur-[100px]"></div>
        </div>
    </div>

    <!-- 2. SIDEBAR -->
    <aside class="w-72 bg-[#0B1120] dark:bg-[#0B1120]/60 dark:backdrop-blur-xl border-r border-white/5 text-white flex flex-col shadow-2xl relative z-30 transition-all duration-300">
        <!-- Logo -->
        <div class="h-24 flex items-center px-8 border-b border-white/5 bg-[#080c17] dark:bg-white/5">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-500 blur-md opacity-40 rounded-full"></div>
                    <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto relative z-10 drop-shadow-md" alt="Logo">
                </div>
                <div>
                    <h1 class="font-royal font-bold text-lg tracking-wider text-white">
                        <span class="text-blue-400">M</span><span class="text-brand-red">7</span> <span class="text-blue-400">PCIS</span>
                    </h1>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-medium mt-0.5">System Online</p>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <nav class="flex-1 py-8 px-4 space-y-2">
            <p class="px-4 text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-2">Main Menu</p>
            
            <!-- Dashboard Link -->
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-4 px-5 py-3.5 rounded-xl transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-brand-blue to-[#1e40af] text-white shadow-lg shadow-blue-900/20 border border-blue-400/20' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-blue-200' : 'group-hover:text-brand-gold' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium text-sm tracking-wide">Overview</span>
            </a>

            <!-- Applicants Link -->
            <a href="{{ route('admin.applications') }}" 
               class="flex items-center gap-4 px-5 py-3.5 rounded-xl transition-all group {{ request()->routeIs('admin.applications') ? 'bg-gradient-to-r from-brand-blue to-[#1e40af] text-white shadow-lg shadow-blue-900/20 border border-blue-400/20' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.applications') ? 'text-blue-200' : 'group-hover:text-brand-gold' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-medium text-sm tracking-wide">Applicants</span>
            </a>
        </nav>

        <!-- Profile Footer -->
        <div class="p-6 border-t border-white/5 bg-black/20 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-gold to-yellow-600 text-white flex items-center justify-center font-bold font-royal shadow-lg border border-white/20">R</div>
                    <div>
                        <p class="text-sm font-bold text-white">Registrar</p>
                        <p class="text-[10px] text-gray-400">admin@pcis.edu.ph</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="text-gray-500 hover:text-red-400 transition p-2 hover:bg-white/5 rounded-lg" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- 3. MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto relative z-10 pt-12">
        
        <!-- Centered Layout Container -->
        <div class="p-10 max-w-[1600px] mx-auto w-full">
            
            <!-- Page Title Header (Dynamic) -->
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-royal font-bold text-slate-800 dark:text-white tracking-wide drop-shadow-sm transition-colors">
                        @yield('header')
                    </h2>
                    <p class="text-sm text-slate-500 dark:text-blue-200/80 font-medium mt-1 transition-colors">
                        @yield('subheader', now()->format('l, F j, Y'))
                    </p>
                </div>
                <a href="{{ route('home') }}" target="_blank" class="group flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-white/5 backdrop-blur-md border border-gray-200 dark:border-white/10 rounded-full text-xs font-bold text-slate-600 dark:text-gray-300 hover:bg-brand-blue hover:text-white dark:hover:bg-white/10 dark:hover:text-white transition shadow-sm">
                    <span>View Live Site</span>
                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>

            <!-- INJECT PAGE CONTENT HERE -->
            @yield('content')

        </div>
    </main>

    <!-- 4. DARK MODE TOGGLE -->
    <button @click="darkMode = !darkMode" 
            class="fixed bottom-8 right-8 z-50 p-4 rounded-full bg-white/80 dark:bg-brand-blue/80 backdrop-blur-md shadow-2xl border border-white/20 text-gray-600 dark:text-white hover:scale-110 transition-all duration-300 group">
        <svg x-show="darkMode" class="w-6 h-6 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <svg x-show="!darkMode" class="w-6 h-6 group-hover:rotate-12 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
    </button>

</body>
</html>