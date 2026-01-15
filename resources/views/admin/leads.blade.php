@extends('layouts.admin')

@section('title', 'Marketing Leads')
@section('header', 'Marketing Leads')

@section('content')

    <!-- 1. MINI STATS (Vibrant Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Total Leads -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-3xl shadow-card border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-purple-500/30 transition duration-300">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Leads</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">{{ $totalLeads }}</h3>
                <p class="text-[10px] text-slate-400 mt-1">Fee Schedule Downloads</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-purple-50 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 flex items-center justify-center shadow-glow group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
        </div>

        <!-- Today's Leads -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-3xl shadow-card border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-pink-500/30 transition duration-300">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">New Today</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">{{ $todayLeads }}</h3>
                <p class="text-[10px] text-slate-400 mt-1">Potential Enrollees</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-pink-50 dark:bg-pink-500/20 text-pink-600 dark:text-pink-400 flex items-center justify-center shadow-glow group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Conversion Rate (Static for now) -->
        <div class="bg-gradient-to-br from-brand-blue to-blue-700 p-6 rounded-3xl shadow-lg shadow-blue-500/20 text-white relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[10px] font-bold text-blue-200 uppercase tracking-widest mb-1">Conversion Goal</p>
                <h3 class="text-3xl font-bold">High</h3>
                <p class="text-[10px] text-blue-100 mt-1">Interest Level</p>
            </div>
            <div class="absolute right-0 bottom-0 w-32 h-32 bg-white/10 rounded-full blur-3xl -mr-10 -mb-10 group-hover:scale-110 transition duration-500"></div>
            <div class="absolute right-6 top-6">
                <svg class="w-8 h-8 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            </div>
        </div>

    </div>

    <!-- 2. TOOLBAR -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Inquired Parents / Students</h3>

        <div class="flex gap-3 w-full md:w-auto">
            <!-- Search Bar -->
            <form action="{{ route('admin.leads') }}" method="GET" class="relative w-full md:w-80 group">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400 group-focus-within:text-purple-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search leads..." 
                       class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-white/10 rounded-xl leading-5 bg-white dark:bg-[#151e32] text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm transition shadow-sm">
            </form>
            
            <!-- Export Button (Visual) -->
            <button class="flex items-center gap-2 bg-white dark:bg-[#151e32] border border-slate-200 dark:border-white/10 text-slate-600 dark:text-white px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-50 dark:hover:bg-white/5 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export
            </button>
        </div>
    </div>

    <!-- 3. DATA GRID -->
    <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 dark:text-slate-500 text-[10px] uppercase tracking-widest font-bold border-b border-slate-100 dark:border-white/5">
                    <tr>
                        <th class="px-8 py-5">Name</th>
                        <th class="px-8 py-5">Contact Details</th>
                        <th class="px-8 py-5">Interest</th>
                        <th class="px-8 py-5">Date Captured</th>
                        <th class="px-8 py-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-purple-50/30 dark:hover:bg-white/5 transition duration-200 group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 flex items-center justify-center text-xs font-bold shadow-sm group-hover:scale-110 transition">
                                    {{ substr($lead->name, 0, 1) }}
                                </div>
                                <div class="font-bold text-slate-800 dark:text-white text-base">{{ $lead->name }}</div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-slate-700 dark:text-slate-300 font-medium">{{ $lead->email }}</div>
                            <div class="text-xs text-slate-400 mt-0.5">{{ $lead->phone }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide border shadow-sm bg-purple-50 text-purple-700 border-purple-200 dark:bg-purple-500/10 dark:text-purple-400 dark:border-purple-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                                {{ $lead->level }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-slate-500 dark:text-slate-400 font-mono text-xs">
                            {{ $lead->created_at->format('M d, Y • h:i A') }}
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button class="text-slate-400 hover:text-purple-600 dark:hover:text-purple-400 transition p-2 hover:bg-slate-100 dark:hover:bg-white/10 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-12 text-center text-slate-400 italic">No leads found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-8 py-4 border-t border-slate-100 dark:border-white/5">
            {{ $leads->links() }} 
        </div>
    </div>

@endsection