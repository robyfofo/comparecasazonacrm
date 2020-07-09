<?php

namespace App\Http\Requests;

use App\Comuni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateComuniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('comuni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
        ];

    }
}
