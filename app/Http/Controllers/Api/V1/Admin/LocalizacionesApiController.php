<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLocalizacioneRequest;
use App\Http\Requests\UpdateLocalizacioneRequest;
use App\Http\Resources\Admin\LocalizacioneResource;
use App\Localizacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizacionesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('localizacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocalizacioneResource(Localizacione::all());
    }

    public function store(StoreLocalizacioneRequest $request)
    {
        $localizacione = Localizacione::create($request->all());

        if ($request->input('foto', false)) {
            $localizacione->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        return (new LocalizacioneResource($localizacione))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Localizacione $localizacione)
    {
        abort_if(Gate::denies('localizacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocalizacioneResource($localizacione);
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

        return (new LocalizacioneResource($localizacione))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Localizacione $localizacione)
    {
        abort_if(Gate::denies('localizacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacione->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
