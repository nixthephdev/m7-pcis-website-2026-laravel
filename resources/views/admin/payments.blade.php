@extends('layouts.admin')

@section('title', 'Payments')
@section('header', 'Financial Records')

@section('content')

    <!-- 1. FINANCIAL STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Collected -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Collected</p>
                <h3 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-1">
                    ₱{{ number_format($payments->where('status', 'verified')->sum('amount'), 2) }}
                </h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Pending Verification -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pending Verification</p>
                <h3 class="text-2xl font-bold text-amber-600 dark:text-amber-400 mt-1">
                    {{ $payments->where('status', 'pending')->count() }}
                </h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-amber-50 dark:bg-amber-900/20 text-amber-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Today's Income -->
        <div class="bg-white dark:bg-[#151e32] p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Today's Income</p>
                <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-1">
                    ₱{{ number_format($payments->where('created_at', '>=', \Carbon\Carbon::today())->sum('amount'), 2) }}
                </h3>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-50 dark:bg-blue-900/20 text-blue-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
        </div>
    </div>

    <!-- 2. TOOLBAR -->
    <div class="flex justify-between items-center mb-6" x-data="{ openModal: false }">
        <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Transaction History</h3>
        
        <!-- Add Payment Button -->
        <button @click="openModal = true" class="bg-[#00539C] hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-blue-500/30 flex items-center gap-2 transition transform hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Record New Payment
        </button>

        <!-- ADD PAYMENT MODAL -->
        <div x-show="openModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-[#0B1120]/80 backdrop-blur-sm transition-opacity" @click="openModal = false"></div>
            
            <div class="bg-white dark:bg-[#151e32] rounded-2xl shadow-2xl w-full max-w-lg relative overflow-hidden transform transition-all border border-gray-100 dark:border-white/10">
                <div class="bg-gradient-to-r from-[#002855] to-[#00539C] px-6 py-4 border-b border-white/10">
                    <h3 class="text-white font-bold text-lg font-royal">Record Payment</h3>
                    <p class="text-blue-200 text-xs">Enter transaction details below.</p>
                </div>
                
                <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                    @csrf
                    
                    <!-- Student Selector -->
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Select Student</label>
                        <select name="enrollment_id" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                            <option value="">-- Choose Student --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->last_name }}, {{ $student->first_name }} ({{ $student->grade_level }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Amount (PHP)</label>
                            <input type="number" name="amount" step="0.01" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Payment Type</label>
                            <select name="type" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                                <option>Tuition Fee</option>
                                <option>Reservation Fee</option>
                                <option>Miscellaneous</option>
                                <option>Books / Uniform</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Method</label>
                            <select name="method" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                                <option>Cash</option>
                                <option>Bank Transfer</option>
                                <option>GCash / E-Wallet</option>
                                <option>Cheque</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Proof (Optional)</label>
                            <input type="file" name="proof_file" class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" @click="openModal = false" class="px-4 py-2 text-xs font-bold text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white">Cancel</button>
                        <button type="submit" class="bg-[#00539C] text-white px-6 py-2 rounded-lg text-xs font-bold shadow-md hover:bg-blue-800 transition">Save Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 3. TRANSACTIONS TABLE -->
    <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-[10px] uppercase tracking-widest font-bold border-b border-slate-100 dark:border-white/5">
                <tr>
                    <th class="px-8 py-5">Transaction ID</th>
                    <th class="px-8 py-5">Student</th>
                    <th class="px-8 py-5">Amount / Type</th>
                    <th class="px-8 py-5">Method</th>
                    <th class="px-8 py-5">Status</th>
                    <th class="px-8 py-5 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                @forelse($payments as $payment)
                <tr class="hover:bg-blue-50/30 dark:hover:bg-white/5 transition duration-200">
                    <td class="px-8 py-5">
                        <span class="font-mono text-xs text-slate-500 dark:text-slate-400">{{ $payment->transaction_id }}</span>
                        <div class="text-[10px] text-slate-400">{{ $payment->created_at->format('M d, Y') }}</div>
                    </td>
                    <td class="px-8 py-5">
                        <div class="font-bold text-slate-800 dark:text-white">{{ $payment->enrollment->last_name }}, {{ $payment->enrollment->first_name }}</div>
                        <div class="text-xs text-slate-400">{{ $payment->enrollment->grade_level }}</div>
                    </td>
                    <td class="px-8 py-5">
                        <div class="font-bold text-emerald-600 dark:text-emerald-400">₱{{ number_format($payment->amount, 2) }}</div>
                        <div class="text-xs text-slate-400">{{ $payment->type }}</div>
                    </td>
                    <td class="px-8 py-5 text-slate-600 dark:text-slate-300">{{ $payment->method }}</td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase border
                            {{ $payment->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-900/20 dark:border-amber-900/50' : '' }}
                            {{ $payment->status == 'verified' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-900/20 dark:border-emerald-900/50' : '' }}
                            {{ $payment->status == 'rejected' ? 'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-900/20 dark:border-rose-900/50' : '' }}">
                            {{ $payment->status }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right flex justify-end gap-2">
                        
                        <!-- View Proof (If exists) -->
                        @if($payment->proof_file)
                            <div x-data="{ showProof: false }">
                                <button @click="showProof = true" class="text-blue-500 hover:text-blue-700 text-xs font-bold underline">View Proof</button>
                                <!-- Proof Modal -->
                                <div x-show="showProof" x-cloak class="fixed inset-0 z-[200] flex items-center justify-center p-4">
                                    <div class="fixed inset-0 bg-black/90 backdrop-blur-sm" @click="showProof = false"></div>
                                    <div class="relative z-10 max-w-2xl w-full bg-white p-2 rounded-lg">
                                        <img src="{{ asset('storage/' . $payment->proof_file) }}" class="w-full h-auto rounded">
                                        <button @click="showProof = false" class="absolute -top-10 right-0 text-white font-bold">Close</button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Verify Actions -->
                        @if($payment->status == 'pending')
                            <form action="{{ route('admin.payments.verify', $payment->id) }}" method="POST">
                                @csrf <input type="hidden" name="status" value="verified">
                                <button class="text-emerald-500 hover:text-emerald-700 font-bold text-xs border border-emerald-200 px-2 py-1 rounded hover:bg-emerald-50 transition">Verify</button>
                            </form>
                            <form action="{{ route('admin.payments.verify', $payment->id) }}" method="POST">
                                @csrf <input type="hidden" name="status" value="rejected">
                                <button class="text-rose-500 hover:text-rose-700 font-bold text-xs border border-rose-200 px-2 py-1 rounded hover:bg-rose-50 transition">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-12 text-center text-slate-400 italic">No transactions found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-8 py-4">
        {{ $payments->links() }}
    </div>

@endsection