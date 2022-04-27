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


        if (!config('cms.guard.enabled', false)) {
            $this->editable = false;
            return;
        }

        $guard = config('cms.guard.name');
        $this->editable = auth($guard)->check();

        if ($this->editable && config('cms.permission.enabled', false)) {
            $this->editable = auth($guard)->user()->can(config('cms.permission.name'));
        }
    }

    public function render()
    {
        return view('cms::components.content');
    }
}
