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

    <!-- 1. BACKGROUND (Royal Blue Gradient) -->
    <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#00539C] via-[#002855] to-[#020617]"></div>
        
        <!-- Texture -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 mix-blend-overlay"></div>
        
        <!-- Subtle Glows -->
        <div class="absolute top-[-20%] left-[-10%] w-[800px] h-[800px] bg-blue-400/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[800px] h-[800px] bg-indigo-500/10 rounded-full blur-[120px]"></div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-10 w-full max-w-[400px] flex flex-col items-center">
        
        <!-- LOGO -->
        <div class="text-center mb-8">
            <div class="relative inline-block">
                <div class="absolute inset-0 bg-white/20 rounded-full blur-xl"></div>
                <img src="{{ asset('images/logo.png') }}" class="relative h-24 w-auto mx-auto mb-4 drop-shadow-2xl hover:scale-105 transition duration-500">
            </div>
            <h1 class="text-3xl font-royal font-bold tracking-wide text-white drop-shadow-lg">M7 PCIS</h1>
            <p class="text-[10px] text-blue-200 uppercase font-bold tracking-[0.2em] mt-2 opacity-80">Registrar Portal</p>
        </div>

        <!-- LOGIN CARD (Glassmorphic) -->
        <div class="w-full bg-[#001a35]/40 border border-white/10 rounded-3xl shadow-2xl p-8 backdrop-blur-xl ring-1 ring-white/5">
            
            <!-- Error Alert -->
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500/30 text-red-100 px-4 py-3 rounded-xl mb-6 text-xs flex items-center gap-2 font-bold shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label class="block text-[10px] font-bold text-blue-200 uppercase mb-1.5 ml-1 tracking-wider">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-300 group-focus-within:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                        </div>
                        <input type="email" name="email" required 
                               class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-[#001226]/50 border border-white/10 text-white placeholder-blue-300/30 focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 outline-none transition text-sm shadow-inner backdrop-blur-sm"
                               placeholder="admin@pcis.edu.ph">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-[10px] font-bold text-blue-200 uppercase mb-1.5 ml-1 tracking-wider">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-300 group-focus-within:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <input type="password" name="password" required 
                               class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-[#001226]/50 border border-white/10 text-white placeholder-blue-300/30 focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 outline-none transition text-sm shadow-inner backdrop-blur-sm"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Options -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-blue-200 hover:text-white transition">
                        <input type="checkbox" class="rounded border-white/20 bg-[#001226] text-blue-400 focus:ring-0">
                        <span>Remember me</span>
                    </label>
                    
                    <!-- UPDATED LINK HERE -->
                    <a href="{{ route('admin.password.request') }}" class="text-blue-300 hover:text-white transition font-bold underline decoration-blue-400/30 underline-offset-4">Forgot password?</a>
                </div>

                <!-- Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-900/50 transition transform hover:-translate-y-0.5 border border-white/10 mt-2">
                    Sign In
                </button>
            </form>
        </div>

        <!-- FOOTER -->
        <div class="mt-12 text-center opacity-60 hover:opacity-100 transition duration-500">
            <p class="text-[10px] text-blue-200 uppercase tracking-widest">
                &copy; {{ date('Y') }} M7 PCIS. All rights reserved.
            </p>
            <p class="text-[10px] text-blue-300/50 mt-1">
                System Architecture by <span class="text-white font-bold">Nikko Calumpiano</span>
            </p>
        </div>

    </div>

</body>
</html>