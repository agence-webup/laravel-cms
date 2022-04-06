<?php

namespace Webup\CMS\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use Webup\CMS\Models\CmsEntry;

class Content extends Component
{
    /**
     * The CMS Entry key.
     *
     * @var string
     */
    public $key;

    /**
     * Create the CMS component instance.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|String
     */
    public function render()
    {
        $fullKey = sprintf('%s.%s', $this->key, App::currentLocale());
        $entry = CmsEntry::query()->where('key', $fullKey)->first();

        return view('cms::components.cms', compact('entry'));
    }
}
