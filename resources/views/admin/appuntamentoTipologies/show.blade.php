@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appuntamentoTipologie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.appuntamento-tipologies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.id') }}
                        </th>
                        <td>
                            {{ $appuntamentoTipologie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.nome') }}
                        </th>
                        <td>
                            {{ $appuntamentoTipologie->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.pos') }}
                        </th>
                        <td>
                            {{ $appuntamentoTipologie->pos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appuntamentoTipologie.fields.bgcolor') }}
                        </th>
                        <td>
                            {{ $appuntamentoTipologie->bgcolor }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.appuntamento-tipologies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection