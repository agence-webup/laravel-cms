<?php

namespace Webup\CMS\Http\Controllers;

use Exception;
use Webup\CMS\Http\Requests\UpsertRequest;
use Webup\CMS\Jobs\UpsertCmsEntry;

class CmsController extends Controller
{
    public function upsert(UpsertRequest $request)
    {
        try {
            $data = $request->validated();
            dispatch_sync(new UpsertCmsEntry($data));
        } catch (Exception $th) {
            return redirect()->back(); // TODO @val: with errors
        }

        return redirect()->back();
    }
}
