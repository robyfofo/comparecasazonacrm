@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agenzie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agenzies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agenzie.fields.id') }}
                        </th>
                        <td>
                            {{ $agenzie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenzie.fields.nome') }}
                        </th>
                        <td>
                            {{ $agenzie->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenzie.fields.foto_logo') }}
                        </th>
                        <td>
                            @if($agenzie->foto_logo)
                                <a href="{{ $agenzie->foto_logo->getUrl() }}" target="_blank">
                                    <img src="{{ $agenzie->foto_logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenzie.fields.admin') }}
                        </th>
                        <td>
                            {{ $agenzie->admin->indirizzo ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agenzies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection