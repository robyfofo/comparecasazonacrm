<?php

namespace App\Http\Requests;

use App\SecretaryProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySecretaryProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('secretary_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:secretary_profiles,id',
        ];
    }
}
