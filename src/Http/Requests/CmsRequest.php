<?php

namespace Webup\CMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsRequest extends FormRequest
{
    public function authorize()
    {
        if (!config('cms.guard.enabled')) {
            return true;
        }

        $user = auth(config('cms.guard.name'))->user();
        if (!$user) {
            return false;
        }

        if (!config('cms.permission.enabled')) {
            return true;
        }

        return $user->can(config('cms.permission.name'));
    }

    public function rules()
    {
        return [
            'key' => 'required',
            'content' => 'required',
        ];
    }
}
