@component('mail::message')

@lang('service/message.mail.hi'), {{ $contact_name }}!

{{ $name }} wants to add you to their contacts so they can chat with you at {{ config('app.name') }}! If you agree, click the button below.

@component('mail::button', ['url' => $url])
    @lang('service/message.mail.agree')
@endcomponent

Thank you.<br>

The Reviews4Results Team.
@endcomponent
