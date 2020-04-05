<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DisenoAsistido;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisenoAsistidoRequest;
use App\Http\Requests\UpdateDisenoAsistidoRequest;
use App\Http\Resources\Admin\DisenoAsistidoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisenoAsistidoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diseno_asistido_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisenoAsistidoResource(DisenoAsistido::with(['usuario_asignado', 'nombre_cliente'])->get());
    }

    public function store(StoreDisenoAsistidoRequest $request)
    {
        $disenoAsistido = DisenoAsistido::create($request->all());

        return (new DisenoAsistidoResource($disenoAsistido))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DisenoAsistido $disenoAsistido)
    {
        abort_if(Gate::denies('diseno_asistido_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisenoAsistidoResource($disenoAsistido->load(['usuario_asignado', 'nombre_cliente']));
    }

    public function update(UpdateDisenoAsistidoRequest $request, DisenoAsistido $disenoAsistido)
    {
        $disenoAsistido->update($request->all());

        return (new DisenoAsistidoResource($disenoAsistido))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DisenoAsistido $disenoAsistido)
    {
        abort_if(Gate::denies('diseno_asistido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disenoAsistido->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
