<?php

namespace App\Http\Requests;

use App\Comuni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyComuniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('comuni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:comunis,id',
        ];

    }
}
