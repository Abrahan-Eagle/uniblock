<!DOCTYPE html>
<html>
<head>
    <title>Real Programmer</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Thank you</p>
</body>
</html>


@component('mail::message')
# Introduction
        <b>name</b> {{ $data['name'] }}
        <b>subject</b> {{ $data['subject'] }}
        <b>email</b> {{ $data['email'] }}
        <b>message</b> {{ $data['message'] }}
        
The body of your message.

@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply to {{ $data['name'] }}
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
