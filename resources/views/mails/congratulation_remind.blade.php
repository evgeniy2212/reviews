@component('mail::message')
Hi {{ $user }},

{{ config('app.name') }} reminds you that {{ $date }} &quot;{{ $name }}&quot; has a significant &quot;{{ $date_type }}&quot;, we remind you of this just as you wanted it. Please take this reminder for your attention.

Thank you for staying with us.

With best regards, {{ config('app.name') }}
@endcomponent
