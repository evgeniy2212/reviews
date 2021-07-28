@component('mail::message')

Hi, this is {{ $name }}.

{!! $message !!}

@component('mail::button', ['url' => route('home')])
    GO to the {{ config('app.name') }}
@endcomponent

With best regards, {{ config('app.name') }}
@endcomponent
