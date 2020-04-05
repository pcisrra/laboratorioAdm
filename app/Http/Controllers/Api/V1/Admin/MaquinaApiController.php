<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMaquinaRequest;
use App\Http\Requests\UpdateMaquinaRequest;
use App\Http\Resources\Admin\MaquinaResource;
use App\Maquina;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaquinaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('maquina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaquinaResource(Maquina::all());

    }

    public function store(StoreMaquinaRequest $request)
    {
        $maquina = Maquina::create($request->all());

        if ($request->input('foto_ref', false)) {
            $maquina->addMedia(storage_path('tmp/uploads/' . $request->input('foto_ref')))->toMediaCollection('foto_ref');
        }

        return (new MaquinaResource($maquina))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Maquina $maquina)
    {
        abort_if(Gate::denies('maquina_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaquinaResource($maquina);

    }

    public function update(UpdateMaquinaRequest $request, Maquina $maquina)
    {
        $maquina->update($request->all());

        if ($request->input('foto_ref', false)) {
            if (!$maquina->foto_ref || $request->input('foto_ref') !== $maquina->foto_ref->file_name) {
                $maquina->addMedia(storage_path('tmp/uploads/' . $request->input('foto_ref')))->toMediaCollection('foto_ref');
            }

        } elseif ($maquina->foto_ref) {
            $maquina->foto_ref->delete();
        }

        return (new MaquinaResource($maquina))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Maquina $maquina)
    {
        abort_if(Gate::denies('maquina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maquina->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
