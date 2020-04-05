<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLocalizacioneRequest;
use App\Http\Requests\StoreLocalizacioneRequest;
use App\Http\Requests\UpdateLocalizacioneRequest;
use App\Localizacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizacionesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('localizacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizaciones = Localizacione::all();

        return view('admin.localizaciones.index', compact('localizaciones'));
    }

    public function create()
    {
        abort_if(Gate::denies('localizacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localizaciones.create');
    }

    public function store(StoreLocalizacioneRequest $request)
    {
        $localizacione = Localizacione::create($request->all());

        if ($request->input('foto', false)) {
            $localizacione->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        return redirect()->route('admin.localizaciones.index');
    }

    public function edit(Localizacione $localizacione)
    {
        abort_if(Gate::denies('localizacione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localizaciones.edit', compact('localizacione'));
    }

    public function update(UpdateLocalizacioneRequest $request, Localizacione $localizacione)
    {
        $localizacione->update($request->all());

        if ($request->input('foto', false)) {
            if (!$localizacione->foto || $request->input('foto') !== $localizacione->foto->file_name) {
                $localizacione->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($localizacione->foto) {
            $localizacione->foto->delete();
        }

        return redirect()->route('admin.localizaciones.index');
    }

    public function show(Localizacione $localizacione)
    {
        abort_if(Gate::denies('localizacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacione->load('localizacionMateriales', 'localizacionActivos');

        return view('admin.localizaciones.show', compact('localizacione'));
    }

    public function destroy(Localizacione $localizacione)
    {
        abort_if(Gate::denies('localizacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacione->delete();

        return back();
    }

    public function massDestroy(MassDestroyLocalizacioneRequest $request)
    {
        Localizacione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
