<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Capacitacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCapacitacionRequest;
use App\Http\Requests\UpdateCapacitacionRequest;
use App\Http\Resources\Admin\CapacitacionResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CapacitacionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('capacitacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CapacitacionResource(Capacitacion::with(['funcionario_capacitacion', 'asistentes'])->get());
    }

    public function store(StoreCapacitacionRequest $request)
    {
        $capacitacion = Capacitacion::create($request->all());
        $capacitacion->asistentes()->sync($request->input('asistentes', []));

        return (new CapacitacionResource($capacitacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Capacitacion $capacitacion)
    {
        abort_if(Gate::denies('capacitacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CapacitacionResource($capacitacion->load(['funcionario_capacitacion', 'asistentes']));
    }

    public function update(UpdateCapacitacionRequest $request, Capacitacion $capacitacion)
    {
        $capacitacion->update($request->all());
        $capacitacion->asistentes()->sync($request->input('asistentes', []));

        return (new CapacitacionResource($capacitacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Capacitacion $capacitacion)
    {
        abort_if(Gate::denies('capacitacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capacitacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
