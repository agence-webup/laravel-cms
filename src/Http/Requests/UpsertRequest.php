<?php

namespace Webup\CMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $guard = config('cms.guard');

        if (!$guard) {
            return true;
        }

        return auth($guard)->user()->can('cms_entry.upsert');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key'     => 'required|string',
            'content' => "required|string",
        ];
    }
}
