<?php

namespace Modules\Admin\Validation;

use Illuminate\Foundation\Http\FormRequest;

abstract class Validator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
