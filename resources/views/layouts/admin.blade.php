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
                            green: '#009245',
                            navy: '#101426' // The new Navy Color
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

    <!-- 1. TOP NAVIGATION (MATCHING NAVY BLUE) -->
    <nav x-data="{ open: false }" 
         class="bg-[#101426] text-white shadow-lg sticky top-0 z-50 border-b border-white/5 relative">
        
        <!-- Texture Overlay -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-5 mix-blend-overlay pointer-events-none"></div>

        <!-- CENTERED CONTAINER -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 relative z-10 items-center">
                
                <!-- LEFT SIDE: Logo & Navigation Links -->
                <div class="flex items-center gap-8">
                    <!-- Logo -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition duration-500"></div>
                            <img src="{{ asset('images/logo.png') }}" class="relative h-9 w-auto drop-shadow-md transform group-hover:scale-105 transition" alt="Logo">
                        </div>
                        <div class="leading-tight">
                            <h1 class="font-royal font-bold text-lg text-white tracking-wide drop-shadow-md">
                                M<span class="text-[#D72638]">7</span> PCIS
                            </h1>
                            <p class="text-[9px] text-blue-200 uppercase tracking-[0.2em] font-semibold opacity-80">Registrar</p>
                        </div>
                    </a>

                    <!-- Desktop Links -->
                    <div class="hidden lg:flex items-center gap-1 ml-4">
                        
                        <!-- Dashboard -->
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white shadow-inner' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                           Dashboard
                        </a>

                        <!-- Applicants (Registrar & Admin) -->
                        @if(in_array(auth()->user()->role, ['admin', 'registrar']))
                        <a href="{{ route('admin.applications') }}" 
                           class="relative px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.applications') ? 'bg-white/10 text-white shadow-inner' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                           Applicants
                           @php
                               $pendingCount = \App\Models\Enrollment::where('status', 'pending')->count();
                           @endphp
                           @if($pendingCount > 0)
                               <span class="absolute -top-1 -right-2 flex h-4 w-4">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-4 w-4 bg-[#D72638] text-[9px] text-white font-bold items-center justify-center border border-white/20">
                                    {{ $pendingCount }}
                                  </span>
                                </span>
                           @endif
                        </a>
                        @endif

                        <!-- Payments (Cashier, Registrar, Admin) -->
                        @if(in_array(auth()->user()->role, ['admin', 'registrar', 'cashier']))
                        <a href="{{ route('admin.payments') }}" 
                           class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.payments') ? 'bg-white/10 text-white shadow-inner' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                           Payments
                        </a>
                        @endif

                        <!-- Leads (Marketing, Registrar, Admin) -->
                        @if(in_array(auth()->user()->role, ['admin', 'registrar', 'marketing']))
                        <a href="{{ route('admin.leads') }}" 
                           class="relative px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.leads') ? 'bg-white/10 text-white shadow-inner' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                           Leads
                           @php
                               $user = auth()->user();
                               $lastViewed = $user->last_leads_viewed_at ?? '1970-01-01 00:00:00';
                               $newLeadsCount = \App\Models\Lead::where('created_at', '>', $lastViewed)->count();
                           @endphp
                           @if($newLeadsCount > 0)
                               <span class="absolute -top-1 -right-2 flex h-4 w-4">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-4 w-4 bg-[#D72638] text-[9px] text-white font-bold items-center justify-center border border-white/20">
                                    {{ $newLeadsCount }}
                                  </span>
                                </span>
                           @endif
                        </a>
                        @endif

                        <!-- Reports -->
                        <a href="#" class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 text-gray-400 hover:text-white hover:bg-white/5">
                           Reports
                        </a>

                        <!-- Users (Admin Only) -->
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.users') }}" 
                           class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 {{ request()->routeIs('admin.users') ? 'bg-white/10 text-white shadow-inner' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                           Users
                        </a>
                        @endif
                    </div>
                </div>

                <!-- RIGHT SIDE: User Profile -->
                <div class="flex items-center gap-4">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-3 pl-2 pr-5 py-1.5 rounded-full bg-white/5 hover:bg-white/10 border border-white/10 transition-colors duration-300 shadow-sm">
                            
                            <!-- Avatar -->
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-gold to-yellow-600 flex items-center justify-center text-xs font-bold text-white shadow-inner border border-white/20 overflow-hidden">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}?v={{ time() }}" class="w-full h-full object-cover">
                                @else
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                @endif
                            </div>
                            
                            <div class="text-left hidden md:block">
                                <p class="text-sm font-bold text-white leading-none">{{ auth()->user()->name }}</p>
                                <p class="text-[10px] text-blue-200 leading-none mt-0.5 font-medium tracking-wide">
                                    @if(auth()->user()->role == 'admin') IT Administrator
                                    @elseif(auth()->user()->role == 'registrar') School Registrar
                                    @elseif(auth()->user()->role == 'cashier') Cashier
                                    @elseif(auth()->user()->role == 'marketing') Marketing
                                    @else Staff @endif
                                </p>
                            </div>
                            
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <!-- Dropdown Content -->
                        <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-60 bg-white dark:bg-[#151e32] rounded-xl shadow-2xl border border-gray-100 dark:border-white/5 py-2 z-50 origin-top-right ring-1 ring-black/5 animate-fade-in-down">
                            <div class="px-5 py-3 border-b border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Signed in as</p>
                                <p class="text-xs text-slate-500 truncate mt-0.5">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="py-2">
                                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-5 py-2.5 text-xs font-medium text-slate-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-white/5 hover:text-brand-blue dark:hover:text-white transition">
                                    <div class="w-5 h-5 rounded bg-blue-100 dark:bg-blue-900/30 text-brand-blue dark:text-blue-400 flex items-center justify-center"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                                    Profile Settings
                                </a>
                            </div>
                            <div class="border-t border-gray-100 dark:border-white/5 py-2 px-2">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button class="flex w-full items-center gap-3 px-5 py-2.5 text-xs font-medium text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition group">
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
        <div class="mb-8 flex items-end justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white tracking-tight">@yield('header')</h2>
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