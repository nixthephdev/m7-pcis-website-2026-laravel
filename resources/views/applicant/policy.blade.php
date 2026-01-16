@extends('layouts.applicant')

@section('content')

<div class="max-w-5xl mx-auto px-4 py-12">
    
    <!-- HEADER -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-royal font-bold text-[#00539C] mb-2">Admission Policy</h1>
        <p class="text-slate-500">Academic Year 2026-2027</p>
    </div>

    <!-- CARD CONTAINER -->
    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden flex flex-col h-[75vh]">
        
        <!-- SCROLLABLE CONTENT AREA -->
        <div class="overflow-y-auto p-8 md:p-12 space-y-10 text-sm text-slate-700 leading-relaxed scroll-smooth">

            <!-- PURPOSE -->
            <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100">
                <h3 class="text-[#00539C] font-bold uppercase tracking-widest mb-2 text-xs">Purpose</h3>
                <p class="text-justify">The School Admission Policy ensures a fair, transparent, and consistent process for admitting students. It guides families through the requirements, timelines, and expectations for enrollment while helping the school maintain appropriate class sizes, uphold academic standards, and support student success.</p>
            </div>

            <!-- 1. ELIGIBILITY -->
            <section>
                <h3 class="text-[#00539C] font-bold text-lg uppercase tracking-wide mb-4 border-b border-gray-100 pb-2">1. Eligibility</h3>
                <ul class="list-disc pl-6 space-y-2 marker:text-[#00539C]">
                    <li>The school accepts applicants regardless of race, religion, nationality, or background.</li>
                    <li>Age requirements follow the guidelines set by the Department of Education.</li>
                    <li>Students must meet the developmental, academic, and behavioral readiness appropriate for their grade level.</li>
                </ul>
            </section>

            <!-- 2. ADMISSION REQUIREMENTS -->
            <section>
                <h3 class="text-[#00539C] font-bold text-lg uppercase tracking-wide mb-6 border-b border-gray-100 pb-2">2. Admission Requirements</h3>
                
                <div class="space-y-8">
                    
                    <!-- EYP -->
                    <div class="bg-white border-l-4 border-emerald-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 text-base mb-3">Early Years Programme (EYP)</h4>
                        <div class="space-y-4">
                            <div>
                                <span class="font-bold text-emerald-700 block">EYP 1 (Nursery)</span>
                                <ul class="list-disc pl-5 text-xs">
                                    <li>The applicant must already be 3 years old by November 30, 2026.</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold text-emerald-700 block">EYP 2 (Reception)</span>
                                <ul class="list-disc pl-5 text-xs">
                                    <li>The applicant must already be four (4) years old by November 30, 2026.</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold text-emerald-700 block">EYP 3 (Kinder)</span>
                                <ul class="list-disc pl-5 text-xs space-y-1">
                                    <li>The Kinder applicant must already be five (5) years old by November 30, 2026.</li>
                                    <li>Must have completed an Early Childhood Care and Development (ECCD) program (i.e. with certification) OR</li>
                                    <li>Must have undergone the Early Childhood Development (ECD) Checklist during the Admissions period with PCIS.</li>
                                    <li>Completed Admission Forms.</li>
                                    <li>Original Birth Certificate (PSA) for Filipinos; for Dual Filipino Citizens:
                                        <ul class="list-[circle] pl-5 mt-1 text-slate-500">
                                            <li>Original Copy of Birth Certificate or Copy of Identification Certificate as Filipino/Certificate of Recognition as Filipino Citizen/ Naturalization Certificate as Filipino (Note: As a general rule, dual citizens are classified as Filipinos upon submission of any of the two proofs of Philippine citizenship stated above as mentioned in www.immigration.gov.ph.)</li>
                                        </ul>
                                    </li>
                                    <li>Previous Report Card (if applicable).</li>
                                    <li>Medical or Immunization Records.</li>
                                    <li>ID photos (4pcs 1x2, 4pcs 2x2) white background (recent, close-up, with white background), soft copy is needed also for upload in the portal.</li>
                                    <li>Proof of registration and testing fee payment.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- PYP -->
                    <div class="bg-white border-l-4 border-blue-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 text-base mb-3">PYP 1-5 (Year 1-5)</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>The applicant must have a general average of at least 85% with no grade lower than 80% in any subject and in conduct during any grading period.</li>
                            <li>For grade 1, the ideal age is six (6) years old by October 31, 2026. Also, the Grade 1 applicant (even underage applicants) must complete a Department of Education accredited Kindergarten program by the end of the school year 2025-2026 and must have been issued a Kindergarten Certificate of Completion with the student’s Learner Reference Number (LRN).</li>
                            <li>Former students who completed at least one academic year in PCIS, left without conditions, and transferred to another school, but wish to continue their studies at PCIS, are considered RETURNEES. Returnees who were enrolled in other schools for only one year are exempted from taking the admissions test.</li>
                            <li>Original Birth Certificate (PSA) for Filipinos; for Dual Filipino Citizens:
                                <ul class="list-[circle] pl-5 mt-1 text-slate-500">
                                    <li>Original Copy of Birth Certificate or Copy of Identification Certificate as Filipino/Certificate of Recognition as Filipino Citizen/ Naturalization Certificate as Filipino (Note: As a general rule, dual citizens are classified as Filipinos upon submission of any of the two proofs of Philippine citizenship stated above as mentioned in www.immigration.gov.ph.)</li>
                                </ul>
                            </li>
                            <li>Medical or Immunization Records.</li>
                            <li>ID photos (4pcs 1x2, 4pcs 2x2) white background (recent, close-up, with white background), soft copy is needed also for upload in the portal.</li>
                            <li>Proof of registration and testing fee payment.</li>
                            <li>Report card for AY 2025-2026 (with grades for at least one quarter/term at the time of application) – front and back with name of student, grade level, school logo, LRN.</li>
                            <li>Report card for AY 2024-2025 (complete grades) – front and back with the name of student, grade level, school logo, LRN.</li>
                        </ul>
                    </div>

                    <!-- MYP -->
                    <div class="bg-white border-l-4 border-amber-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 text-base mb-3">MYP 1-5 (Year 6-10) Middle School</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>The applicant must have a general average of at least 85% with no grade lower than 80% in any subject and in conduct during any grading period.</li>
                            <li>For grade 1, the ideal age is six (6) years old by October 31, 2026. Also, the Grade 1 applicant (even underage applicants) must complete a Department of Education accredited Kindergarten program by the end of the school year 2025-2026 and must have been issued a Kindergarten Certificate of Completion with the student’s Learner Reference Number (LRN).</li>
                            <li>Former students who completed at least one academic year in DLSZ, left without conditions, and transferred to another school, but wish to continue their studies at PCIS are considered RETURNEES.</li>
                            <li>Returnees who were enrolled in other schools for only one year are exempted from taking the admissions test.</li>
                            <li>Proof of registration and testing fee payment.</li>
                            <li>Report card for AY 2025-2026 (with grades for at least one quarter/term at the time of application) – front and back with name of student, grade level, school logo, LRN.</li>
                            <li>Report card for AY 2024-2025 (complete grades) – front and back with the name of student, grade level, school logo, LRN.</li>
                        </ul>
                    </div>

                    <!-- IB DIPLOMA -->
                    <div class="bg-white border-l-4 border-purple-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 text-base mb-3">IB Diploma Certification & IB Diploma Programme (DP 1-2)</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>The applicant must have a general average of at least 85% with no grade lower than 80% in any subject and in conduct during any grading period.</li>
                            <li>Former students who completed at least one academic year in DLSZ, left without conditions, and transferred to another school, but wish to continue their studies at PCIS are considered RETURNEES.</li>
                            <li>Returnees who were enrolled in other schools for only one year are exempted from taking the admissions test.</li>
                            <li>Proof of registration and testing fee payment.</li>
                            <li>Report card for AY 2025-2026 (with grades for at least one quarter/term at the time of application) – front and back with name of student, grade level, school logo, LRN.</li>
                            <li>Report card for AY 2024-2025 (complete grades) – front and back with the name of student, grade level, school logo, LRN.</li>
                        </ul>
                    </div>

                    <!-- FOREIGN STUDENTS -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                        <h4 class="font-bold text-slate-800 text-base mb-3">Additional Admissions Requirements for Foreign Students</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>Copy of Birth Certificate from the Office of the Civil Registry of the respective country of birth, translated into English, or Embassy Certificate of birth details.</li>
                            <li>Copy of Valid Alien Certificate of Registration (ACR I-card) issued by the Bureau of Immigration (front and back).</li>
                            <li>Copy of Valid Passport (photo page).</li>
                            <li>Copy of Valid Passport (latest VISA page) and, if available, other valid Visa Identification document e.g. Special Investor’s Resident Visa (SIRV), Special Resident Retiree’s Visa (SRRV), PRA.</li>
                        </ul>
                        <div class="mt-4 text-xs text-slate-500 italic">
                            <p class="font-bold mb-1">*Note:</p>
                            <ol class="list-decimal pl-5 space-y-1">
                                <li>Only for those coming from international schools and/or schools abroad— Course Description of all subjects taken of all levels attended may also be required from the applicant upon evaluation.</li>
                                <li>All foreign students must have a valid visa or permit to study as mandated by the Philippine Immigration Law. Tourist Visa and Balikbayan Visa holders are required by the Bureau of Immigration (BI) to apply for a Special Study Permit (SSP).</li>
                                <li>PCIS will provide assistance in the processing of the SSP once the applicant is confirmed for enrollment. For questions/clarification, you may email executive.assistane@pcis.edu.ph.</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </section>

            <!-- 3. ADMISSION PROCESS -->
            <section>
                <h3 class="text-[#00539C] font-bold text-lg uppercase tracking-wide mb-6 border-b border-gray-100 pb-2">3. Admission Process for NEW Students</h3>
                
                <div class="space-y-6">
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Step 1: Inquiry and Orientation</h4>
                        <p class="text-xs mt-1">Families may inquire through phone, email, or onsite. The school may require an orientation to explain programs, policies, and expectations.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Step 2: Online Application</h4>
                        <p class="text-xs mt-1">Fill out and submit the online application form via the PCIS Portal.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Step 3: Submission of Requirements</h4>
                        <ul class="list-disc pl-5 mt-1 text-xs space-y-1">
                            <li>Download the following PCIS forms from the portal:
                                <ol class="list-decimal pl-5 mt-1">
                                    <li>Application Confirmation Slip</li>
                                    <li>Withdrawal Policy</li>
                                    <li>Data Privacy Statement Consent Form</li>
                                    <li>Declaration of Student’s Pre-existing Condition(s) Prior to Admission</li>
                                    <li>For SEN students, download the Recommendation Form from the Portal and send it to your child’s form tutor/class adviser, who knows your child well enough to complete the form and fill out the necessary information.</li>
                                </ol>
                            </li>
                            <li>Please upload the completed PCIS forms and all other application requirements to the Portal. Applicants must submit all required documents before evaluation. Only applicants who have the complete application requirements will be scheduled for an entrance exam.</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Step 4: Assessment and Interview</h4>
                        <ul class="list-disc pl-5 mt-1 text-xs space-y-1">
                            <li>Depending on the grade level, the school may conduct:
                                <ol class="list-decimal pl-5">
                                    <li>Academic assessment</li>
                                    <li>Readiness test</li>
                                    <li>Parent or student interview</li>
                                </ol>
                            </li>
                            <li>These help determine appropriate placement and support needs.</li>
                            <li>Results will be emailed to the parent’s or guardian’s email address after 3 days.</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Step 4: Evaluation</h4>
                        <p class="text-xs mt-1">The Admissions Committee reviews the applicant’s documents, assessment results, and interview notes to determine eligibility.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Step 5: Reservation and Enrollment</h4>
                        <p class="text-xs mt-1">Once accepted, families must pay the reservation fee to secure the student’s slot. Enrollment is confirmed only after full submission of requirements and payment of enrollment fees.</p>
                    </div>
                </div>
            </section>

            <!-- 4. OTHER POLICIES -->
            <section>
                <h3 class="text-[#00539C] font-bold text-lg uppercase tracking-wide mb-4 border-b border-gray-100 pb-2">Other Policies</h3>
                <div class="space-y-4 text-xs">
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">4. Acceptance and Placement</h5>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Acceptance is based on the applicant’s readiness, available slots, and the school’s ability to support the student’s needs.</li>
                            <li>Grade placement follows DepEd guidelines and the school’s academic standards.</li>
                            <li>The school reserves the right to decline applications when classes are full or when the school cannot adequately support the student’s needs.</li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">5. Waitlisting</h5>
                        <p>If a grade level is full:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Qualified applicants may be placed on a waitlist.</li>
                            <li>Waitlisted families will be contacted if a slot becomes available.</li>
                            <li>Waitlist status does not guarantee admission.</li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">6. Non‑Discrimination</h5>
                        <p>The school does not discriminate based on gender, religion, nationality, or socioeconomic background. All applicants are evaluated fairly and consistently.</p>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">7. Reservation Fee Policy</h5>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>A non‑refundable Reservation Fee is required to secure a slot.</li>
                            <li>Failure to pay by the deadline may result in the slot being offered to another applicant.</li>
                            <li>The fee is deductible from tuition upon full enrollment.</li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">8. Withdrawal or Cancellation</h5>
                        <p>If a family decides not to proceed with enrollment:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>The Reservation Fee is forfeited.</li>
                            <li>Any refund of tuition or other fees follows the school’s Refund Policy.</li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">9. Confidentiality</h5>
                        <p>All application documents and assessment results are treated with strict confidentiality and used solely for admission and placement purposes.</p>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 mb-1 text-sm">10. Policy Review</h5>
                        <p>The school may revise this policy as needed to align with updated regulations, enrollment trends, or institutional goals.</p>
                    </div>
                </div>
            </section>

        </div>

        <!-- FOOTER ACTION -->
        <div class="p-6 md:p-8 border-t border-gray-100 bg-gray-50 flex justify-between items-center shrink-0">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-slate-400 hover:text-red-500 font-bold text-sm transition uppercase tracking-wider">Decline & Logout</button>
            </form>
            
            <a href="{{ route('applicant.dashboard') }}" class="bg-[#00539C] text-white px-8 py-3.5 rounded-xl font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-500/30 flex items-center gap-2 transform hover:-translate-y-0.5">
                I Have Read & Agree
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

    </div>
</div>

@endsection