@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard Overview')

@section('content')
    
    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Card 1 -->
        <div class="bg-white dark:bg-white/5 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-white/10 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="absolute right-0 top-0 w-24 h-24 bg-brand-blue/5 dark:bg-brand-blue/20 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110 blur-xl"></div>
            <div class="relative z-10">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Total Applicants</p>
                <div class="flex items-end gap-3">
                    <h3 class="text-4xl font-bold text-slate-800 dark:text-white">{{ $students->count() }}</h3>
                    <span class="text-[10px] font-bold text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-500/10 px-2 py-1 rounded-full mb-1 border border-green-200 dark:border-green-500/20">↑ 12%</span>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="bg-white dark:bg-white/5 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-white/10 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="absolute right-0 top-0 w-24 h-24 bg-brand-gold/10 dark:bg-brand-gold/20 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110 blur-xl"></div>
            <div class="relative z-10">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Pending Review</p>
                <div class="flex items-end gap-3">
                    <h3 class="text-4xl font-bold text-slate-800 dark:text-white">{{ $students->where('status', 'pending')->count() }}</h3>
                    <span class="text-[10px] font-bold text-brand-gold bg-yellow-50 dark:bg-yellow-500/10 px-2 py-1 rounded-full mb-1 border border-yellow-200 dark:border-yellow-500/20">Action Needed</span>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white dark:bg-white/5 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-white/10 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
            <div class="absolute right-0 top-0 w-24 h-24 bg-brand-green/5 dark:bg-brand-green/20 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110 blur-xl"></div>
            <div class="relative z-10">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Leads Generated</p>
                <div class="flex items-end gap-3">
                    <h3 class="text-4xl font-bold text-slate-800 dark:text-white">{{ $leads->count() }}</h3>
                    <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-500/10 px-2 py-1 rounded-full mb-1 border border-blue-200 dark:border-blue-500/20">Fee Downloads</span>
                </div>
            </div>
        </div>
    </div>

    <!-- LEADS TABLE -->
    <div class="bg-white/80 dark:bg-white/5 backdrop-blur-md rounded-2xl shadow-lg border border-gray-200 dark:border-white/10 overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/5">
            <h3 class="font-bold text-lg text-slate-800 dark:text-white">Recent Marketing Leads</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50/50 dark:bg-white/5 text-gray-500 dark:text-gray-400 text-[10px] uppercase tracking-widest font-bold border-b border-gray-100 dark:border-white/5">
                    <tr>
                        <th class="px-8 py-4 font-semibold">Date</th>
                        <th class="px-8 py-4 font-semibold">Parent Name</th>
                        <th class="px-8 py-4 font-semibold">Contact</th>
                        <th class="px-8 py-4 font-semibold">Interest</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-white/5 text-sm">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-yellow-50/30 dark:hover:bg-white/5 transition duration-150 text-gray-700 dark:text-gray-300">
                        <td class="px-8 py-4 text-gray-500 dark:text-gray-400">{{ $lead->created_at->format('M d, Y') }}</td>
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
                    <tr><td colspan="4" class="p-12 text-center text-gray-500 dark:text-gray-400 italic">No leads captured yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection