<?php

namespace Webup\CMS\Http\Controllers;

use Exception;
use Webup\CMS\Http\Requests\CmsRequest;
use Webup\CMS\Jobs\UpsertCms;

class CmsController extends Controller
{
    public function upsert(CmsRequest $request)
    {
        try {
            $data = $request->validated();
            $entry = dispatch_sync(new UpsertCms($data));
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'key' => $entry->key,
                'content' => $entry->content
            ]
            ]);
    }
}
