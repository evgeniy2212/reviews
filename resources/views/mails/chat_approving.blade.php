@component('mail::message')

@lang('service/message.mail.hi') {{ $contact_name }}.

{{ config('app.name') }}, inform you that {{ $name }} want to include you in his list of contact to chat with you in real time in the future. If you agree click the button below.

@component('mail::button', ['url' => $url])
    @lang('service/message.mail.agree')
@endcomponent

Thank you.<br>

The Reviews4Results Team.
@endcomponent
