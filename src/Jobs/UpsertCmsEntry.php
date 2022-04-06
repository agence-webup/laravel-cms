<?php

namespace Webup\CMS\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Webup\CMS\Models\CmsEntry;

class UpsertCmsEntry implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var array */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $key = sprintf(
            "%s.%s",
            Arr::get($this->data, 'key'),
            App::currentLocale()
        );

        $entry = CmsEntry::updateOrCreate([
            'key' => $key
        ], [
            'content' => Arr::get($this->data, 'content', '')
        ]);

        return $entry;
    }
}
