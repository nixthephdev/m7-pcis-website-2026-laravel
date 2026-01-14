<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { background-color: #00539C; padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: bold; }
        .content { padding: 40px; color: #333333; line-height: 1.6; }
        .details { background-color: #f9f9f9; padding: 20px; border-radius: 6px; margin: 20px 0; border-left: 4px solid #F4A300; }
        .footer { background-color: #eeeeee; padding: 20px; text-align: center; font-size: 12px; color: #777777; }
        .btn { display: inline-block; background-color: #D72638; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Application Received</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Dear Mr./Ms. <strong>{{ $enrollment->last_name }}</strong>,</p>
            
            <p>Thank you for choosing M7 Philippine Cambridge International School. We have successfully received your application for the upcoming School Year.</p>
            
            <div class="details">
                <!-- Add this line at the top of the details box -->
                <p><strong>Reference No:</strong> <span style="color: #D72638; font-size: 16px;">{{ $enrollment->reference_no }}</span></p>
                <p><strong>Student Name:</strong> {{ $enrollment->first_name }} {{ $enrollment->last_name }}</p>
                <p><strong>Grade Level:</strong> {{ $enrollment->grade_level }}</p>
                <p><strong>Date Applied:</strong> {{ $enrollment->created_at->format('F d, Y') }}</p>
            </div>

            <p>Our Admissions Committee is currently reviewing your details. We will contact you shortly regarding the schedule for the assessment and interview.</p>

            <a href="#" class="btn">Visit Website</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} M7 Philippine Cambridge International School.<br>
            Km. 25 Gen. Aguinaldo Highway, Anabu II-D, Imus, Cavite
        </div>
    </div>
</body>
</html>