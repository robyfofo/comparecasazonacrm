@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.richiestum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.richiesta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.id') }}
                        </th>
                        <td>
                            {{ $richiestum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.agente') }}
                        </th>
                        <td>
                            {{ $richiestum->agente->telefono ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.agenzia') }}
                        </th>
                        <td>
                            {{ $richiestum->agenzia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.cliente') }}
                        </th>
                        <td>
                            {{ $richiestum->cliente->ruolo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.contratto') }}
                        </th>
                        <td>
                            {{ $richiestum->contratto->contratto ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.provincia') }}
                        </th>
                        <td>
                            {{ $richiestum->provincia->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.comune') }}
                        </th>
                        <td>
                            {{ $richiestum->comune->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.garage') }}
                        </th>
                        <td>
                            {{ $richiestum->garage->garage ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.prezzo') }}
                        </th>
                        <td>
                            {{ $richiestum->prezzo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.tipologia_immobile') }}
                        </th>
                        <td>
                            {{ $richiestum->tipologia_immobile->insieme ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.tipologia_immobile_2') }}
                        </th>
                        <td>
                            {{ $richiestum->tipologia_immobile_2->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.tipologia_immobile_3') }}
                        </th>
                        <td>
                            {{ $richiestum->tipologia_immobile_3->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.tipologia_immobile_4') }}
                        </th>
                        <td>
                            {{ $richiestum->tipologia_immobile_4->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.comune_2') }}
                        </th>
                        <td>
                            {{ $richiestum->comune_2->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.comune_3') }}
                        </th>
                        <td>
                            {{ $richiestum->comune_3->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.comune_4') }}
                        </th>
                        <td>
                            {{ $richiestum->comune_4->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.comune_5') }}
                        </th>
                        <td>
                            {{ $richiestum->comune_5->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.comune_6') }}
                        </th>
                        <td>
                            {{ $richiestum->comune_6->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.priorita') }}
                        </th>
                        <td>
                            {{ App\Richiestum::PRIORITA_SELECT[$richiestum->priorita] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.destinazione') }}
                        </th>
                        <td>
                            {{ App\Richiestum::DESTINAZIONE_SELECT[$richiestum->destinazione] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.stato_ids') }}
                        </th>
                        <td>
                            {{ $richiestum->stato_ids }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.piano_ids') }}
                        </th>
                        <td>
                            {{ $richiestum->piano_ids }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.piano') }}
                        </th>
                        <td>
                            {{ $richiestum->piano }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.uso') }}
                        </th>
                        <td>
                            {{ $richiestum->uso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.contesto') }}
                        </th>
                        <td>
                            {{ $richiestum->contesto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.cucina') }}
                        </th>
                        <td>
                            {{ App\Richiestum::CUCINA_SELECT[$richiestum->cucina] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.camere') }}
                        </th>
                        <td>
                            {{ $richiestum->camere }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.servizi') }}
                        </th>
                        <td>
                            {{ $richiestum->servizi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.mq') }}
                        </th>
                        <td>
                            {{ $richiestum->mq }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.giardino') }}
                        </th>
                        <td>
                            {{ App\Richiestum::GIARDINO_SELECT[$richiestum->giardino] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.terrazza') }}
                        </th>
                        <td>
                            {{ App\Richiestum::TERRAZZA_SELECT[$richiestum->terrazza] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.richiestum.fields.stato') }}
                        </th>
                        <td>
                            {{ App\Richiestum::STATO_SELECT[$richiestum->stato] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.richiesta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection