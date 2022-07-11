@component('mail::message')
# {{  $line}}
You are Successfully Registered Now!
@component('mail::button', ['url' => ''])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
