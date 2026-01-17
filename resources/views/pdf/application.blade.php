<!DOCTYPE html>
<html>
<head>
    <title>Student Application Form</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 12px; color: #333; line-height: 1.4; }
        
        /* BRANDING */
        .header { width: 100%; border-bottom: 2px solid #002855; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { width: 80px; float: left; }
        .school-info { float: left; margin-left: 20px; margin-top: 10px; }
        .school-name { font-size: 24px; font-weight: bold; color: #002855; text-transform: uppercase; }
        .school-sub { font-size: 10px; color: #666; letter-spacing: 2px; text-transform: uppercase; }
        .meta { float: right; text-align: right; margin-top: 15px; }
        .ref-no { font-size: 14px; font-weight: bold; color: #D72638; }
        
        /* CLEARFIX */
        .clearfix::after { content: ""; clear: both; display: table; }

        /* SECTION HEADERS */
        .section-title { 
            background-color: #002855; 
            color: white; 
            padding: 5px 10px; 
            font-weight: bold; 
            text-transform: uppercase; 
            font-size: 11px; 
            margin-top: 20px; 
            margin-bottom: 10px;
        }

        /* DATA TABLES */
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        td { vertical-align: top; padding: 4px 0; }
        .label { color: #777; font-size: 10px; text-transform: uppercase; width: 30%; }
        .value { font-weight: bold; color: #000; width: 70%; border-bottom: 1px solid #eee; }

        /* WATERMARK */
        .watermark {
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
            opacity: 0.05; z-index: -1000; width: 500px;
        }

        /* FOOTER */
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 9px; color: #aaa; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>

    <!-- WATERMARK LOGO -->
    <img src="{{ public_path('images/logo.png') }}" class="watermark">

    <!-- HEADER -->
    <div class="header clearfix">
        <img src="{{ public_path('images/logo.png') }}" class="logo">
        <div class="school-info">
            <div class="school-name">M7 PCIS</div>
            <div class="school-sub">Philippine Cambridge International School</div>
        </div>
        <div class="meta">
            <div class="ref-no">{{ $student->reference_no }}</div>
            <div>Date: {{ $student->created_at->format('M d, Y') }}</div>
            <div>Status: <span style="text-transform:uppercase;">{{ $student->status }}</span></div>
        </div>
    </div>

    <!-- 1. STUDENT INFORMATION -->
    <div class="section-title">Student Profile</div>
    <table>
        <tr>
            <td class="label">Full Name</td>
            <td class="value">{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}</td>
        </tr>
        <tr>
            <td class="label">Grade Level</td>
            <td class="value">{{ $student->grade_level }} ({{ $student->applicant_type }})</td>
        </tr>
        <tr>
            <td class="label">LRN / Student ID</td>
            <td class="value">{{ $student->lrn ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">Birth Details</td>
            <td class="value">{{ $student->birth_date }} | {{ $student->gender }} | {{ $student->citizenship }}</td>
        </tr>
        <tr>
            <td class="label">Address</td>
            <td class="value">{{ $student->address }}</td>
        </tr>
    </table>

    <!-- 2. FAMILY BACKGROUND -->
    <div class="section-title">Family Background</div>
    <table style="width: 100%;">
        <tr>
            <!-- FATHER -->
            <td style="width: 50%; padding-right: 10px;">
                <div style="font-weight:bold; color:#002855; margin-bottom:5px;">FATHER</div>
                <table>
                    <tr><td class="label">Name:</td><td class="value">{{ $student->father_details['name'] ?? 'N/A' }}</td></tr>
                    <tr><td class="label">Contact:</td><td class="value">{{ $student->father_details['mobile'] ?? '' }}</td></tr>
                    <tr><td class="label">Occupation:</td><td class="value">{{ $student->father_details['occupation'] ?? '' }}</td></tr>
                    <tr><td class="label">Company:</td><td class="value">{{ $student->father_details['company'] ?? '' }}</td></tr>
                </table>
            </td>
            <!-- MOTHER -->
            <td style="width: 50%; padding-left: 10px;">
                <div style="font-weight:bold; color:#D72638; margin-bottom:5px;">MOTHER</div>
                <table>
                    <tr><td class="label">Name:</td><td class="value">{{ $student->mother_details['name'] ?? 'N/A' }}</td></tr>
                    <tr><td class="label">Contact:</td><td class="value">{{ $student->mother_details['mobile'] ?? '' }}</td></tr>
                    <tr><td class="label">Occupation:</td><td class="value">{{ $student->mother_details['occupation'] ?? '' }}</td></tr>
                    <tr><td class="label">Company:</td><td class="value">{{ $student->mother_details['company'] ?? '' }}</td></tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- 3. ACADEMIC HISTORY -->
    <div class="section-title">Academic History</div>
    @php
        $academics = is_string($student->academic_history) ? json_decode($student->academic_history, true) : ($student->academic_history ?? []);
    @endphp
    @if(!empty($academics))
        <table border="1" cellpadding="5" style="border: 1px solid #ddd; border-collapse: collapse;">
            <tr style="background:#f9f9f9;">
                <th>School Name</th>
                <th>Year</th>
                <th>Level</th>
                <th>Awards</th>
            </tr>
            @foreach($academics as $school)
            <tr>
                <td>{{ $school['name'] ?? '' }}</td>
                <td>{{ $school['year'] ?? '' }}</td>
                <td>{{ $school['level'] ?? '' }}</td>
                <td>{{ $school['awards'] ?? '' }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p style="color:#999; font-style:italic;">No academic history provided.</p>
    @endif

    <!-- 4. HEALTH & ADDITIONAL -->
    <div class="section-title">Additional Information</div>
    <table>
        <tr>
            <td class="label">Health Conditions</td>
            <td class="value">{{ $student->health_conditions ?? 'None' }}</td>
        </tr>
        <tr>
            <td class="label">Disciplinary History</td>
            <td class="value">{{ $student->disciplinary_history ?? 'None' }}</td>
        </tr>
        <tr>
            <td class="label">Referral Source</td>
            <td class="value">{{ $student->referral_source ?? 'N/A' }}</td>
        </tr>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Generated by M7 PCIS System on {{ now()->format('F j, Y h:i A') }} <br>
        This document is confidential and for official use only.
    </div>

</body>
</html>