@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comuni.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comunis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.id') }}
                        </th>
                        <td>
                            {{ $comuni->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.nome') }}
                        </th>
                        <td>
                            {{ $comuni->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.cap') }}
                        </th>
                        <td>
                            {{ $comuni->cap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.prefisso') }}
                        </th>
                        <td>
                            {{ $comuni->prefisso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.provincia') }}
                        </th>
                        <td>
                            {{ $comuni->provincia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.prov') }}
                        </th>
                        <td>
                            {{ $comuni->prov->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuni.fields.stato') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $comuni->stato ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comunis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection