<?php

namespace App\Http\Requests;

use App\CalTagAppuntamentoAgenti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCalTagAppuntamentoAgentiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cal_tag_appuntamento_agenti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'label'           => [
                'required'],
            'appuntamento_id' => [
                'required',
                'integer'],
            'agente_id'       => [
                'required',
                'integer'],
            'data_ora'        => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format')],
        ];

    }
}
