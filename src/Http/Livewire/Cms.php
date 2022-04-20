<?php

namespace Webup\CMS\Http\Livewire;

use Livewire\Component;
use Webup\CMS\Models\CmsEntry;

class Cms extends Component
{
    public $slot;
    public $cmsKey;
    public $entry;
    public $content;

    public function mount($cmsKey, $entry, $slot)
    {
        $this->fill(compact('cmsKey', 'entry', 'slot'));

        if ($this->entry) {
            $this->content = $this->entry->content;
        } else {
            $this->content = $this->slot;
        }
    }

    public function save()
    {
        if ($this->entry) {
            $this->entry->content = $this->content;
        } else {
            $this->entry = new CmsEntry([
                'key' => $this->cmsKey,
                'content' => $this->content
            ]);
        }
        $this->entry->save();
    }

    public function render()
    {
        return view('cms::livewire.cms');
    }
}
