@component('mail::message')
    # Hello, {{ $user->name }}

    Click the button below to verify your email.

    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Reset your password
    @endcomponent

    <p>In case you have any issue recovering your password, please contact us.</p>

    Thanks,
    {{ config('app.name') }}
@endcomponent
