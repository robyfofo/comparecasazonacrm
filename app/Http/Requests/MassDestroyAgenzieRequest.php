<?php

namespace App\Http\Requests;

use App\Agenzie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAgenzieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agenzie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:agenzies,id',
        ];
    }
}
