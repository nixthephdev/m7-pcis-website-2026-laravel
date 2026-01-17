
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
    
    <!-- FONTS: Figtree & Cinzel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['"Figtree"', 'sans-serif'], 
                        royal: ['"Cinzel"', 'serif'] 
                    },
                    colors: {
                        brand: {
                            blue: '#00539C', 
                            dark: '#002855', 
                            navy: '#101426', 
                            gold: '#F4A300',
                            red: '#D72638',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-[#020617] font-sans text-slate-600 dark:text-slate-300 antialiased min-h-screen flex flex-col transition-colors duration-300">

    <!-- 1. NAVBAR (Royal Blue Gradient) -->
    <nav x-data="{ open: false }" 
         class="bg-gradient-to-r from-[#002855] via-[#00539C] to-[#002855] border-b border-white/10 shadow-lg sticky top-0 z-50">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                
                <!-- LEFT: Logo & Links -->
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                            <img src="{{ asset('images/logo.png') }}" class="block h-10 w-auto drop-shadow-md transition transform group-hover:scale-105" alt="Logo">
                            <div class="hidden lg:block leading-tight">
                                <h1 class="text-white font-royal font-bold text-lg tracking-wide">M7 PCIS</h1>
                                <p class="text-[9px] text-blue-200 uppercase font-bold tracking-wider opacity-80">Registrar Portal</p>
                            </div>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:-my-px sm:ms-12 sm:flex space-x-10">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('admin.dashboard') ? 'border-brand-gold text-white' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                            Dashboard
                        </a>

                        @if(in_array(auth()->user()->role, ['admin', 'registrar']))
                        <a href="{{ route('admin.applications') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out relative {{ request()->routeIs('admin.applications') ? 'border-brand-gold text-white' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                            Applicants
                            @php $pendingCount = \App\Models\Enrollment::where('status', 'pending')->count(); @endphp
                            @if($pendingCount > 0)
                                <span class="absolute top-3 -right-3 flex h-4 w-4">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-[#D72638] text-[9px] text-white font-bold items-center justify-center ring-1 ring-white/20">
                                        {{ $pendingCount }}
                                    </span>
                                </span>
                            @endif
                        </a>
                        @endif

                        @if(in_array(auth()->user()->role, ['admin', 'registrar', 'cashier']))
                        <a href="{{ route('admin.payments') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('admin.payments') ? 'border-brand-gold text-white' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                            Payments
                        </a>
                        @endif

                        @if(in_array(auth()->user()->role, ['admin', 'registrar', 'marketing']))
                        <a href="{{ route('admin.leads') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('admin.leads') ? 'border-brand-gold text-white' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                            Leads
                        </a>
                        @endif

                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.users') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('admin.users') ? 'border-brand-gold text-white' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                            Users
                        </a>
                        @endif
                    </div>
                </div>

                <!-- RIGHT: Profile Dropdown (TRANSPARENT GLASS STYLE) -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        
                        <!-- The Pill Button (Updated to be Transparent/Glassy) -->
                        <button @click="open = !open" 
                                class="flex items-center pl-1.5 pr-4 py-1.5 rounded-full border border-white/10 bg-white/10 hover:bg-white/20 backdrop-blur-md transition-all duration-200 shadow-sm group">
                            
                            <!-- Avatar -->
                            <div class="mr-3">
                                <div class="h-9 w-9 rounded-full bg-gradient-to-br from-blue-300 to-blue-600 p-[2px]">
                                    <div class="h-full w-full rounded-full bg-[#002855] flex items-center justify-center overflow-hidden">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="h-full w-full object-cover">
                                        @else
                                            <span class="text-xs font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Text Info -->
                            <div class="text-left hidden md:block">
                                <p class="text-sm font-bold text-white leading-none">{{ auth()->user()->name }}</p>
                                <p class="text-[10px] font-bold text-blue-200 uppercase tracking-wider mt-0.5">
                                    @if(auth()->user()->role == 'admin') IT Administrator
                                    @elseif(auth()->user()->role == 'registrar') School Registrar
                                    @elseif(auth()->user()->role == 'cashier') Cashier
                                    @else Staff @endif
                                </p>
                            </div>

                            <!-- Chevron -->
                            <div class="ml-4 text-blue-300 group-hover:text-white transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-cloak 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute z-50 mt-2 w-56 rounded-xl shadow-2xl origin-top-right right-0 bg-white dark:bg-[#151e32] border border-gray-100 dark:border-white/10 py-1">
                            <div class="px-4 py-3 border-b border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
                                <p class="text-xs text-gray-500 dark:text-gray-400 font-bold uppercase tracking-wider">Account</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-white truncate mt-1">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('admin.profile') }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-blue dark:hover:text-white transition">Profile Settings</a>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. EXECUTIVE HEADER BAR -->
    <header class="bg-white dark:bg-[#101426] shadow border-b border-gray-200 dark:border-white/5 relative z-40 transition-colors duration-300">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-bold text-xl text-gray-800 dark:text-white leading-tight tracking-wide font-sans">
                @yield('header')
            </h2>
        </div>
    </header>

    <!-- 3. MAIN CONTENT -->
    <main class="flex-grow py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full relative z-10">
        @yield('content')
    </main>

    <!-- 4. DARK MODE TOGGLE -->
    <button @click="darkMode = !darkMode" 
            class="fixed bottom-6 right-6 z-50 p-3 rounded-full bg-white dark:bg-[#1E253E] shadow-xl border border-gray-200 dark:border-white/10 text-gray-500 dark:text-white hover:scale-110 transition-transform duration-200 group">
        <svg x-show="darkMode" class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <svg x-show="!darkMode" class="w-5 h-5 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
    </button>

</body>
</html>