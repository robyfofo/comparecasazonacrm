@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.immobile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.immobiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.id') }}
                        </th>
                        <td>
                            {{ $immobile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.nome') }}
                        </th>
                        <td>
                            {{ $immobile->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.tipologia') }}
                        </th>
                        <td>
                            {{ App\Immobile::TIPOLOGIA_SELECT[$immobile->tipologia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.cliente') }}
                        </th>
                        <td>
                            {{ $immobile->cliente->ruolo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.agente') }}
                        </th>
                        <td>
                            {{ $immobile->agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.filiale') }}
                        </th>
                        <td>
                            {{ $immobile->filiale->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.tipologia_immobile') }}
                        </th>
                        <td>
                            {{ $immobile->tipologia_immobile->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.provincia') }}
                        </th>
                        <td>
                            {{ $immobile->provincia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.comune') }}
                        </th>
                        <td>
                            {{ $immobile->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.indirizzo') }}
                        </th>
                        <td>
                            {{ $immobile->indirizzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.civico') }}
                        </th>
                        <td>
                            {{ $immobile->civico }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.prezzo') }}
                        </th>
                        <td>
                            {{ $immobile->prezzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.garage') }}
                        </th>
                        <td>
                            {{ $immobile->garage->garage ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mq') }}
                        </th>
                        <td>
                            {{ $immobile->mq }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.cucina') }}
                        </th>
                        <td>
                            {{ App\Immobile::CUCINA_SELECT[$immobile->cucina] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.giardino') }}
                        </th>
                        <td>
                            {{ App\Immobile::GIARDINO_SELECT[$immobile->giardino] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.terrazza') }}
                        </th>
                        <td>
                            {{ App\Immobile::TERRAZZA_SELECT[$immobile->terrazza] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.anno_costruzione') }}
                        </th>
                        <td>
                            {{ $immobile->anno_costruzione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.anno_ristrutturazione') }}
                        </th>
                        <td>
                            {{ $immobile->anno_ristrutturazione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.contesto') }}
                        </th>
                        <td>
                            {{ $immobile->contesto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.camere') }}
                        </th>
                        <td>
                            {{ $immobile->camere }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.vani') }}
                        </th>
                        <td>
                            {{ $immobile->vani }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ripostigli') }}
                        </th>
                        <td>
                            {{ $immobile->ripostigli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.bagni') }}
                        </th>
                        <td>
                            {{ $immobile->bagni }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.balconi') }}
                        </th>
                        <td>
                            {{ $immobile->balconi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.soffitta') }}
                        </th>
                        <td>
                            {{ $immobile->soffitta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.cantina') }}
                        </th>
                        <td>
                            {{ $immobile->cantina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.taverna') }}
                        </th>
                        <td>
                            {{ $immobile->taverna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_sezione') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_sezione }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_foglio') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_foglio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_mappale') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_mappale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_sub') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_sub }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_zona') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_zona }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_categoria') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_categoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_classe') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_classe }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_consvani') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_consvani }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_superficie') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_superficie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_rendita') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_rendita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.catasto_codcomune') }}
                        </th>
                        <td>
                            {{ $immobile->catasto_codcomune }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.posti_auto') }}
                        </th>
                        <td>
                            {{ $immobile->posti_auto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.imp_satellite') }}
                        </th>
                        <td>
                            {{ $immobile->imp_satellite }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.imp_aria') }}
                        </th>
                        <td>
                            {{ $immobile->imp_aria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.imp_allarme') }}
                        </th>
                        <td>
                            {{ $immobile->imp_allarme }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.riscaldamento') }}
                        </th>
                        <td>
                            {{ $immobile->riscaldamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.citofono') }}
                        </th>
                        <td>
                            {{ $immobile->citofono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ascensore') }}
                        </th>
                        <td>
                            {{ $immobile->ascensore }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.pan_solari') }}
                        </th>
                        <td>
                            {{ $immobile->pan_solari }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.loggia') }}
                        </th>
                        <td>
                            {{ $immobile->loggia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.veranda') }}
                        </th>
                        <td>
                            {{ $immobile->veranda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.posto_auto') }}
                        </th>
                        <td>
                            {{ $immobile->posto_auto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.pavimenti') }}
                        </th>
                        <td>
                            {{ $immobile->pavimenti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.infissi') }}
                        </th>
                        <td>
                            {{ $immobile->infissi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.facciata') }}
                        </th>
                        <td>
                            {{ $immobile->facciata }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.fabbricato') }}
                        </th>
                        <td>
                            {{ $immobile->fabbricato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.unita_totali') }}
                        </th>
                        <td>
                            {{ $immobile->unita_totali }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.descrizione_immobile') }}
                        </th>
                        <td>
                            {!! $immobile->descrizione_immobile !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.opere_rinnovi') }}
                        </th>
                        <td>
                            {!! $immobile->opere_rinnovi !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.classe_energetica') }}
                        </th>
                        <td>
                            {{ App\Immobile::CLASSE_ENERGETICA_SELECT[$immobile->classe_energetica] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.piano_ids') }}
                        </th>
                        <td>
                            {{ $immobile->piano_ids }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.piano') }}
                        </th>
                        <td>
                            {{ $immobile->piano }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.foto') }}
                        </th>
                        <td>
                            @foreach($immobile->foto as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.planimetrie') }}
                        </th>
                        <td>
                            @foreach($immobile->planimetrie as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ma_0') }}
                        </th>
                        <td>
                            {{ $immobile->ma_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ma_1') }}
                        </th>
                        <td>
                            {{ $immobile->ma_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ma_2') }}
                        </th>
                        <td>
                            {{ $immobile->ma_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ma_3') }}
                        </th>
                        <td>
                            {{ $immobile->ma_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mb_0') }}
                        </th>
                        <td>
                            {{ $immobile->mb_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mb_1') }}
                        </th>
                        <td>
                            {{ $immobile->mb_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mb_2') }}
                        </th>
                        <td>
                            {{ $immobile->mb_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mb_3') }}
                        </th>
                        <td>
                            {{ $immobile->mb_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mc_0') }}
                        </th>
                        <td>
                            {{ $immobile->mc_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mc_1') }}
                        </th>
                        <td>
                            {{ $immobile->mc_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mc_2') }}
                        </th>
                        <td>
                            {{ $immobile->mc_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mc_3') }}
                        </th>
                        <td>
                            {{ $immobile->mc_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.md_0') }}
                        </th>
                        <td>
                            {{ $immobile->md_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.md_1') }}
                        </th>
                        <td>
                            {{ $immobile->md_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.md_2') }}
                        </th>
                        <td>
                            {{ $immobile->md_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.md_3') }}
                        </th>
                        <td>
                            {{ $immobile->md_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.me_0') }}
                        </th>
                        <td>
                            {{ $immobile->me_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.me_1') }}
                        </th>
                        <td>
                            {{ $immobile->me_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.me_2') }}
                        </th>
                        <td>
                            {{ $immobile->me_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.me_3') }}
                        </th>
                        <td>
                            {{ $immobile->me_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mf_0') }}
                        </th>
                        <td>
                            {{ $immobile->mf_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mf_1') }}
                        </th>
                        <td>
                            {{ $immobile->mf_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mf_2') }}
                        </th>
                        <td>
                            {{ $immobile->mf_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mf_3') }}
                        </th>
                        <td>
                            {{ $immobile->mf_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mg_0') }}
                        </th>
                        <td>
                            {{ $immobile->mg_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mg_1') }}
                        </th>
                        <td>
                            {{ $immobile->mg_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mg_2') }}
                        </th>
                        <td>
                            {{ $immobile->mg_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mg_3') }}
                        </th>
                        <td>
                            {{ $immobile->mg_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mh_0') }}
                        </th>
                        <td>
                            {{ $immobile->mh_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mh_1') }}
                        </th>
                        <td>
                            {{ $immobile->mh_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mh_2') }}
                        </th>
                        <td>
                            {{ $immobile->mh_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mh_3') }}
                        </th>
                        <td>
                            {{ $immobile->mh_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mi_0') }}
                        </th>
                        <td>
                            {{ $immobile->mi_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mi_1') }}
                        </th>
                        <td>
                            {{ $immobile->mi_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mi_2') }}
                        </th>
                        <td>
                            {{ $immobile->mi_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mi_3') }}
                        </th>
                        <td>
                            {{ $immobile->mi_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ml_0') }}
                        </th>
                        <td>
                            {{ $immobile->ml_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ml_1') }}
                        </th>
                        <td>
                            {{ $immobile->ml_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ml_2') }}
                        </th>
                        <td>
                            {{ $immobile->ml_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ml_3') }}
                        </th>
                        <td>
                            {{ $immobile->ml_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mm_0') }}
                        </th>
                        <td>
                            {{ $immobile->mm_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mm_1') }}
                        </th>
                        <td>
                            {{ $immobile->mm_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mm_2') }}
                        </th>
                        <td>
                            {{ $immobile->mm_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mm_3') }}
                        </th>
                        <td>
                            {{ $immobile->mm_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mn_0') }}
                        </th>
                        <td>
                            {{ $immobile->mn_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mn_1') }}
                        </th>
                        <td>
                            {{ $immobile->mn_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mn_2') }}
                        </th>
                        <td>
                            {{ $immobile->mn_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mn_3') }}
                        </th>
                        <td>
                            {{ $immobile->mn_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mo_0') }}
                        </th>
                        <td>
                            {{ $immobile->mo_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mo_1') }}
                        </th>
                        <td>
                            {{ $immobile->mo_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mo_2') }}
                        </th>
                        <td>
                            {{ $immobile->mo_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mo_3') }}
                        </th>
                        <td>
                            {{ $immobile->mo_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mp_0') }}
                        </th>
                        <td>
                            {{ $immobile->mp_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mp_1') }}
                        </th>
                        <td>
                            {{ $immobile->mp_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mp_2') }}
                        </th>
                        <td>
                            {{ $immobile->mp_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mp_3') }}
                        </th>
                        <td>
                            {{ $immobile->mp_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mq_0') }}
                        </th>
                        <td>
                            {{ $immobile->mq_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mq_1') }}
                        </th>
                        <td>
                            {{ $immobile->mq_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mq_2') }}
                        </th>
                        <td>
                            {{ $immobile->mq_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mq_3') }}
                        </th>
                        <td>
                            {{ $immobile->mq_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mr_0') }}
                        </th>
                        <td>
                            {{ $immobile->mr_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mr_1') }}
                        </th>
                        <td>
                            {{ $immobile->mr_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mr_2') }}
                        </th>
                        <td>
                            {{ $immobile->mr_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mr_3') }}
                        </th>
                        <td>
                            {{ $immobile->mr_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ms_0') }}
                        </th>
                        <td>
                            {{ $immobile->ms_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ms_1') }}
                        </th>
                        <td>
                            {{ $immobile->ms_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ms_2') }}
                        </th>
                        <td>
                            {{ $immobile->ms_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.ms_3') }}
                        </th>
                        <td>
                            {{ $immobile->ms_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mt_0') }}
                        </th>
                        <td>
                            {{ $immobile->mt_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mt_1') }}
                        </th>
                        <td>
                            {{ $immobile->mt_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mt_2') }}
                        </th>
                        <td>
                            {{ $immobile->mt_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mt_3') }}
                        </th>
                        <td>
                            {{ $immobile->mt_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mu_0') }}
                        </th>
                        <td>
                            {{ $immobile->mu_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mu_1') }}
                        </th>
                        <td>
                            {{ $immobile->mu_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mu_2') }}
                        </th>
                        <td>
                            {{ $immobile->mu_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mu_3') }}
                        </th>
                        <td>
                            {{ $immobile->mu_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mtotale_01') }}
                        </th>
                        <td>
                            {{ $immobile->mtotale_01 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.immobile.fields.mtotale_02') }}
                        </th>
                        <td>
                            {{ $immobile->mtotale_02 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.immobiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection