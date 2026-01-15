@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Executive Overview')

@section('content')
    
    <!-- 1. STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Total Population -->
        <div class="bg-white dark:bg-[#151e32] p-8 rounded-3xl shadow-card border border-slate-100 dark:border-white/5 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Population</p>
                    <h3 class="text-5xl font-bold text-slate-800 dark:text-white mt-2">{{ $students->count() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-50 dark:bg-blue-500/20 text-brand-blue dark:text-blue-400 flex items-center justify-center shadow-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-16 opacity-10 text-brand-blue">
                <svg viewBox="0 0 100 25" class="w-full h-full fill-current"><path d="M0 25 L0 15 L10 18 L20 12 L30 16 L40 10 L50 14 L60 8 L70 12 L80 6 L90 10 L100 5 L100 25 Z"></path></svg>
            </div>
        </div>

        <!-- Enrolled -->
        <div class="bg-white dark:bg-[#151e32] p-8 rounded-3xl shadow-card border border-slate-100 dark:border-white/5 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Enrolled</p>
                    <h3 class="text-5xl font-bold text-slate-800 dark:text-white mt-2">{{ $students->where('status', 'accepted')->count() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shadow-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-16 opacity-10 text-emerald-500">
                <svg viewBox="0 0 100 25" class="w-full h-full fill-current"><path d="M0 25 L0 20 L15 18 L30 22 L45 15 L60 18 L75 10 L90 14 L100 5 L100 25 Z"></path></svg>
            </div>
        </div>

        <!-- Pending -->
        <div class="bg-white dark:bg-[#151e32] p-8 rounded-3xl shadow-card border border-slate-100 dark:border-white/5 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pending</p>
                    <h3 class="text-5xl font-bold text-slate-800 dark:text-white mt-2">{{ $students->where('status', 'pending')->count() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-amber-50 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 flex items-center justify-center shadow-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-16 opacity-10 text-amber-500">
                <svg viewBox="0 0 100 25" class="w-full h-full fill-current"><path d="M0 25 L0 18 L20 18 L40 12 L60 18 L80 12 L100 15 L100 25 Z"></path></svg>
            </div>
        </div>

        <!-- Leads -->
        <div class="bg-white dark:bg-[#151e32] p-8 rounded-3xl shadow-card border border-slate-100 dark:border-white/5 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Leads</p>
                    <h3 class="text-5xl font-bold text-slate-800 dark:text-white mt-2">{{ $leads->total() }}</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-purple-50 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 flex items-center justify-center shadow-glow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-16 opacity-10 text-purple-500">
                <svg viewBox="0 0 100 25" class="w-full h-full fill-current"><path d="M0 25 L0 22 L20 15 L40 18 L60 10 L80 14 L100 2 L100 25 Z"></path></svg>
            </div>
        </div>

    </div>

    <!-- 2. SPLIT GRID (Tools & Feed) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
        
        <!-- LEFT: Quick Actions -->
        <div class="lg:col-span-1">
            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 gap-4">
                <a href="{{ route('admin.applications') }}" class="group flex items-center gap-5 bg-white dark:bg-[#151e32] p-5 rounded-2xl border border-slate-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-blue-500/30 transition duration-300">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-brand-blue dark:text-blue-400 flex items-center justify-center group-hover:bg-brand-blue group-hover:text-white transition shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-base text-slate-800 dark:text-white">Review Applicants</h4>
                        <p class="text-xs text-slate-500">Process new enrollments</p>
                    </div>
                    <div class="ml-auto w-8 h-8 rounded-full bg-slate-50 dark:bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-blue-50 dark:group-hover:bg-blue-900/30 group-hover:text-brand-blue transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
                <a href="#" class="group flex items-center gap-5 bg-white dark:bg-[#151e32] p-5 rounded-2xl border border-slate-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-emerald-500/30 transition duration-300">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-base text-slate-800 dark:text-white">Generate Reports</h4>
                        <p class="text-xs text-slate-500">Download CSV/PDF data</p>
                    </div>
                    <div class="ml-auto w-8 h-8 rounded-full bg-slate-50 dark:bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-emerald-50 dark:group-hover:bg-emerald-900/30 group-hover:text-emerald-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
                <a href="{{ route('admin.profile') }}" class="group flex items-center gap-5 bg-white dark:bg-[#151e32] p-5 rounded-2xl border border-slate-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-amber-500/30 transition duration-300">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 flex items-center justify-center group-hover:bg-amber-600 group-hover:text-white transition shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-base text-slate-800 dark:text-white">System Settings</h4>
                        <p class="text-xs text-slate-500">Account & Security</p>
                    </div>
                    <div class="ml-auto w-8 h-8 rounded-full bg-slate-50 dark:bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-amber-50 dark:group-hover:bg-amber-900/30 group-hover:text-amber-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- RIGHT: Live Feed -->
        <div class="lg:col-span-2">
            <div class="flex justify-between items-end mb-4">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Live Activity Feed</h3>
                <a href="{{ route('admin.applications') }}" class="text-xs font-bold text-brand-blue hover:underline">View All →</a>
            </div>
            
            <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden h-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-xs uppercase tracking-widest font-bold">
                            <tr>
                                <th class="px-8 py-5">User</th>
                                <th class="px-8 py-5">Action</th>
                                <th class="px-8 py-5 text-right">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                            @forelse($students->take(5) as $student)
                            <tr class="hover:bg-slate-50 dark:hover:bg-white/5 transition">
                                <td class="px-8 py-5 font-bold text-slate-700 dark:text-slate-300 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 flex items-center justify-center text-xs font-bold text-slate-500 dark:text-slate-300">
                                        {{ substr($student->first_name, 0, 1) }}{{ substr($student->last_name, 0, 1) }}
                                    </div>
                                    {{ $student->last_name }}, {{ $student->first_name }}
                                </td>
                                <td class="px-8 py-5">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-bold 
                                        {{ $student->status == 'pending' ? 'bg-amber-50 text-amber-700 border border-amber-100 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20' : 'bg-emerald-50 text-emerald-700 border border-emerald-100 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20' }}">
                                        <span class="w-2 h-2 rounded-full {{ $student->status == 'pending' ? 'bg-amber-500' : 'bg-emerald-500' }}"></span>
                                        Submitted Application
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-right text-slate-400 font-mono text-xs">
                                    {{ $student->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="p-8 text-center text-slate-400">No activity recorded today.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- 4. MARKETING LEADS TABLE -->
    <div class="mb-10">
        <div class="flex justify-between items-end mb-4">
            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Recent Fee Downloads</h3>
        </div>
        
        <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-xs uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-8 py-5">Date</th>
                            <th class="px-8 py-5">Parent Name</th>
                            <th class="px-8 py-5">Contact Info</th>
                            <th class="px-8 py-5">Interest</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                        @forelse($leads as $lead)
                        <tr class="hover:bg-slate-50 dark:hover:bg-white/5 transition text-slate-700 dark:text-gray-300">
                            <td class="px-8 py-5 text-slate-500 dark:text-gray-400 font-mono text-xs">{{ $lead->created_at->format('M d, Y') }}</td>
                            <td class="px-8 py-5 font-bold text-slate-800 dark:text-white">{{ $lead->name }}</td>
                            <td class="px-8 py-5 text-slate-500 dark:text-gray-400">
                                <div class="text-xs font-bold">{{ $lead->email }}</div>
                                <div class="text-xs mt-0.5">{{ $lead->phone }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="bg-purple-100 dark:bg-purple-500/10 text-purple-700 dark:text-purple-400 px-3 py-1 rounded-full text-[10px] font-bold border border-purple-200 dark:border-purple-500/20">{{ $lead->level }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="p-12 text-center text-slate-400 italic">No leads captured yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- PAGINATION -->
            <div class="px-8 py-4 border-t border-slate-100 dark:border-white/5 text-xs">
                {{ $leads->links() }}
            </div>
        </div>
    </div>

@endsection
