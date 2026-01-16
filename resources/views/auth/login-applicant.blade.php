<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#00539C] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Effects -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-[#00539C] to-[#020617] opacity-90"></div>
    <div class="absolute top-24 right-24 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>

    <!-- Main Card -->
    <div class="relative z-10 w-full max-w-4xl bg-white rounded-3xl shadow-2xl flex overflow-hidden min-h-[500px]">
        
        <!-- Left: Form -->
        <div class="w-full md:w-1/2 p-10 md:p-12 flex flex-col justify-center">
            <div class="mb-8">
                <img src="{{ asset('images/logo.png') }}" class="h-12 w-auto mb-6 md:hidden">
                <h3 class="text-3xl font-bold text-slate-800">Welcome Back</h3>
                <p class="text-slate-500 text-sm mt-1">Enter your credentials to access your portal.</p>
            </div>

             <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm border border-emerald-100 flex items-center gap-2 animate-fade-in-down">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Error -->
            @if($errors->any())
                <div class="bg-red-50 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm border border-red-100 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif


            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 ml-1">Email Address</label>
                    <input type="email" name="email" required 
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-[#00539C] focus:border-[#00539C] outline-none transition text-sm font-medium">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 ml-1">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-[#00539C] focus:border-[#00539C] outline-none transition text-sm font-medium">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="rounded border-gray-300 text-[#00539C] focus:ring-[#00539C]">
                        <span class="text-xs font-bold text-slate-500">Remember me</span>
                    </label>
                    <a href="#" class="text-xs font-bold text-[#00539C] hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-[#00539C] text-white font-bold py-3.5 rounded-xl hover:bg-blue-800 transition shadow-lg shadow-blue-500/30 transform hover:-translate-y-0.5">
                    Sign In
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">
                    New here? <a href="{{ route('register') }}" class="text-[#00539C] font-bold hover:underline">Create Account</a>
                </p>
            </div>
        </div>

        <!-- Right: Image (Hidden on Mobile) -->
        <div class="hidden md:flex w-1/2 bg-[#00539C] relative items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
            <!-- Glow -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 text-center text-white p-8">
                <img src="{{ asset('images/logo.png') }}" class="h-24 w-auto mx-auto mb-6 drop-shadow-xl animate-float">
                <h2 class="font-royal font-bold text-2xl">M7 PCIS</h2>
                <p class="text-blue-200 text-xs uppercase tracking-widest mt-1">Applicant Portal</p>
            </div>
        </div>

    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
    </style>

</body>
</html>