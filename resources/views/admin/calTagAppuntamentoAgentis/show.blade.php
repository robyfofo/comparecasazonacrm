@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.calTagAppuntamentoAgenti.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cal-tag-appuntamento-agentis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.id') }}
                        </th>
                        <td>
                            {{ $calTagAppuntamentoAgenti->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.label') }}
                        </th>
                        <td>
                            {!! $calTagAppuntamentoAgenti->label !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.appuntamento') }}
                        </th>
                        <td>
                            {{ $calTagAppuntamentoAgenti->appuntamento->data_ora ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.agente') }}
                        </th>
                        <td>
                            {{ $calTagAppuntamentoAgenti->agente->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calTagAppuntamentoAgenti.fields.data_ora') }}
                        </th>
                        <td>
                            {{ $calTagAppuntamentoAgenti->data_ora }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cal-tag-appuntamento-agentis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection