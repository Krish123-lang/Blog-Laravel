{{-- @component('mail::message')
    <p>Helo, {{ $user->name }}</p>

    @component('mail::button', ['url' => url('verify/' . $user->remember_token)])
        Verify
    @endcomponent

    <p>In case you have issues please contact our team.</p>
    Thanks <br>
    {{ config('app.name') }}
@endcomponent --}}


@component('mail::message')
    # Hello, {{ $user->name }}

    Click the button below to verify your email.

    @component('mail::button', ['url' => route('auth.verify', $user->remember_token)])
        Verify
    @endcomponent

    If you have any issues, please contact our team.

    Thanks,
    {{ config('app.name') }}
@endcomponent
