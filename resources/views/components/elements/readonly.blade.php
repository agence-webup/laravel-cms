<div {{ $attributes }}>
    @if ($entry)
    {!! $entry->content !!}
    @else
    {{ $slot }}
    @endif
</div>
