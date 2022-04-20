@if ($editable)
<livewire:cms :slot="$slot->toHtml()"
              :entry="$entry"
              :cms-key="$key" />
@include('cms::components.elements.overlay')
@include('cms::components.elements.store')
@include('cms::components.elements.css')
@else
@include('cms::components.elements.readonly')
@endif
