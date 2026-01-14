<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Command Center - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class', // Enable manual dark mode toggle
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], royal: ['Cinzel', 'serif'] },
                    colors: {
                        brand: { blue: '#00539C', gold: '#F4A300', red: '#D72638', green: '#009245', dark: '#0B1120' },
                        dark: {
                            bg: '#0B1120',      // Deepest Navy (Background)
                            card: '#151e32',    // Lighter Navy (Cards)
                            border: '#2a3655'   // Border color
                        }
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

    <!-- 1. SIDEBAR (Always Dark/Premium) -->
    <aside class="w-72 bg-[#0B1120] border-r border-white/5 text-white flex flex-col shadow-2xl relative z-30">
        <!-- Brand Area -->
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
            
            <!-- Dashboard Link -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-5 py-3.5 bg-gradient-to-r from-brand-blue to-[#1e40af] text-white rounded-xl shadow-lg shadow-blue-900/20 border border-blue-400/20 transition-all group">
                <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-semibold text-sm tracking-wide">Overview</span>
            </a>

            <!-- Applicants Link (FIXED) -->
            <a href="{{ route('admin.applications') }}" class="flex items-center gap-4 px-5 py-3.5 text-gray-400 hover:bg-white/5 hover:text-white rounded-xl transition-all group">
                <svg class="w-5 h-5 group-hover:text-brand-gold transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-medium text-sm tracking-wide">Applicants</span>
                <span class="ml-auto bg-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full text-white">{{ $students->count() }}</span>
            </a>
        </nav>

        <!-- Admin Profile -->
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

    <!-- 2. MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto relative transition-colors duration-300">
        
   

        <div class="p-10 max-w-[1600px] mx-auto w-full">
            
            <!-- Success Alert -->
            @if(session('success'))
                <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 px-6 py-4 rounded-xl shadow-sm mb-8 flex items-center animate-fade-in-down">
                    <div class="w-8 h-8 bg-emerald-100 dark:bg-emerald-800 rounded-full flex items-center justify-center mr-3 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <span class="font-bold block text-sm">Success</span>
                        <span class="text-xs">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- STATS CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-dark-card p-6 rounded-2xl shadow-card border border-gray-100 dark:border-dark-border relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-brand-blue/5 dark:bg-brand-blue/10 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Total Applicants</p>
                        <div class="flex items-end gap-3">
                            <h3 class="text-4xl font-bold text-slate-800 dark:text-white">{{ $students->count() }}</h3>
                            <span class="text-[10px] font-bold text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded-full mb-1">↑ 12%</span>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white dark:bg-dark-card p-6 rounded-2xl shadow-card border border-gray-100 dark:border-dark-border relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-brand-gold/10 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Pending Review</p>
                        <div class="flex items-end gap-3">
                            <h3 class="text-4xl font-bold text-slate-800 dark:text-white">{{ $students->where('status', 'pending')->count() }}</h3>
                            <span class="text-[10px] font-bold text-brand-gold bg-yellow-50 dark:bg-yellow-900/30 px-2 py-1 rounded-full mb-1">Action Needed</span>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white dark:bg-dark-card p-6 rounded-2xl shadow-card border border-gray-100 dark:border-dark-border relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-brand-green/5 dark:bg-brand-green/10 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Leads Generated</p>
                        <div class="flex items-end gap-3">
                            <h3 class="text-4xl font-bold text-slate-800 dark:text-white">{{ $leads->count() }}</h3>
                            <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-full mb-1">Fee Downloads</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ENROLLMENT TABLE -->
            <div class="bg-white dark:bg-dark-card rounded-2xl shadow-card border border-gray-100 dark:border-dark-border overflow-hidden mb-12 transition-colors duration-300">
                <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5 flex justify-between items-center bg-gray-50/30 dark:bg-white/5">
                    <div>
                        <h3 class="font-bold text-lg text-slate-800 dark:text-white">Recent Applications</h3>
                    </div>
                    <div class="flex gap-2">
                        <button class="text-xs font-bold text-gray-500 dark:text-gray-400 bg-white dark:bg-white/5 border border-gray-200 dark:border-white/10 px-4 py-2 rounded-lg hover:border-gray-300 transition shadow-sm">Filter</button>
                        <button class="text-xs font-bold text-white bg-brand-blue px-4 py-2 rounded-lg hover:bg-blue-800 transition shadow-lg shadow-blue-200/50">Export CSV</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50/50 dark:bg-white/5 text-gray-400 text-[10px] uppercase tracking-widest font-bold border-b border-gray-100 dark:border-white/5">
                            <tr>
                                <th class="px-8 py-4 font-semibold">Status</th>
                                <th class="px-8 py-4 font-semibold">Applicant</th>
                                <th class="px-8 py-4 font-semibold">Program</th>
                                <th class="px-8 py-4 font-semibold">Date Applied</th>
                                <th class="px-8 py-4 font-semibold text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-white/5 text-sm">
                            @forelse($students as $student)
                            <tr class="hover:bg-blue-50/30 dark:hover:bg-white/5 transition duration-200 group cursor-default">
                                <td class="px-8 py-5">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wide border
                                        {{ $student->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800' : '' }}
                                        {{ $student->status == 'accepted' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800' : '' }}
                                        {{ $student->status == 'rejected' ? 'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-900/30 dark:text-rose-400 dark:border-rose-800' : '' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $student->status == 'pending' ? 'bg-amber-500' : ($student->status == 'accepted' ? 'bg-emerald-500' : 'bg-rose-500') }}"></span>
                                        {{ $student->status ?? 'Pending' }}
                                    </span>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-brand-blue/10 dark:bg-brand-blue/20 text-brand-blue dark:text-blue-300 flex items-center justify-center font-bold text-xs">
                                            {{ substr($student->first_name, 0, 1) }}{{ substr($student->last_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 dark:text-white">{{ $student->last_name }}, {{ $student->first_name }}</div>
                                            <div class="text-xs text-gray-400">{{ $student->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="text-slate-600 dark:text-slate-300 font-medium bg-gray-100 dark:bg-white/10 px-2 py-1 rounded text-xs">{{ $student->grade_level }}</span>
                                </td>
                                <td class="px-8 py-5 text-gray-500 font-medium">{{ $student->created_at->format('M d, Y') }}</td>
                                <td class="px-8 py-5 text-right">
                                    <div x-data="{ open: false }">
                                        <button @click="open = true" class="text-brand-blue dark:text-blue-400 hover:text-blue-700 dark:hover:text-white font-bold text-xs border border-blue-100 dark:border-blue-900 hover:border-blue-300 bg-white dark:bg-white/5 px-3 py-1.5 rounded-lg transition shadow-sm">
                                            Manage
                                        </button>

                                        <!-- MODAL (Dark Mode Ready) -->
                                        <div x-show="open" x-cloak class="fixed inset-0 z-[100] overflow-y-auto">
                                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                                                <div x-show="open" x-transition.opacity class="fixed inset-0 bg-[#0B1120]/80 backdrop-blur-sm transition-opacity" @click="open = false"></div>
                                                <div x-show="open" x-transition.scale class="inline-block bg-white dark:bg-dark-card rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-4xl sm:w-full border border-gray-100 dark:border-dark-border">
                                                    
                                                    <!-- Modal Header -->
                                                    <div class="bg-[#0B1120] px-8 py-6 flex justify-between items-start relative overflow-hidden">
                                                        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-blue/20 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none"></div>
                                                        <div class="relative z-10">
                                                            <h3 class="text-xl font-royal font-bold text-white tracking-wide">Application Profile</h3>
                                                            <div class="flex items-center gap-3 mt-2">
                                                                <span class="text-xs text-blue-300 font-mono">ID: #{{ $student->id }}</span>
                                                                <span class="text-xs bg-white/10 text-white px-2 py-0.5 rounded">{{ $student->created_at->format('F d, Y') }}</span>
                                                            </div>
                                                        </div>
                                                        <button @click="open = false" class="text-white/40 hover:text-white transition bg-white/5 hover:bg-white/10 p-2 rounded-full">✕</button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="p-8 max-h-[70vh] overflow-y-auto bg-gray-50 dark:bg-[#0f1623]">
                                                        <div class="grid grid-cols-3 gap-8">
                                                            <!-- Left Col -->
                                                            <div class="col-span-2 space-y-6">
                                                                <div class="bg-white dark:bg-white/5 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-white/10">
                                                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Student Information</h4>
                                                                    <div class="grid grid-cols-2 gap-y-4 gap-x-8 text-sm">
                                                                        <div><p class="text-xs text-gray-400">Full Name</p><p class="font-bold text-slate-800 dark:text-white">{{ $student->first_name }} {{ $student->last_name }}</p></div>
                                                                        <div><p class="text-xs text-gray-400">LRN</p><p class="font-medium text-slate-700 dark:text-gray-300 font-mono">{{ $student->lrn ?? 'N/A' }}</p></div>
                                                                        <div><p class="text-xs text-gray-400">Date of Birth</p><p class="font-medium text-slate-700 dark:text-gray-300">{{ $student->birth_date }}</p></div>
                                                                        <div><p class="text-xs text-gray-400">Religion</p><p class="font-medium text-slate-700 dark:text-gray-300">{{ $student->religion }}</p></div>
                                                                        <div class="col-span-2"><p class="text-xs text-gray-400">Previous School</p><p class="font-medium text-slate-700 dark:text-gray-300">{{ $student->previous_school }}</p></div>
                                                                    </div>
                                                                </div>
                                                                <!-- Parents -->
                                                                <div class="bg-white dark:bg-white/5 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-white/10">
                                                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Family Background</h4>
                                                                    <div class="grid grid-cols-2 gap-6">
                                                                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-100 dark:border-blue-900/30">
                                                                            <span class="text-[10px] font-bold text-brand-blue dark:text-blue-400 uppercase block mb-1">Father</span>
                                                                            <p class="font-bold text-slate-800 dark:text-white text-sm">{{ $student->father_details['name'] ?? 'N/A' }}</p>
                                                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $student->father_details['phone'] ?? '' }}</p>
                                                                        </div>
                                                                        <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border border-red-100 dark:border-red-900/30">
                                                                            <span class="text-[10px] font-bold text-brand-red dark:text-red-400 uppercase block mb-1">Mother</span>
                                                                            <p class="font-bold text-slate-800 dark:text-white text-sm">{{ $student->mother_details['name'] ?? 'N/A' }}</p>
                                                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $student->mother_details['phone'] ?? '' }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Right Col -->
                                                            <div class="space-y-6">
                                                                <div class="bg-white dark:bg-white/5 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-white/10">
                                                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Current Status</h4>
                                                                    <span class="inline-block w-full text-center py-2 rounded-lg text-xs font-bold uppercase tracking-wide
                                                                        {{ $student->status == 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-400' : '' }}
                                                                        {{ $student->status == 'accepted' ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400' : '' }}
                                                                        {{ $student->status == 'rejected' ? 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400' : '' }}">
                                                                        {{ $student->status ?? 'Pending' }}
                                                                    </span>
                                                                </div>
                                                                <div class="bg-white dark:bg-white/5 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-white/10">
                                                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Health Notes</h4>
                                                                    <div class="bg-amber-50 dark:bg-amber-900/20 p-4 rounded-lg border border-amber-100 dark:border-amber-900/30 text-amber-900 dark:text-amber-400 text-sm italic">
                                                                        "{{ $student->health_conditions ?? 'No conditions listed.' }}"
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="bg-white dark:bg-dark-card px-8 py-5 flex justify-end gap-3 border-t border-gray-100 dark:border-white/10">
                                                        <form action="{{ route('admin.delete', $student->id) }}" method="POST" onsubmit="return confirm('Delete permanently?');">
                                                            @csrf @method('DELETE')
                                                            <button class="text-xs font-bold text-gray-400 hover:text-red-500 transition mr-4">Delete Record</button>
                                                        </form>
                                                        <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                            @csrf <input type="hidden" name="status" value="rejected">
                                                            <button class="px-5 py-2.5 text-xs font-bold text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/10 rounded-lg transition border border-gray-200 dark:border-white/10">Decline</button>
                                                        </form>
                                                        <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                            @csrf <input type="hidden" name="status" value="accepted">
                                                            <button class="px-6 py-2.5 text-xs font-bold text-white bg-brand-blue hover:bg-blue-800 rounded-lg shadow-lg shadow-blue-200 dark:shadow-none transition">Approve & Enroll</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="p-12 text-center text-gray-400 italic">No applications found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- LEADS TABLE -->
            <div class="bg-white dark:bg-dark-card rounded-2xl shadow-card border border-gray-100 dark:border-dark-border overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5 bg-gray-50/30 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white">Marketing Leads</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 dark:bg-white/5 text-gray-400 text-[10px] uppercase tracking-widest font-bold">
                            <tr>
                                <th class="px-8 py-4">Date</th>
                                <th class="px-8 py-4">Parent Name</th>
                                <th class="px-8 py-4">Contact Info</th>
                                <th class="px-8 py-4">Interest</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-white/5 text-sm">
                            @forelse($leads as $lead)
                            <tr class="hover:bg-yellow-50/30 dark:hover:bg-white/5 transition duration-150">
                                <td class="px-8 py-4 text-gray-500">{{ $lead->created_at->format('M d, Y') }}</td>
                                <td class="px-8 py-4 font-bold text-slate-800 dark:text-white">{{ $lead->name }}</td>
                                <td class="px-8 py-4 text-gray-600 dark:text-gray-400">
                                    <div class="text-xs">{{ $lead->email }}</div>
                                    <div class="text-xs mt-0.5">{{ $lead->phone }}</div>
                                </td>
                                <td class="px-8 py-4">
                                    <span class="bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-400 px-3 py-1 rounded-full text-[10px] font-bold">{{ $lead->level }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="p-12 text-center text-gray-400 italic">No leads captured yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
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