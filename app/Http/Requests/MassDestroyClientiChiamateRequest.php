<?php

namespace App\Http\Requests;

use App\ClientiChiamate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientiChiamateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clienti_chiamate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clienti_chiamates,id',
        ];
    }
}
