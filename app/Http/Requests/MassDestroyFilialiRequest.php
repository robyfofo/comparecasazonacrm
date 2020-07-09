<?php

namespace App\Http\Requests;

use App\Filiali;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFilialiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('filiali_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:filialis,id',
        ];
    }
}
