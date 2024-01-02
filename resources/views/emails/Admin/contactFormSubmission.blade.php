<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form Submission</title>
</head>
<div style="background-color: #291150;">
    <div style="background-color: #ffffff; margin: auto; width: 75%; padding: 4rem 2rem;">
        <h1 style="color: #291150; font-weight: bold; font-size: 3rem; margin-bottom: 30px; text-align: center;">You have a new contact form submission</h1>
        <ul style="list-style-type: none; padding: 0; margin-bottom: 30px;">
            @if($formSubmission)
                <li style="margin-bottom: 10px;"><strong>Name: </strong> {{ $formSubmission->first_name }} {{ $formSubmission->last_name }}</li>
                <li style="margin-bottom: 10px;"><strong>Email Address: </strong> {{ $formSubmission->email_address }}</li>
                <li style="margin-bottom: 10px;"><strong>Phone Number: </strong> {{ $formSubmission->phone_number }}</li>
                <li style="margin-bottom: 10px;"><strong>Company Name: </strong> {{ $formSubmission->company_name }}</li>
                <li style="margin-bottom: 10px;"><strong>Reason for contacting: </strong> {{ $formSubmission->reason_for_contacting }}</li>
                <li style="margin-bottom: 10px;"><strong>Your Message: </strong> {{ $formSubmission->your_message }}</li>
                <li style="margin-bottom: 10px;"><strong>How did you hear about me: </strong> {{ $formSubmission->how_did_you_hear_about_me }}</li>
            @else
                <li>Form submission data is not available.</li>
            @endif
        </ul>
    </div>
</div>
</html>
