<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#002855] min-h-screen flex flex-col items-center justify-center p-4 text-white relative overflow-hidden">

    <!-- 1. CINEMATIC BACKGROUND (Exact Match) -->
    <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#00539C] via-[#002855] to-[#020617]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/40"></div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-10 w-full max-w-[400px] flex flex-col items-center">
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-royal font-bold tracking-wide text-white drop-shadow-lg">Set New Password</h1>
            <p class="text-[10px] text-blue-200 uppercase font-bold tracking-[0.2em] mt-2 opacity-80">Secure Your Account</p>
        </div>

        <div class="w-full bg-[#001a35]/40 border border-white/10 rounded-3xl shadow-2xl p-8 backdrop-blur-xl ring-1 ring-white/5">
            
            <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email (Read Only) -->
                <div>
                    <label class="block text-[10px] font-bold text-blue-200 uppercase mb-1.5 ml-1 tracking-wider">Email Address</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" required readonly
                           class="w-full pl-4 pr-4 py-3.5 rounded-xl bg-white/5 border border-white/10 text-gray-400 cursor-not-allowed text-sm">
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-[10px] font-bold text-blue-200 uppercase mb-1.5 ml-1 tracking-wider">New Password</label>
                    <input type="password" name="password" required 
                           class="w-full pl-4 pr-4 py-3.5 rounded-xl bg-[#001226]/50 border border-white/10 text-white placeholder-blue-300/30 focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 outline-none transition text-sm shadow-inner backdrop-blur-sm">
                    @error('password') <span class="text-red-400 text-xs mt-1 block ml-1">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-[10px] font-bold text-blue-200 uppercase mb-1.5 ml-1 tracking-wider">Confirm Password</label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full pl-4 pr-4 py-3.5 rounded-xl bg-[#001226]/50 border border-white/10 text-white placeholder-blue-300/30 focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400/50 outline-none transition text-sm shadow-inner backdrop-blur-sm">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-900/50 transition transform hover:-translate-y-0.5 border border-white/10 mt-2">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</body>
</html>