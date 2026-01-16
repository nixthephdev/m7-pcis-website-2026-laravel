<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#00539C] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Effects -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-[#00539C] to-[#020617] opacity-90"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>

    <!-- Main Card -->
    <div class="relative z-10 w-full max-w-5xl bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl flex overflow-hidden">
        
        <!-- Left: Info Panel -->
        <div class="hidden md:flex w-5/12 bg-[#00539C]/80 p-10 flex-col justify-between text-white relative">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            
            <div class="relative z-10">
                <img src="{{ asset('images/logo.png') }}" class="h-16 w-auto mb-6 drop-shadow-md">
                <h2 class="font-royal font-bold text-3xl leading-tight mb-2">Begin Your<br>Journey</h2>
                <p class="text-blue-100 text-sm leading-relaxed opacity-90">Join a community dedicated to academic excellence and character formation.</p>
            </div>

            <div class="relative z-10 space-y-4">
                <div class="flex items-center gap-3 text-sm font-medium text-blue-100">
                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">✓</div>
                    <span>Create Applicant Profile</span>
                </div>
                <div class="flex items-center gap-3 text-sm font-medium text-blue-100">
                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">✓</div>
                    <span>Submit Requirements</span>
                </div>
                <div class="flex items-center gap-3 text-sm font-medium text-blue-100">
                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">✓</div>
                    <span>Track Status</span>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="w-full md:w-7/12 bg-white p-10 md:p-12 overflow-y-auto">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-slate-800">Create Account</h3>
                <p class="text-slate-500 text-sm">Please fill in your details to get started.</p>
            </div>

            <!-- ERROR ALERT (Add this!) -->
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg text-sm">
                    <p class="font-bold">Please fix the following errors:</p>
                    <ul class="list-disc pl-5 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 ml-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Parent or Student Name" required 
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-[#00539C] focus:border-[#00539C] outline-none transition text-sm font-medium">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 ml-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required 
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-[#00539C] focus:border-[#00539C] outline-none transition text-sm font-medium @error('email') border-red-500 @enderror">
                    <!-- Specific Email Error -->
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 ml-1">Password</label>
                        <input type="password" name="password" placeholder="••••••••" required 
                               class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-[#00539C] focus:border-[#00539C] outline-none transition text-sm font-medium">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5 ml-1">Confirm</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" required 
                               class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-[#00539C] focus:border-[#00539C] outline-none transition text-sm font-medium">
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#00539C] text-white font-bold py-3.5 rounded-xl hover:bg-blue-800 transition shadow-lg shadow-blue-500/30 transform hover:-translate-y-0.5 mt-2">
                    Create My Account
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">
                    Already registered? <a href="{{ route('login') }}" class="text-[#00539C] font-bold hover:underline">Sign In here</a>
                </p>
            </div>
        </div>
</body>
</html>