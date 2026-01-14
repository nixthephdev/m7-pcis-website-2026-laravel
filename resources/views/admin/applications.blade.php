<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications Database - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], royal: ['Cinzel', 'serif'] },
                    colors: {
                        brand: { blue: '#00539C', gold: '#F4A300', red: '#D72638', green: '#009245', dark: '#0B1120' },
                        dark: { bg: '#0B1120', card: '#151e32', border: '#2a3655' }
                    },
                    boxShadow: {
                        'card': '0 10px 40px -10px rgba(0,0,0,0.08)',
                        'glow': '0 0 20px rgba(0, 83, 156, 0.15)',
                    }
                }
            }
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-[#F3F4F6] dark:bg-brand-dark flex h-screen overflow-hidden font-sans text-slate-800 dark:text-slate-200 selection:bg-brand-blue selection:text-white transition-colors duration-300">

    <!-- SIDEBAR (Consistent Premium Design) -->
    <aside class="w-72 bg-[#0B1120] border-r border-white/5 text-white flex flex-col shadow-2xl relative z-30">
        <!-- Logo -->
        <div class="h-24 flex items-center px-8 border-b border-white/5 bg-[#080c17]">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="absolute inset-0 bg-brand-blue blur-md opacity-50 rounded-full"></div>
                    <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto relative z-10" alt="Logo">
                </div>
                <div>
                    <h1 class="font-royal font-bold text-lg tracking-wider text-white">M<span class="text-brand-red">7</span> PCIS</h1>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <div class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest font-medium">System Online</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 py-8 px-4 space-y-2">
            <p class="px-4 text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-2">Main Menu</p>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-5 py-3.5 text-gray-400 hover:bg-white/5 hover:text-white rounded-xl transition-all group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium text-sm tracking-wide">Overview</span>
            </a>

            <!-- Active State -->
            <a href="#" class="flex items-center gap-4 px-5 py-3.5 bg-gradient-to-r from-brand-blue to-[#1e40af] text-white rounded-xl shadow-lg shadow-blue-900/20 border border-blue-400/20 transition-all group">
                <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-semibold text-sm tracking-wide">Applicants</span>
            </a>
        </nav>

        <!-- Admin Profile (ADDED THIS) -->
        <div class="p-6 border-t border-white/5 bg-[#080c17]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-gold to-yellow-600 text-white flex items-center justify-center font-bold font-royal shadow-lg border-2 border-[#0B1120]">R</div>
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

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto relative pt-8">
        
        <!-- TOOLBAR (Search & Filters) -->
        <div class="p-8 pb-0">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-royal font-bold text-slate-800 dark:text-white">Student Database</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Manage and review enrollment records.</p>
                </div>
                
                <!-- Search Bar -->
                <form action="{{ route('admin.applications') }}" method="GET" class="relative w-full md:w-96">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, LRN, or email..." 
                           class="w-full pl-12 pr-4 py-3 bg-white dark:bg-dark-card border border-gray-200 dark:border-dark-border rounded-full text-sm focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none shadow-sm transition text-gray-700 dark:text-white">
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </form>
            </div>

            <!-- Filter Tabs -->
            <div class="flex gap-2 border-b border-gray-200 dark:border-dark-border overflow-x-auto">
                <a href="{{ route('admin.applications', ['status' => 'all']) }}" 
                   class="px-6 py-3 text-sm font-bold border-b-2 transition {{ !request('status') || request('status') == 'all' ? 'border-brand-blue text-brand-blue' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400' }}">
                   All Students
                </a>
                <a href="{{ route('admin.applications', ['status' => 'pending']) }}" 
                   class="px-6 py-3 text-sm font-bold border-b-2 transition {{ request('status') == 'pending' ? 'border-brand-gold text-brand-gold' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400' }}">
                   Pending
                </a>
                <a href="{{ route('admin.applications', ['status' => 'accepted']) }}" 
                   class="px-6 py-3 text-sm font-bold border-b-2 transition {{ request('status') == 'accepted' ? 'border-brand-green text-brand-green' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400' }}">
                   Enrolled
                </a>
                <a href="{{ route('admin.applications', ['status' => 'rejected']) }}" 
                   class="px-6 py-3 text-sm font-bold border-b-2 transition {{ request('status') == 'rejected' ? 'border-brand-red text-brand-red' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400' }}">
                   Declined
                </a>
            </div>
        </div>

        <!-- DATA TABLE -->
        <div class="p-8">
            <div class="bg-white dark:bg-dark-card rounded-2xl shadow-card border border-gray-200 dark:border-dark-border overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 dark:bg-white/5 text-gray-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Student</th>
                            <th class="px-6 py-4">Grade</th>
                            <th class="px-6 py-4">Parent / Contact</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-white/5 text-sm">
                        @forelse($students as $student)
                        <tr class="hover:bg-blue-50/30 dark:hover:bg-white/5 transition duration-150">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-800 dark:text-white">{{ $student->last_name }}, {{ $student->first_name }}</div>
                                <div class="text-xs text-gray-400 font-mono mt-0.5">LRN: {{ $student->lrn ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-gray-100 dark:bg-white/10 text-gray-600 dark:text-gray-300 px-2 py-1 rounded text-xs font-bold">{{ $student->grade_level }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-700 dark:text-gray-300 font-medium">{{ $student->father_details['name'] ?? ($student->mother_details['name'] ?? 'N/A') }}</div>
                                <div class="text-xs text-gray-400">{{ $student->phone }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide border
                                    {{ $student->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800' : '' }}
                                    {{ $student->status == 'accepted' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800' : '' }}
                                    {{ $student->status == 'rejected' ? 'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-900/30 dark:text-rose-400 dark:border-rose-800' : '' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $student->status == 'pending' ? 'bg-amber-500' : ($student->status == 'accepted' ? 'bg-emerald-500' : 'bg-rose-500') }}"></span>
                                    {{ $student->status ?? 'Pending' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-brand-blue dark:text-blue-400 hover:underline font-bold text-xs">Edit</button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="p-12 text-center text-gray-400 italic">No records found matching your criteria.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-100 dark:border-white/5">
                    {{ $students->links() }} 
                </div>
            </div>
        </div>
    </main>

    <!-- DARK MODE TOGGLE (Floating Bottom Right) -->
    <button @click="darkMode = !darkMode" 
            class="fixed bottom-8 right-8 z-50 p-4 rounded-full bg-white/80 dark:bg-brand-blue/80 backdrop-blur-md shadow-2xl border border-white/20 text-gray-600 dark:text-white hover:scale-110 transition-all duration-300 group">
        <!-- Sun Icon (Shows in Dark Mode) -->
        <svg x-show="darkMode" class="w-6 h-6 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <!-- Moon Icon (Shows in Light Mode) -->
        <svg x-show="!darkMode" class="w-6 h-6 group-hover:rotate-12 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
    </button>

</body>
</html>