<p>
    @if ($timeUntil != 'open')
     {{ 'the store will open again on ' . $nextOpen->format('l') . ' at ' . $nextOpen->format('H:i') }}
    @endif

    {{ $timeUntil }}
</p>
