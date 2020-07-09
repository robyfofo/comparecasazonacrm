<?php

namespace App\Http\Requests;

use App\AppuntamentoTipologie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAppuntamentoTipologieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('appuntamento_tipologie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'nome'    => [
                'max:150',
                'required'],
            'pos'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
            'bgcolor' => [
                'max:20'],
        ];

    }
}
