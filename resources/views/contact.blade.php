@extends('layouts.app')

@section('title', 'Contact Us - M7 PCIS')

@section('content')

<!-- Header -->
<div class="bg-brand-blue py-20 text-center text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <h1 class="text-4xl md:text-5xl font-serif font-bold mb-4 relative z-10">Contact Us</h1>
    <p class="text-lg text-blue-100 font-light relative z-10">We are here to assist you. Reach out to our specific departments below.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        
        <!-- Left Column: Contact Info -->
        <div>
            <h2 class="text-3xl font-serif font-bold text-brand-dark mb-8">Get in Touch</h2>
            
            <!-- Main Address Card -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-brand-red mb-8">
                <h3 class="font-bold text-xl text-brand-blue mb-4">Campus Location</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    <strong>M7 Philippine Cambridge School</strong><br>
                    Km. 25 Gen. Aguinaldo Highway,<br>
                    Anabu II-D, City of Imus,<br>
                    Cavite, Philippines
                </p>
                <div class="space-y-2 text-gray-700">
                    <p class="flex items-center"><span class="text-xl mr-3">☎️</span> +6346 458 6588</p>
                    <p class="flex items-center"><span class="text-xl mr-3">📱</span> +63 917 7217 800</p>
                </div>
            </div>

            <!-- Department Emails Grid -->
            <h3 class="font-serif font-bold text-2xl text-brand-dark mb-6">Department Directory</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <div class="bg-blue-50 p-5 rounded-xl border border-blue-100">
                    <p class="text-xs font-bold text-brand-blue uppercase mb-1">Admissions</p>
                    <a href="mailto:admissions@pcis.edu.ph" class="text-sm font-medium hover:underline">admissions@pcis.edu.ph</a>
                </div>

                <div class="bg-yellow-50 p-5 rounded-xl border border-yellow-100">
                    <p class="text-xs font-bold text-brand-yellow uppercase mb-1">Registrar</p>
                    <a href="mailto:registrar@pcis.edu.ph" class="text-sm font-medium hover:underline">registrar@pcis.edu.ph</a>
                </div>

                <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
                    <p class="text-xs font-bold text-gray-500 uppercase mb-1">IT Support</p>
                    <a href="mailto:admin@pcis.edu.ph" class="text-sm font-medium hover:underline">admin@pcis.edu.ph</a>
                </div>

                <div class="bg-red-50 p-5 rounded-xl border border-red-100">
                    <p class="text-xs font-bold text-brand-red uppercase mb-1">School Director</p>
                    <a href="mailto:president@pcis.edu.ph" class="text-sm font-medium hover:underline">president@pcis.edu.ph</a>
                </div>
            </div>
        </div>

        <!-- Right Column: Map -->
        <div class="h-full min-h-[400px] rounded-2xl overflow-hidden shadow-2xl border-4 border-white relative">
            <!-- Google Map Embed for Imus, Cavite -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.887248386686!2d120.9396!3d14.3761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3a000000001%3A0x0!2zMTTCsDIyJzM0LjAiTiAxMjDCsDU2JzIyLjYiRQ!5e0!3m2!1sen!2sph!4v1620000000000!5m2!1sen!2sph" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                class="absolute inset-0">
            </iframe>
        </div>

    </div>

    <!-- FAQ Section -->
    <div class="mt-20 max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-serif font-bold text-brand-dark mb-6">Frequently Asked Questions</h2>
        <div class="space-y-4 text-left">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h4 class="font-bold text-brand-blue mb-2">What are the office hours?</h4>
                <p class="text-gray-600 text-sm">Our Admissions Office is open Monday to Friday, 8:00 AM to 4:00 PM, and Saturdays by appointment.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h4 class="font-bold text-brand-blue mb-2">Can I schedule a campus tour?</h4>
                <p class="text-gray-600 text-sm">Yes! Please email admissions@pcis.edu.ph or call us to schedule a visit.</p>
            </div>
        </div>
    </div>

</div>

@endsection