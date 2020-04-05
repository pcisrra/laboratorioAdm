<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMaterialeRequest;
use App\Http\Requests\UpdateMaterialeRequest;
use App\Http\Resources\Admin\MaterialeResource;
use App\Materiale;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterialesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materiale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaterialeResource(Materiale::with(['localizacion'])->get());

    }

    public function store(StoreMaterialeRequest $request)
    {
        $materiale = Materiale::create($request->all());

        return (new MaterialeResource($materiale))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Materiale $materiale)
    {
        abort_if(Gate::denies('materiale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaterialeResource($materiale->load(['localizacion']));

    }

    public function update(UpdateMaterialeRequest $request, Materiale $materiale)
    {
        $materiale->update($request->all());

        return (new MaterialeResource($materiale))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Materiale $materiale)
    {
        abort_if(Gate::denies('materiale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiale->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
