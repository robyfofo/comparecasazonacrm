<?php

namespace App\Http\Requests;

use App\StatoImmobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreStatoImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stato_immobile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'stato' => [
                'max:50',
                'required'],
        ];
    }
}
