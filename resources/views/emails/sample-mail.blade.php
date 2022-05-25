@component('mail::message')
# Introduction

The body of your message.
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent