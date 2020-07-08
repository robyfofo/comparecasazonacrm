<?php

namespace App\Http\Requests;

use App\Agenzie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAgenzieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agenzie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nome'     => [
                'max:100',
                'required'],
            'admin_id' => [
                'required',
                'integer'],
        ];
    }
}
