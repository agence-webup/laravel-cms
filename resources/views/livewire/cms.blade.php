<div x-data="{}"
     x-init="$store.cms.registerElement($el)"
     x-on:cmssave="$wire.save()">
    <textarea name="{{ $cmsKey }}"
              id="{{ $cmsKey }}"
              wire:model="content"
              x-show="$store.cms.editing">
    </textarea>
</div>
