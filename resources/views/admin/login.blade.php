<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#002855] min-h-screen flex flex-col items-center justify-center p-4 text-white relative overflow-hidden">

    <!-- 1. PREMIUM ROYAL BLUE BACKGROUND -->
    <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none">
        <!-- The Exact Gradient from the Navbar -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#002855] via-[#00539C] to-[#002855]"></div>
        
        <!-- Subtle Texture -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 mix-blend-overlay"></div>
        
        <!-- Ambient Glows (Subtle) -->
        <div class="absolute top-[-20%] left-[-10%] w-[800px] h-[800px] bg-blue-400/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[800px] h-[800px] bg-indigo-500/10 rounded-full blur-[120px]"></div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-10 w-full max-w-[420px] flex flex-col items-center">
        
        <!-- LOGO -->
        <div class="text-center mb-8">
            <div class="relative inline-block">
                <div class="absolute inset-0 bg-white/10 rounded-full blur-xl"></div>
                <img src="{{ asset('images/logo.png') }}" class="relative h-24 w-auto mx-auto mb-4 drop-shadow-2xl">
            </div>
            <h1 class="text-3xl font-bold tracking-wide text-white drop-shadow-md">M7 PCIS</h1>
            <p class="text-xs text-blue-100/80 mt-1 font-medium tracking-widest uppercase">Registrar & Admissions</p>
        </div>

        <!-- LOGIN CARD -->
        <div class="w-full bg-[#001f3f]/40 border border-white/10 rounded-2xl shadow-2xl p-8 backdrop-blur-md">
            
            <!-- Error Alert -->
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500/30 text-red-100 px-4 py-3 rounded-lg mb-6 text-xs flex items-center gap-2 font-bold shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label class="block text-xs font-bold text-blue-100 uppercase mb-1.5 ml-1">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-300 group-focus-within:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                        </div>
                        <input type="email" name="email" required 
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#001a35]/60 border border-white/10 text-white placeholder-blue-300/30 focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 outline-none transition text-sm shadow-inner"
                               placeholder="admin@pcis.edu.ph">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-xs font-bold text-blue-100 uppercase mb-1.5 ml-1">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-300 group-focus-within:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <input type="password" name="password" required 
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#001a35]/60 border border-white/10 text-white placeholder-blue-300/30 focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 outline-none transition text-sm shadow-inner"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Options -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-blue-100 hover:text-white">
                        <input type="checkbox" class="rounded border-blue-300/30 bg-[#001a35] text-blue-400 focus:ring-0">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="text-blue-200 hover:text-white transition font-bold underline decoration-blue-400/30 underline-offset-4">Forgot password?</a>
                </div>

                <!-- Button -->
                <button type="submit" class="w-full bg-white text-[#002855] font-bold py-3.5 rounded-xl shadow-lg hover:bg-blue-50 transition transform hover:-translate-y-0.5 border border-white/50 mt-2">
                    Sign In
                </button>
            </form>
        </div>

        <!-- FOOTER -->
        <div class="mt-12 text-center">
            <p class="text-[10px] text-blue-200/60 uppercase tracking-widest">
                &copy; {{ date('Y') }} M7 PCIS. All rights reserved.
            </p>
            <p class="text-[10px] text-blue-200/40 mt-1">
                System Architecture by <span class="text-blue-100 font-bold">Nikko Calumpiano</span>
            </p>
        </div>

    </div>

</body>
</html>