<?php

namespace Webup\CMS\View\Components;

use Illuminate\View\Component;
use Webup\CMS\Models\CmsEntry;

class Content extends Component
{
    public $key;
    public $entry;
    public $editable;

    public function __construct($key)
    {
        $this->key = sprintf(
            '%s.%s',
            $key,
            app()->getLocale()
        );

        $this->entry = CmsEntry::query()
            ->where('key', $this->key)
            ->first();

        $this->editable = auth(config('cms.guard'))->check();
    }

    public function render()
    {
        return view('cms::components.content');
    }
}
