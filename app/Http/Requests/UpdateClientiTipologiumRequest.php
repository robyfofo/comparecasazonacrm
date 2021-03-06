<?php

namespace App\Http\Requests;

use App\ClientiTipologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClientiTipologiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clienti_tipologium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tipologia' => [
                'max:50',
                'required'],
            'stato'     => [
                'required'],
        ];
    }
}
