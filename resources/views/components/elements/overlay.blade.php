@once
@push('cms-overlay')
<div x-data="{}">
    <div x-show="!$store.cms.editing" x-on:click="$store.cms.toggleEditing()">
        (edit icon)
    </div>
    <div x-show="$store.cms.editing" x-on:click="$store.cms.toggleEditing()">
        <b>Edition en cours</b>
        <br>
        <span x-text="$store.cms.elementCount"></span> éléments.
    </div>
</div>
@endPush
@endonce
