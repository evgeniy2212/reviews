@component('mail::message')

@lang('service/message.mail.hi') {{ $name }}.

{{ config('app.name') }}, inform you that that you have unread chat messages, please check them.

Thank you.<br>

The Reviews4Results Team.
@endcomponent
