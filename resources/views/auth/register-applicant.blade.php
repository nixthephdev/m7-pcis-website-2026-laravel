<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cinzel:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#101426] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Glow -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[10%] w-[600px] h-[600px] bg-blue-900/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[10%] w-[600px] h-[600px] bg-indigo-900/10 rounded-full blur-[120px]"></div>
    </div>

    <!-- MAIN CARD -->
    <div class="relative z-10 w-full max-w-5xl bg-[#1E253E] border border-white/5 rounded-3xl shadow-2xl flex overflow-hidden">
        
        <!-- LEFT: BRANDING & STEPS -->
        <div class="hidden md:flex w-5/12 bg-gradient-to-br from-blue-900 to-[#101426] p-10 flex-col justify-between text-white relative">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
            
            <div class="relative z-10">
                <img src="{{ asset('images/logo.png') }}" class="h-14 w-auto mb-6 drop-shadow-lg">
                <h2 class="font-bold text-3xl leading-tight mb-2 font-serif">Begin Your<br>Journey</h2>
                <p class="text-blue-200/60 text-sm leading-relaxed">Join a community dedicated to academic excellence and character formation.</p>
            </div>

            <div class="relative z-10 space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-sm shadow-lg shadow-blue-500/50">1</div>
                    <span class="text-sm font-medium text-white">Create Applicant Profile</span>
                </div>
                <div class="flex items-center gap-4 opacity-50">
                    <div class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center font-bold text-sm">2</div>
                    <span class="text-sm font-medium text-white">Fill Application Form</span>
                </div>
                <div class="flex items-center gap-4 opacity-50">
                    <div class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center font-bold text-sm">3</div>
                    <span class="text-sm font-medium text-white">Submit Requirements</span>
                </div>
            </div>
        </div>

        <!-- RIGHT: FORM -->
        <div class="w-full md:w-7/12 p-10 md:p-12 text-white">
            <div class="mb-8">
                <h3 class="text-2xl font-bold">Create Account</h3>
                <p class="text-gray-400 text-sm mt-1">Please fill in your details to get started.</p>
            </div>

            <!-- ERROR ALERT -->
            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 mb-6 rounded-lg text-xs">
                    <p class="font-bold mb-1">Please fix the following errors:</p>
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Name -->
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5 ml-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Parent or Student Name" required 
                           class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5 ml-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required 
                           class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm">
                </div>

                <!-- Passwords -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-medium text-gray-300 mb-1.5 ml-1">Password</label>
                        <input type="password" name="password" placeholder="••••••••" required 
                               class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-300 mb-1.5 ml-1">Confirm</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" required 
                               class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm">
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-3.5 rounded-lg shadow-lg shadow-blue-900/30 transition transform hover:-translate-y-0.5 mt-2">
                    Create My Account
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-400">
                    Already registered? <a href="{{ route('login') }}" class="text-blue-400 font-bold hover:text-white transition">Sign In here</a>
                </p>
            </div>
        </div>

    </div>

</body>
</html>