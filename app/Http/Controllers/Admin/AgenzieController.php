<?php

namespace App\Http\Controllers\Admin;

use App\AgentProfile;
use App\Agenzie;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgenzieRequest;
use App\Http\Requests\StoreAgenzieRequest;
use App\Http\Requests\UpdateAgenzieRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AgenzieController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agenzie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzies = Agenzie::all();

        return view('admin.agenzies.index', compact('agenzies'));
    }

    public function create()
    {
        abort_if(Gate::denies('agenzie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admins = AgentProfile::all()->pluck('indirizzo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agenzies.create', compact('admins'));
    }

    public function store(StoreAgenzieRequest $request)
    {
        $agenzie = Agenzie::create($request->all());

        if ($request->input('foto_logo', false)) {
            $agenzie->addMedia(storage_path('tmp/uploads/' . $request->input('foto_logo')))->toMediaCollection('foto_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agenzie->id]);
        }

        return redirect()->route('admin.agenzies.index');
    }

    public function edit(Agenzie $agenzie)
    {
        abort_if(Gate::denies('agenzie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admins = AgentProfile::all()->pluck('indirizzo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agenzie->load('admin');

        return view('admin.agenzies.edit', compact('admins', 'agenzie'));
    }

    public function update(UpdateAgenzieRequest $request, Agenzie $agenzie)
    {
        $agenzie->update($request->all());

        if ($request->input('foto_logo', false)) {
            if (!$agenzie->foto_logo || $request->input('foto_logo') !== $agenzie->foto_logo->file_name) {
                $agenzie->addMedia(storage_path('tmp/uploads/' . $request->input('foto_logo')))->toMediaCollection('foto_logo');
            }
        } elseif ($agenzie->foto_logo) {
            $agenzie->foto_logo->delete();
        }

        return redirect()->route('admin.agenzies.index');
    }

    public function show(Agenzie $agenzie)
    {
        abort_if(Gate::denies('agenzie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzie->load('admin');

        return view('admin.agenzies.show', compact('agenzie'));
    }

    public function destroy(Agenzie $agenzie)
    {
        abort_if(Gate::denies('agenzie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenzie->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgenzieRequest $request)
    {
        Agenzie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agenzie_create') && Gate::denies('agenzie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Agenzie();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
