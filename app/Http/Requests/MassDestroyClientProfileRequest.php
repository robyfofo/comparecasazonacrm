<?php

namespace App\Http\Requests;

use App\ClientProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:client_profiles,id',
        ];
    }
}
