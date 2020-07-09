<?php

namespace App\Http\Controllers\Admin;

use App\AgentProfile;
use App\ClientiTipologium;
use App\ClientProfile;
use App\Comuni;
use App\Filiali;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClientProfileRequest;
use App\Http\Requests\StoreClientProfileRequest;
use App\Http\Requests\UpdateClientProfileRequest;
use App\Province;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientProfileController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('client_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClientProfile::with(['agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2'])->select(sprintf('%s.*', (new ClientProfile)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'client_profile_show';
                $editGate      = 'client_profile_edit';
                $deleteGate    = 'client_profile_delete';
                $crudRoutePart = 'client-profiles';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('tipo_tipologia', function ($row) {
                return $row->tipo ? $row->tipo->tipologia : '';
            });

            $table->editColumn('ruolo', function ($row) {
                return $row->ruolo ? $row->ruolo : "";
            });
            $table->editColumn('settore', function ($row) {
                return $row->settore ? $row->settore : "";
            });
            $table->editColumn('indirizzo', function ($row) {
                return $row->indirizzo ? $row->indirizzo : "";
            });
            $table->editColumn('civico', function ($row) {
                return $row->civico ? $row->civico : "";
            });
            $table->editColumn('cap', function ($row) {
                return $row->cap ? $row->cap : "";
            });
            $table->addColumn('comune_nome', function ($row) {
                return $row->comune ? $row->comune->nome : '';
            });

            $table->addColumn('provincia_nome', function ($row) {
                return $row->provincia ? $row->provincia->nome : '';
            });

            $table->editColumn('azienda', function ($row) {
                return $row->azienda ? $row->azienda : "";
            });
            $table->editColumn('piva', function ($row) {
                return $row->piva ? $row->piva : "";
            });
            $table->editColumn('telefono', function ($row) {
                return $row->telefono ? $row->telefono : "";
            });
            $table->editColumn('cellulare', function ($row) {
                return $row->cellulare ? $row->cellulare : "";
            });
            $table->editColumn('fax', function ($row) {
                return $row->fax ? $row->fax : "";
            });
            $table->editColumn('livello', function ($row) {
                return $row->livello ? $row->livello : "";
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : "";
            });

            $table->editColumn('nazione', function ($row) {
                return $row->nazione ? $row->nazione : "";
            });
            $table->editColumn('nome_2', function ($row) {
                return $row->nome_2 ? $row->nome_2 : "";
            });
            $table->editColumn('cognome_2', function ($row) {
                return $row->cognome_2 ? $row->cognome_2 : "";
            });
            $table->editColumn('affinita', function ($row) {
                return $row->affinita ? $row->affinita : "";
            });
            $table->editColumn('email_2', function ($row) {
                return $row->email_2 ? $row->email_2 : "";
            });
            $table->addColumn('comune_2_nome', function ($row) {
                return $row->comune_2 ? $row->comune_2->nome : '';
            });

            $table->addColumn('prov_2_nome', function ($row) {
                return $row->prov_2 ? $row->prov_2->nome : '';
            });

            $table->editColumn('indirizzo_2', function ($row) {
                return $row->indirizzo_2 ? $row->indirizzo_2 : "";
            });
            $table->editColumn('civico_2', function ($row) {
                return $row->civico_2 ? $row->civico_2 : "";
            });
            $table->editColumn('cap_2', function ($row) {
                return $row->cap_2 ? $row->cap_2 : "";
            });
            $table->editColumn('telefono_2', function ($row) {
                return $row->telefono_2 ? $row->telefono_2 : "";
            });
            $table->editColumn('cellulare_2', function ($row) {
                return $row->cellulare_2 ? $row->cellulare_2 : "";
            });
            $table->editColumn('fax_2', function ($row) {
                return $row->fax_2 ? $row->fax_2 : "";
            });
            $table->editColumn('stato', function ($row) {
                return $row->stato ? $row->stato : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2']);

            return $table->make(true);
        }

        return view('admin.clientProfiles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipos = ClientiTipologium::all()->pluck('tipologia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_2s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prov_2s = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientProfiles.create', compact('agentes', 'filiales', 'tipos', 'comunes', 'provincias', 'comune_2s', 'prov_2s'));
    }

    public function store(StoreClientProfileRequest $request)
    {
        $clientProfile = ClientProfile::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $clientProfile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clientProfile->id]);
        }

        return redirect()->route('admin.client-profiles.index');
    }

    public function edit(ClientProfile $clientProfile)
    {
        abort_if(Gate::denies('client_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentes = AgentProfile::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filiales = Filiali::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipos = ClientiTipologium::all()->pluck('tipologia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunes = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comune_2s = Comuni::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prov_2s = Province::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientProfile->load('agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2');

        return view('admin.clientProfiles.edit', compact('agentes', 'filiales', 'tipos', 'comunes', 'provincias', 'comune_2s', 'prov_2s', 'clientProfile'));
    }

    public function update(UpdateClientProfileRequest $request, ClientProfile $clientProfile)
    {
        $clientProfile->update($request->all());

        if (count($clientProfile->files) > 0) {
            foreach ($clientProfile->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }

        $media = $clientProfile->files->pluck('file_name')->toArray();

        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $clientProfile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.client-profiles.index');
    }

    public function show(ClientProfile $clientProfile)
    {
        abort_if(Gate::denies('client_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientProfile->load('agente', 'filiale', 'tipo', 'comune', 'provincia', 'comune_2', 'prov_2');

        return view('admin.clientProfiles.show', compact('clientProfile'));
    }

    public function destroy(ClientProfile $clientProfile)
    {
        abort_if(Gate::denies('client_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientProfileRequest $request)
    {
        ClientProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('client_profile_create') && Gate::denies('client_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ClientProfile();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
