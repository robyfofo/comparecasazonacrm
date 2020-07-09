<?php

namespace App\Http\Requests;

use App\Immobile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateImmobileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('immobile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'nome'                  => [
                'max:150',
                'required'],
            'tipologia'             => [
                'required'],
            'cliente_id'            => [
                'required',
                'integer'],
            'agente_id'             => [
                'required',
                'integer'],
            'filiale_id'            => [
                'required',
                'integer'],
            'tipologia_immobile_id' => [
                'required',
                'integer'],
            'provincia_id'          => [
                'required',
                'integer'],
            'comune_id'             => [
                'required',
                'integer'],
            'indirizzo'             => [
                'max:100'],
            'civico'                => [
                'max:20'],
            'mq'                    => [
                'max:50'],
            'anno_costruzione'      => [
                'max:50'],
            'anno_ristrutturazione' => [
                'max:50'],
            'contesto'              => [
                'max:150'],
            'camere'                => [
                'max:50'],
            'vani'                  => [
                'max:50'],
            'ripostigli'            => [
                'max:50'],
            'bagni'                 => [
                'max:50'],
            'balconi'               => [
                'max:50'],
            'soffitta'              => [
                'max:50'],
            'cantina'               => [
                'max:50'],
            'taverna'               => [
                'max:50'],
            'catasto_sezione'       => [
                'max:50'],
            'catasto_foglio'        => [
                'max:50'],
            'catasto_mappale'       => [
                'max:50'],
            'catasto_sub'           => [
                'max:50'],
            'catasto_zona'          => [
                'max:50'],
            'catasto_categoria'     => [
                'max:50'],
            'catasto_classe'        => [
                'max:50'],
            'catasto_consvani'      => [
                'max:50'],
            'catasto_superficie'    => [
                'max:50'],
            'catasto_rendita'       => [
                'max:50'],
            'catasto_codcomune'     => [
                'max:50'],
            'posti_auto'            => [
                'max:50'],
            'imp_satellite'         => [
                'max:50'],
            'imp_aria'              => [
                'max:50'],
            'imp_allarme'           => [
                'max:50'],
            'riscaldamento'         => [
                'max:50'],
            'citofono'              => [
                'max:50'],
            'ascensore'             => [
                'max:50'],
            'pan_solari'            => [
                'max:255'],
            'loggia'                => [
                'max:255'],
            'veranda'               => [
                'max:255'],
            'posto_auto'            => [
                'max:255'],
            'pavimenti'             => [
                'max:255'],
            'infissi'               => [
                'max:255'],
            'facciata'              => [
                'max:255'],
            'fabbricato'            => [
                'max:255'],
            'unita_totali'          => [
                'max:255'],
            'piano_ids'             => [
                'max:50'],
            'piano'                 => [
                'max:255'],
            'ma_0'                  => [
                'max:50'],
            'ma_1'                  => [
                'max:50'],
            'ma_2'                  => [
                'max:50'],
            'ma_3'                  => [
                'max:50'],
            'mb_0'                  => [
                'max:50'],
            'mb_1'                  => [
                'max:50'],
            'mb_2'                  => [
                'max:50'],
            'mb_3'                  => [
                'max:50'],
            'mc_0'                  => [
                'max:50'],
            'mc_1'                  => [
                'max:50'],
            'mc_2'                  => [
                'max:50'],
            'mc_3'                  => [
                'max:50'],
            'md_0'                  => [
                'max:50'],
            'md_1'                  => [
                'max:50'],
            'md_2'                  => [
                'max:50'],
            'md_3'                  => [
                'max:50'],
            'me_0'                  => [
                'max:50'],
            'me_1'                  => [
                'max:50'],
            'me_2'                  => [
                'max:50'],
            'me_3'                  => [
                'max:50'],
            'mf_0'                  => [
                'max:50'],
            'mf_1'                  => [
                'max:50'],
            'mf_2'                  => [
                'max:50'],
            'mf_3'                  => [
                'max:50'],
            'mg_0'                  => [
                'max:50'],
            'mg_1'                  => [
                'max:50'],
            'mg_2'                  => [
                'max:50'],
            'mg_3'                  => [
                'max:50'],
            'mh_0'                  => [
                'max:50'],
            'mh_1'                  => [
                'max:50'],
            'mh_2'                  => [
                'max:50'],
            'mh_3'                  => [
                'max:50'],
            'mi_0'                  => [
                'max:50'],
            'mi_1'                  => [
                'max:50'],
            'mi_2'                  => [
                'max:50'],
            'mi_3'                  => [
                'max:50'],
            'ml_0'                  => [
                'max:50'],
            'ml_1'                  => [
                'max:50'],
            'ml_2'                  => [
                'max:50'],
            'ml_3'                  => [
                'max:50'],
            'mm_0'                  => [
                'max:50'],
            'mm_1'                  => [
                'max:50'],
            'mm_2'                  => [
                'max:50'],
            'mm_3'                  => [
                'max:50'],
            'mn_0'                  => [
                'max:50'],
            'mn_1'                  => [
                'max:50'],
            'mn_2'                  => [
                'max:50'],
            'mn_3'                  => [
                'max:50'],
            'mo_0'                  => [
                'max:50'],
            'mo_1'                  => [
                'max:50'],
            'mo_2'                  => [
                'max:50'],
            'mo_3'                  => [
                'max:50'],
            'mp_0'                  => [
                'max:50'],
            'mp_1'                  => [
                'max:50'],
            'mp_2'                  => [
                'max:50'],
            'mp_3'                  => [
                'max:50'],
            'mq_0'                  => [
                'max:50'],
            'mq_1'                  => [
                'max:50'],
            'mq_2'                  => [
                'max:50'],
            'mq_3'                  => [
                'max:50'],
            'mr_0'                  => [
                'max:50'],
            'mr_1'                  => [
                'max:50'],
            'mr_2'                  => [
                'max:50'],
            'mr_3'                  => [
                'max:50'],
            'ms_0'                  => [
                'max:50'],
            'ms_1'                  => [
                'max:50'],
            'ms_2'                  => [
                'max:50'],
            'ms_3'                  => [
                'max:50'],
            'mt_0'                  => [
                'max:50'],
            'mt_1'                  => [
                'max:50'],
            'mt_2'                  => [
                'max:50'],
            'mt_3'                  => [
                'max:50'],
            'mu_0'                  => [
                'max:50'],
            'mu_1'                  => [
                'max:50'],
            'mu_2'                  => [
                'max:50'],
            'mu_3'                  => [
                'max:50'],
            'mtotale_01'            => [
                'max:50'],
            'mtotale_02'            => [
                'max:50'],
        ];

    }
}
