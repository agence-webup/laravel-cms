<div x-data="{}"
    x-init="$store.cms.registerElement()">
    <textarea name="{{ $key }}"
              id="{{ $key }}"
              x-show="$store.cms.editing">
    @if ($entry)
    {!! $entry->content !!}
    @else
    {{ $slot }}
    @endif
    </textarea>
</div>
