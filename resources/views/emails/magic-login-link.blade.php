@component('mail::message')
Hi {{ $wizkid->name }}!

Please click the button below to finish logging in to your account.
@component('mail::button', ['url' => $url])
Click to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
