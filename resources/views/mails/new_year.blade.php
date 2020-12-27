@component('mail::message')

@component('mail::button', ['url' => route('home')])
GO
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
