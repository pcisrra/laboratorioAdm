<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Activo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivoRequest;
use App\Http\Requests\UpdateActivoRequest;
use App\Http\Resources\Admin\ActivoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('activo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActivoResource(Activo::with(['localizacion', 'func_asignado'])->get());
    }

    public function store(StoreActivoRequest $request)
    {
        $activo = Activo::create($request->all());

        return (new ActivoResource($activo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Activo $activo)
    {
        abort_if(Gate::denies('activo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActivoResource($activo->load(['localizacion', 'func_asignado']));
    }

    public function update(UpdateActivoRequest $request, Activo $activo)
    {
        $activo->update($request->all());

        return (new ActivoResource($activo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Activo $activo)
    {
        abort_if(Gate::denies('activo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
