@component('mail::message')

Hi, my name is {{ $name }}.

Check out this exciting new review site!

@component('mail::button', ['url' => route('home')])
    GO to the {{ config('app.name') }}
@endcomponent

With best regards, {{ config('app.name') }}
@endcomponent
