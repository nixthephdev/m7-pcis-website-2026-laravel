<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#002855] min-h-screen flex flex-col items-center justify-center p-4 text-white relative overflow-hidden">

    <!-- 1. CINEMATIC BACKGROUND (Exact Match to Login Page) -->
    <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none">
        <!-- Spotlight Gradient: Royal Blue Center -> Deep Navy Edges -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#00539C] via-[#002855] to-[#020617]"></div>
        
        <!-- Texture Overlay -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 mix-blend-overlay"></div>
        
        <!-- Vignette (Dark Corners) -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/40"></div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-10 w-full max-w-[400px] flex flex-col items-center">
        
        <!-- LOGO -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" class="relative h-20 w-auto mx-auto mb-4 drop-shadow-2xl">
            <h1 class="text-2xl font-royal font-bold tracking-wide text-white drop-shadow-lg">Reset Password</h1>
            <p class="text-[10px] text-blue-200 uppercase font-bold tracking-[0.2em] mt-2 opacity-80">Admin Recovery</p>
        </div>

        <!-- CARD (Glassmorphic) -->
        <div class="w-full bg-[#001a35]/40 border border-white/10 rounded-3xl shadow-2xl p-8 backdrop-blur-xl ring-1 ring-white/5">
            
            @if (session('status'))
                <div class="bg-emerald-500/20 border border-emerald-500/30 text-emerald-100 px-4 py-3 rounded-xl mb-6 text-xs flex items-center gap-2 font-bold shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.email') }}" class="space-y-5">
                @csrf
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
                    @error('email') <span class="text-red-400 text-xs mt-1 block ml-1">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-900/50 transition transform hover:-translate-y-0.5 border border-white/10 mt-2">
                    Send Reset Link
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('admin.login') }}" class="text-[10px] font-bold text-blue-300 hover:text-white transition uppercase tracking-widest">
                    ← Return to Login
                </a>
            </div>
        </div>
    </div>
</body>
</html>