<p class="text-justify">
    <h3>Hello, {{ $name }}!</h3>

    <p>Your contract in <b>{{ $unit }}</b> is set to expire on <b>{{ Carbon\Carbon::parse($contract_ends_at)->format('M d Y') }}</b>, exactly <b>{{ $days_before_moveout }} days </b> from now. Would you like to extend your contract?If yes, for how long? </p>

    <p><b>This is a system generated message, and we do not receive emails from this account. Please let us know your response atleast a week before your moveout date through this email {{ Auth::user()->email }} instead. </b></p>

    Sincerely,
    <br>
    {{ Auth::user()->property }}
</p>