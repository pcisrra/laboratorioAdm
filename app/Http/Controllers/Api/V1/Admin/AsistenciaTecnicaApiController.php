<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AsistenciaTecnica;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAsistenciaTecnicaRequest;
use App\Http\Requests\UpdateAsistenciaTecnicaRequest;
use App\Http\Resources\Admin\AsistenciaTecnicaResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsistenciaTecnicaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asistencia_tecnica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AsistenciaTecnicaResource(AsistenciaTecnica::with(['funcionario_asistencia', 'nombre_cliente'])->get());
    }

    public function store(StoreAsistenciaTecnicaRequest $request)
    {
        $asistenciaTecnica = AsistenciaTecnica::create($request->all());

        return (new AsistenciaTecnicaResource($asistenciaTecnica))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AsistenciaTecnica $asistenciaTecnica)
    {
        abort_if(Gate::denies('asistencia_tecnica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AsistenciaTecnicaResource($asistenciaTecnica->load(['funcionario_asistencia', 'nombre_cliente']));
    }

    public function update(UpdateAsistenciaTecnicaRequest $request, AsistenciaTecnica $asistenciaTecnica)
    {
        $asistenciaTecnica->update($request->all());

        return (new AsistenciaTecnicaResource($asistenciaTecnica))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AsistenciaTecnica $asistenciaTecnica)
    {
        abort_if(Gate::denies('asistencia_tecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaTecnica->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
