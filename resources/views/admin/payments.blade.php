@extends('layouts.admin')

@section('title', 'Financial Overview')
@section('header', 'Financial Overview')

@section('content')

    <!-- 1. FINANCIAL STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Total Collected -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-2xl shadow-card border border-slate-100 dark:border-white/5 relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Collected</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white">₱{{ number_format($totalCollected, 2) }}</h3>
            </div>
            <div class="absolute right-4 top-4 w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Pending Clearance -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-2xl shadow-card border border-slate-100 dark:border-white/5 relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Pending Clearance</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white">₱{{ number_format($pendingAmount, 2) }}</h3>
            </div>
            <div class="absolute right-4 top-4 w-12 h-12 rounded-xl bg-amber-50 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-gradient-to-br from-brand-blue to-blue-700 p-6 rounded-2xl shadow-lg shadow-blue-500/20 text-white relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-[11px] font-bold text-blue-200 uppercase tracking-widest mb-1">Today's Transactions</p>
                <h3 class="text-3xl font-bold">{{ $payments->where('created_at', '>=', now()->startOfDay())->count() }}</h3>
                <p class="text-xs text-blue-100 mt-2">Payments processed today</p>
            </div>
            <div class="absolute right-0 bottom-0 w-32 h-32 bg-white/10 rounded-full blur-3xl -mr-10 -mb-10"></div>
        </div>

    </div>

    <!-- 2. TOOLBAR -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <div class="flex p-1 bg-white dark:bg-[#151e32] rounded-xl border border-slate-200 dark:border-white/5 shadow-sm">
            <a href="{{ route('admin.payments', ['status' => 'all']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition {{ !request('status') || request('status') == 'all' ? 'bg-brand-blue text-white shadow-md' : 'text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white' }}">All</a>
            <a href="{{ route('admin.payments', ['status' => 'paid']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition {{ request('status') == 'paid' ? 'bg-emerald-500 text-white shadow-md' : 'text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white' }}">Paid</a>
            <a href="{{ route('admin.payments', ['status' => 'pending']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition {{ request('status') == 'pending' ? 'bg-amber-500 text-white shadow-md' : 'text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white' }}">Pending</a>
        </div>

        <form action="{{ route('admin.payments') }}" method="GET" class="relative w-full md:w-80">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search transaction ID or name..." 
                   class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-[#151e32] border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-brand-blue focus:border-transparent outline-none shadow-sm transition text-slate-700 dark:text-white placeholder-slate-400">
            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </form>
    </div>

    <!-- 3. TRANSACTIONS TABLE -->
    <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-[10px] uppercase tracking-widest font-bold border-b border-slate-100 dark:border-white/5">
                    <tr>
                        <th class="px-8 py-5">Transaction ID</th>
                        <th class="px-8 py-5">Student</th>
                        <th class="px-8 py-5">Type</th>
                        <th class="px-8 py-5">Amount</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                    @forelse($payments as $payment)
                    <tr class="hover:bg-slate-50 dark:hover:bg-white/5 transition text-slate-700 dark:text-gray-300">
                        <td class="px-8 py-5 font-mono text-xs text-slate-500 dark:text-slate-400">
                            {{ $payment->transaction_id }}
                        </td>
                        <td class="px-8 py-5 font-bold text-slate-800 dark:text-white">
                            {{ $payment->last_name }}, {{ $payment->first_name }}
                            <span class="block text-xs text-slate-400 font-normal">{{ $payment->grade_level }}</span>
                        </td>
                        <td class="px-8 py-5">
                            {{ $payment->type }}
                            <span class="block text-xs text-slate-400">{{ $payment->method }}</span>
                        </td>
                        <td class="px-8 py-5 font-bold text-slate-800 dark:text-white">
                            ₱{{ number_format($payment->amount, 2) }}
                        </td>
                        <td class="px-8 py-5">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold border
                                {{ $payment->status == 'paid' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20' : '' }}
                                {{ $payment->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20' : '' }}
                                {{ $payment->status == 'rejected' ? 'bg-red-50 text-red-700 border-red-200 dark:bg-red-500/10 dark:text-red-400 dark:border-red-500/20' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $payment->status == 'paid' ? 'bg-emerald-500' : ($payment->status == 'pending' ? 'bg-amber-500' : 'bg-red-500') }}"></span>
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right text-slate-500 text-xs">
                            {{ \Carbon\Carbon::parse($payment->created_at)->format('M d, Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-12 text-center text-slate-400 italic">No payment records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-8 py-4 border-t border-slate-100 dark:border-white/5">
            {{ $payments->links() }}
        </div>
    </div>

@endsection