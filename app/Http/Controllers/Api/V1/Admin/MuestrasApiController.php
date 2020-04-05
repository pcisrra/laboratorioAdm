<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMuestraRequest;
use App\Http\Requests\UpdateMuestraRequest;
use App\Http\Resources\Admin\MuestraResource;
use App\Muestra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MuestrasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('muestra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MuestraResource(Muestra::all());
    }

    public function store(StoreMuestraRequest $request)
    {
        $muestra = Muestra::create($request->all());

        return (new MuestraResource($muestra))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Muestra $muestra)
    {
        abort_if(Gate::denies('muestra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MuestraResource($muestra);
    }

    public function update(UpdateMuestraRequest $request, Muestra $muestra)
    {
        $muestra->update($request->all());

        return (new MuestraResource($muestra))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Muestra $muestra)
    {
        abort_if(Gate::denies('muestra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muestra->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
