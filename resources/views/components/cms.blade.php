<div>
    @if ($entry)
    {!! $entry->content !!}
    @else
    {{ $slot }}
    @endif
</div>
