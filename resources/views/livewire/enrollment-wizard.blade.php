<div class="max-w-[1400px] mx-auto px-4 py-12">
    
    <div class="flex flex-col lg:flex-row gap-10">
        
        <!-- LEFT: SIDEBAR NAVIGATION -->
        <div class="w-full lg:w-64 shrink-0">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <div class="p-4 bg-brand-blue text-white font-bold text-sm tracking-wide uppercase">
                    Application Steps
                </div>
                <nav class="flex flex-col text-sm">
                    @php
                        $steps = [
                            1 => 'Application Type',
                            2 => 'Student Information',
                            3 => 'Home Address',
                            4 => 'Father\'s Info',
                            5 => 'Mother\'s Info',
                            6 => 'Guardian',
                            7 => 'Siblings',
                            8 => 'Student Health',
                            9 => 'Additional Info',
                            10 => 'Primary Email',
                            11 => 'Summary'
                        ];
                    @endphp

                    @foreach($steps as $key => $label)
                        <div class="px-5 py-3 border-b border-gray-50 flex items-center gap-3 transition-colors duration-300 {{ $currentStep == $key ? 'bg-blue-50 text-brand-blue font-bold border-l-4 border-l-brand-blue' : 'text-gray-500' }}">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs {{ $currentStep == $key ? 'bg-brand-blue text-white' : 'bg-gray-200 text-gray-500' }}">
                                {{ $key }}
                            </div>
                            {{ $label }}
                        </div>
                    @endforeach
                </nav>
            </div>
        </div>

        <!-- RIGHT: FORM CONTENT -->
        <div class="flex-grow">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 md:p-10 min-h-[600px]">
                
                <!-- STEP 1: APPLICATION TYPE -->
                @if($currentStep == 1)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Application Type</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <label class="cursor-pointer group">
                                <input type="radio" wire:model="applicant_type" value="New" class="peer sr-only">
                                <div class="h-32 flex items-center justify-center border-2 border-gray-200 rounded-2xl peer-checked:border-brand-blue peer-checked:bg-blue-50 peer-checked:text-brand-blue font-bold text-gray-500 group-hover:border-blue-200 transition">
                                    New Student
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" wire:model="applicant_type" value="Returnee" class="peer sr-only">
                                <div class="h-32 flex items-center justify-center border-2 border-gray-200 rounded-2xl peer-checked:border-brand-blue peer-checked:bg-blue-50 peer-checked:text-brand-blue font-bold text-gray-500 group-hover:border-blue-200 transition">
                                    Returnee
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" wire:model="applicant_type" value="Transferee" class="peer sr-only">
                                <div class="h-32 flex items-center justify-center border-2 border-gray-200 rounded-2xl peer-checked:border-brand-blue peer-checked:bg-blue-50 peer-checked:text-brand-blue font-bold text-gray-500 group-hover:border-blue-200 transition">
                                    Transferee
                                </div>
                            </label>
                        </div>
                        @error('applicant_type') 
                            <div class="mt-4 p-3 bg-red-50 text-red-600 text-sm font-bold rounded-lg border border-red-100 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif

                <!-- STEP 2: STUDENT INFO -->
                @if($currentStep == 2)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Student Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">First Name *</label>
                                <input type="text" wire:model="first_name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Last Name *</label>
                                <input type="text" wire:model="last_name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Grade Level *</label>
                                <select wire:model="grade_level" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none bg-white">
                                    <option value="">Select Level</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Kinder">Kinder</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 11">Grade 11</option>
                                </select>
                                @error('grade_level') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Email Address *</label>
                                <input type="email" wire:model="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Mobile Phone *</label>
                                <input type="text" wire:model="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 3: HOME ADDRESS -->
                @if($currentStep == 3)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Home Address</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Region / Province *</label>
                                <input type="text" wire:model="province" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('province') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">City / Municipality *</label>
                                <input type="text" wire:model="city" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Barangay *</label>
                                <input type="text" wire:model="barangay" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('barangay') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Street / House No. *</label>
                                <input type="text" wire:model="street" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                                @error('street') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 4: FATHER -->
                @if($currentStep == 4)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Father's Information</h2>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Full Name</label>
                                <input type="text" wire:model="father_name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Mobile Number</label>
                                <input type="text" wire:model="father_phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Email Address</label>
                                <input type="email" wire:model="father_email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 5: MOTHER -->
                @if($currentStep == 5)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Mother's Information</h2>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Maiden Name</label>
                                <input type="text" wire:model="mother_name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Mobile Number</label>
                                <input type="text" wire:model="mother_phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Email Address</label>
                                <input type="email" wire:model="mother_email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 6: GUARDIAN -->
                @if($currentStep == 6)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Guardian's Information</h2>
                        <div class="bg-blue-50 border border-blue-100 text-blue-800 p-4 rounded-lg text-sm mb-6">
                            If the student is living with parents, you may skip this step.
                        </div>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Guardian Name</label>
                                <input type="text" wire:model="guardian_name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Relationship</label>
                                <input type="text" wire:model="guardian_relation" placeholder="e.g. Aunt, Grandparent" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 7: SIBLINGS -->
                @if($currentStep == 7)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Siblings Information</h2>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">List any siblings enrolled in PCIS</label>
                        <textarea wire:model="siblings_info" rows="4" placeholder="Name - Grade Level" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none"></textarea>
                    </div>
                @endif

                <!-- STEP 8: HEALTH -->
                @if($currentStep == 8)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Student Health</h2>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Allergies</label>
                                <input type="text" wire:model="health_allergies" placeholder="e.g. Peanuts, Dust" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Medical Conditions</label>
                                <textarea wire:model="health_conditions" rows="3" placeholder="e.g. Asthma, Vision Impairment" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none"></textarea>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 9: ADDITIONAL INFO -->
                @if($currentStep == 9)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Additional Information</h2>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Previous School</label>
                                <input type="text" wire:model="previous_school" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">How did you hear about us?</label>
                                <select wire:model="referral_source" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none bg-white">
                                    <option value="">Select Option</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Friend">Friend / Family</option>
                                    <option value="Event">School Event</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- STEP 10: PRIMARY EMAIL -->
                @if($currentStep == 10)
                    <div class="animate-fade-in-up">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 mb-6">Primary Contact Email</h2>
                        <p class="text-gray-500 text-sm mb-6">This email will be used for all official correspondence regarding the application.</p>
                        
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Confirm Email Address *</label>
                        <input type="email" wire:model="primary_email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                        @error('primary_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                @endif

                <!-- STEP 11: SUMMARY -->
                @if($currentStep == 11)
                    <div class="text-center animate-fade-in-up">
                        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Ready to Submit?</h2>
                        <p class="text-gray-500 mt-2 mb-8">Please review your information. By clicking submit, you agree to our Data Privacy Policy.</p>
                        
                        <button wire:click="submit" class="bg-brand-blue text-white px-10 py-4 rounded-xl font-bold shadow-xl hover:bg-blue-800 transition transform hover:-translate-y-1">
                            Submit Application Now
                        </button>
                    </div>
                @endif

                <!-- NAVIGATION BUTTONS -->
                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-between items-center">
                    @if($currentStep > 1)
                        <button wire:click="previousStep" class="text-gray-500 font-bold hover:text-brand-blue transition flex items-center gap-2">
                            ← Back
                        </button>
                    @else
                        <div></div>
                    @endif

                    @if($currentStep < 11)
                        <button wire:click="nextStep" class="bg-brand-blue text-white px-8 py-3 rounded-lg font-bold shadow-md hover:bg-blue-800 transition">
                            Next Step →
                        </button>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>