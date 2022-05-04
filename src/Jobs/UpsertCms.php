<?php

namespace Webup\CMS\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Webup\CMS\Models\CmsEntry;

class UpsertCms implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $key = sprintf(
            '%s.%s',
            Arr::get($this->data, 'key'),
            app()->getLocale()
        );

        $entry = CmsEntry::query()
            ->where('key', $key)
            ->first();

        if (!$entry) {
            $entry = new CmsEntry(['key' => $key]);
        }

        $entry->content = Arr::get($this->data, 'content');
        $entry->save();

        return $entry;
    }
}
