@component('mail::message')
# Introduction

The body of your message.

<p>Your code : {{ $data->account_code }}</p>

@component('mail::button', ['url' => route('show-account',$data->id)])
View Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
