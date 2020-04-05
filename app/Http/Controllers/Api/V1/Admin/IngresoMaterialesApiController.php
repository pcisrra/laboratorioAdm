<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngresoMaterialeRequest;
use App\Http\Requests\UpdateIngresoMaterialeRequest;
use App\Http\Resources\Admin\IngresoMaterialeResource;
use App\IngresoMateriale;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IngresoMaterialesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ingreso_materiale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IngresoMaterialeResource(IngresoMateriale::with(['codigo_material', 'usuario_ingreso'])->get());
    }

    public function store(StoreIngresoMaterialeRequest $request)
    {
        $ingresoMateriale = IngresoMateriale::create($request->all());

        return (new IngresoMaterialeResource($ingresoMateriale))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IngresoMateriale $ingresoMateriale)
    {
        abort_if(Gate::denies('ingreso_materiale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IngresoMaterialeResource($ingresoMateriale->load(['codigo_material', 'usuario_ingreso']));
    }

    public function update(UpdateIngresoMaterialeRequest $request, IngresoMateriale $ingresoMateriale)
    {
        $ingresoMateriale->update($request->all());

        return (new IngresoMaterialeResource($ingresoMateriale))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IngresoMateriale $ingresoMateriale)
    {
        abort_if(Gate::denies('ingreso_materiale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingresoMateriale->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
