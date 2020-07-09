@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contrattoImmobile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contratto-immobiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contrattoImmobile.fields.id') }}
                        </th>
                        <td>
                            {{ $contrattoImmobile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contrattoImmobile.fields.contratto') }}
                        </th>
                        <td>
                            {{ $contrattoImmobile->contratto }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contratto-immobiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection