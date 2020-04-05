<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Herramientum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHerramientumRequest;
use App\Http\Requests\UpdateHerramientumRequest;
use App\Http\Resources\Admin\HerramientumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HerramientasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HerramientumResource(Herramientum::with(['funcionario_asignado'])->get());
    }

    public function store(StoreHerramientumRequest $request)
    {
        $herramientum = Herramientum::create($request->all());

        return (new HerramientumResource($herramientum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HerramientumResource($herramientum->load(['funcionario_asignado']));
    }

    public function update(UpdateHerramientumRequest $request, Herramientum $herramientum)
    {
        $herramientum->update($request->all());

        return (new HerramientumResource($herramientum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
