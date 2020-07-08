<?php

namespace App\Http\Requests;

use App\Richiestum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRichiestumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('richiestum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'agente_id'    => [
                'required',
                'integer'],
            'agenzia_id'   => [
                'required',
                'integer'],
            'contratto_id' => [
                'required',
                'integer'],
            'prezzo'       => [
                'required'],
            'priorita'     => [
                'required'],
            'destinazione' => [
                'required'],
            'stato_ids'    => [
                'max:100'],
            'piano_ids'    => [
                'max:100'],
            'piano'        => [
                'max:255'],
            'uso'          => [
                'max:255'],
            'contesto'     => [
                'max:255'],
            'camere'       => [
                'max:100'],
            'servizi'      => [
                'max:100'],
            'mq'           => [
                'max:100'],
            'stato'        => [
                'required'],
        ];

    }
}
