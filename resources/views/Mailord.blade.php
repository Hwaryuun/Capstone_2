
@component('mail::message')
<b> VERIFY THIS EMAIL ADDRESS </b> 

<p>Hi, {{$user->firstname}} !</p>
<p>Welcome to Design Plus !</p>

<p>Please Click the button below to verify your Email Address. If this is not you, or you did not create an account. Do not click the button and contact : designplusco000@gmail.com. </p>

@component('mail::button', ['url' => route('Verify', $user->id)])
Verify Your Email.
@endcomponent

<hr>

<p>Having Trouble ? Use this link : <a href="{{route('Verify', $user->id)}}"> {{route('Verify', $user->id)}} </a> </p>
{{-- 
<p> {{$user->id}} </p>
<p> <a href="{{route('Verify', $user->id)}}">   </a></p> --}}
Thanks, Happy Shopping! <br>
{{-- {{ config('app.name') }} --}}
Design Plus.
@endcomponent
