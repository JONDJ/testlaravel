@component('mail::message')
{{$mailData['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
