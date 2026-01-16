<!DOCTYPE html>
<html lang="en">
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
                            gold: '#F4A300',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Premium Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col font-sans text-slate-600 relative">

    <!-- SUCCESS TOAST -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="fixed top-24 right-6 z-[100] bg-white border-l-4 border-emerald-500 shadow-2xl rounded-lg p-4 flex items-center gap-4 max-w-sm">
            <div class="bg-emerald-100 text-emerald-600 p-2 rounded-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-800 text-sm">Success</h4>
                <p class="text-xs text-slate-500">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- BACKGROUND MESH -->
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-50/50 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>
    </div>

    <!-- 1. PREMIUM HEADER -->
    <nav class="bg-gradient-to-r from-[#002855] via-[#00539C] to-[#002855] h-20 shadow-xl relative z-50 border-b border-white/10">
        
        <!-- Texture Overlay -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 mix-blend-overlay pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 h-full flex justify-between items-center relative z-10">
            
            <!-- Brand -->
            <a href="{{ route('applicant.dashboard') }}" class="flex items-center gap-4 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-white/20 rounded-full blur-md group-hover:blur-lg transition duration-500"></div>
                    <img src="{{ asset('images/logo.png') }}" class="relative h-10 w-auto drop-shadow-md transform group-hover:scale-105 transition" alt="Logo">
                </div>
                <div class="leading-tight text-white">
                    <h1 class="font-royal font-bold text-xl tracking-wide drop-shadow-md">
                        M<span class="text-[#D72638]">7</span> PCIS
                    </h1>
                    <p class="text-[10px] text-blue-100 uppercase tracking-[0.2em] font-semibold opacity-80">Applicant Portal</p>
                </div>
            </a>

            <!-- User Menu -->
            @auth
            <div class="flex items-center gap-6">
                <!-- Logout Button Only -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 bg-white/10 hover:bg-white/20 border border-white/10 px-5 py-2 rounded-full text-xs font-bold text-white transition shadow-sm backdrop-blur-sm group">
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

    <!-- 3. SIMPLE FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-8 text-center relative z-10">
        <div class="flex justify-center items-center gap-2 mb-2 opacity-50 grayscale hover:grayscale-0 transition duration-500">
            <img src="{{ asset('images/logo.png') }}" class="h-6 w-auto">
            <span class="font-royal font-bold text-slate-400 text-xs tracking-widest">M7 PCIS</span>
        </div>
        <p class="text-[10px] text-slate-400 uppercase tracking-wide">
            &copy; {{ date('Y') }} Philippine Cambridge International School. All Rights Reserved.
        </p>
    </footer>

    @livewireScripts
</body>
</html>