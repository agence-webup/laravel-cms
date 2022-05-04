@if ($editable)
<div>
    <textarea name="{{ $key }}"
              id="{{ $key }}">
        @if ($entry)
        {!! $entry->content !!}
        @else
        {{ $slot }}
        @endif
    </textarea>
</div>
@else
<div {{ $attributes }}>
    @if ($entry)
    {!! $entry->content !!}
    @else
    {{ $slot }}
    @endif
</div>
@endif
