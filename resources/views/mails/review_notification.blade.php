@component('mail::message')
Hello!

A review about your company was left on the site "{{ config('app.name') }}".
If you want to familiar contact the one who left this review by clicking below.

@component('mail::button', ['url' => $url])
    {{ config('app.name') }}
@endcomponent

Thank you for using our site.

Respectfully

{{ config('app.name') }}
@endcomponent
