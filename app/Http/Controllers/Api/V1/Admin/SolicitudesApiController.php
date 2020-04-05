<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSolicitudeRequest;
use App\Http\Requests\UpdateSolicitudeRequest;
use App\Http\Resources\Admin\SolicitudeResource;
use App\Solicitude;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SolicitudesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('solicitude_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SolicitudeResource(Solicitude::with(['codigo_material', 'nombre_solicitante', 'fabricacion_solicitud'])->get());
    }

    public function store(StoreSolicitudeRequest $request)
    {
        $solicitude = Solicitude::create($request->all());

        return (new SolicitudeResource($solicitude))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SolicitudeResource($solicitude->load(['codigo_material', 'nombre_solicitante', 'fabricacion_solicitud']));
    }

    public function update(UpdateSolicitudeRequest $request, Solicitude $solicitude)
    {
        $solicitude->update($request->all());

        return (new SolicitudeResource($solicitude))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitude->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
