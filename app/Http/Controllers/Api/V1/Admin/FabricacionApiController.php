<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Fabricacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFabricacionRequest;
use App\Http\Requests\UpdateFabricacionRequest;
use App\Http\Resources\Admin\FabricacionResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FabricacionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fabricacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FabricacionResource(Fabricacion::with(['maquina_asignadas', 'beneficiario', 'tecnico_asignado', 'material_asignados'])->get());

    }

    public function store(StoreFabricacionRequest $request)
    {
        $fabricacion = Fabricacion::create($request->all());
        $fabricacion->maquina_asignadas()->sync($request->input('maquina_asignadas', []));
        $fabricacion->material_asignados()->sync($request->input('material_asignados', []));

        return (new FabricacionResource($fabricacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Fabricacion $fabricacion)
    {
        abort_if(Gate::denies('fabricacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FabricacionResource($fabricacion->load(['maquina_asignadas', 'beneficiario', 'tecnico_asignado', 'material_asignados']));

    }

    public function update(UpdateFabricacionRequest $request, Fabricacion $fabricacion)
    {
        $fabricacion->update($request->all());
        $fabricacion->maquina_asignadas()->sync($request->input('maquina_asignadas', []));
        $fabricacion->material_asignados()->sync($request->input('material_asignados', []));

        return (new FabricacionResource($fabricacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Fabricacion $fabricacion)
    {
        abort_if(Gate::denies('fabricacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabricacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
