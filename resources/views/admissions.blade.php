@extends('layouts.app')

@section('title', 'Admissions - M7 PCIS')

@section('content')

<!-- Hero -->
<div class="bg-brand-dark py-24 text-center text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-brand-blue to-brand-dark opacity-90"></div>
    <!-- Decorative Circle -->
    <div class="absolute top-0 left-0 -ml-20 -mt-20 w-80 h-80 bg-brand-red opacity-10 rounded-full blur-3xl"></div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <h1 class="text-5xl font-serif font-bold mb-6">Join the PCIS Family</h1>
        <p class="text-xl text-blue-100 font-light">Admissions are now open for School Year 2025-2026</p>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 py-24">
    
    <!-- 3 Step Process -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-24">
        <!-- Step 1 -->
        <div class="text-center group">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-brand-blue shadow-xl group-hover:scale-110 transition duration-300">
                <span class="font-royal font-bold text-4xl text-brand-blue">1</span>
            </div>
            <h3 class="font-serif font-bold text-2xl text-brand-dark mb-3">Apply Online</h3>
            <p class="text-gray-600 font-light px-4">Complete the digital application form to register your interest in our programs.</p>
        </div>
        
        <!-- Step 2 -->
        <div class="text-center group">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-brand-red shadow-xl group-hover:scale-110 transition duration-300">
                <span class="font-royal font-bold text-4xl text-brand-red">2</span>
            </div>
            <h3 class="font-serif font-bold text-2xl text-brand-dark mb-3">Assessment</h3>
            <p class="text-gray-600 font-light px-4">Schedule an entrance assessment and interview with our guidance counselor.</p>
        </div>
        
        <!-- Step 3 -->
        <div class="text-center group">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-brand-yellow shadow-xl group-hover:scale-110 transition duration-300">
                <span class="font-royal font-bold text-4xl text-brand-yellow">3</span>
            </div>
            <h3 class="font-serif font-bold text-2xl text-brand-dark mb-3">Enrollment</h3>
            <p class="text-gray-600 font-light px-4">Submit the necessary requirements and settle tuition fees to secure your slot.</p>
        </div>
    </div>

    <!-- Requirements & CTA -->
    <div class="bg-white border border-gray-100 shadow-2xl rounded-3xl p-10 md:p-16 flex flex-col md:flex-row gap-16 items-center relative overflow-hidden">
        <!-- Decorative bg -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-green/5 rounded-full blur-3xl -mr-20 -mt-20"></div>

        <div class="md:w-1/2 relative z-10">
            <h3 class="text-3xl font-serif font-bold text-brand-blue mb-8">Requirements</h3>
            <ul class="space-y-5">
                <li class="flex items-center text-gray-700 font-medium">
                    <div class="w-6 h-6 rounded-full bg-brand-green/20 flex items-center justify-center mr-4 text-brand-green">✓</div>
                    PSA Birth Certificate
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <div class="w-6 h-6 rounded-full bg-brand-green/20 flex items-center justify-center mr-4 text-brand-green">✓</div>
                    Report Card (Form 138)
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <div class="w-6 h-6 rounded-full bg-brand-green/20 flex items-center justify-center mr-4 text-brand-green">✓</div>
                    Certificate of Good Moral Character
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <div class="w-6 h-6 rounded-full bg-brand-green/20 flex items-center justify-center mr-4 text-brand-green">✓</div>
                    2x2 ID Pictures
                </li>
            </ul>
        </div>
        
        <div class="md:w-1/2 text-center relative z-10">
            <h3 class="text-3xl font-serif font-bold text-brand-dark mb-4">Ready to Enroll?</h3>
            <p class="text-gray-600 mb-10 text-lg font-light">Slots for the upcoming school year are limited. Secure your child's future today.</p>
            
            <a href="{{ route('apply.form') }}" class="block w-full bg-brand-red text-white font-bold py-5 rounded-xl shadow-lg hover:bg-red-700 hover:shadow-2xl transition transform hover:-translate-y-1 text-lg tracking-wide uppercase">
                Proceed to Application
            </a>
            
            <p class="mt-6 text-sm text-gray-500">
                Need assistance? Call us at <span class="font-bold text-brand-blue">+6346 458 6588</span>
            </p>
        </div>
    </div>

</div>
@endsection