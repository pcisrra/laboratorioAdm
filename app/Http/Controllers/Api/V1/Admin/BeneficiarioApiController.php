<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Beneficiario;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBeneficiarioRequest;
use App\Http\Requests\UpdateBeneficiarioRequest;
use App\Http\Resources\Admin\BeneficiarioResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiarioApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BeneficiarioResource(Beneficiario::all());

    }

    public function store(StoreBeneficiarioRequest $request)
    {
        $beneficiario = Beneficiario::create($request->all());

        return (new BeneficiarioResource($beneficiario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Beneficiario $beneficiario)
    {
        abort_if(Gate::denies('beneficiario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BeneficiarioResource($beneficiario);

    }

    public function update(UpdateBeneficiarioRequest $request, Beneficiario $beneficiario)
    {
        $beneficiario->update($request->all());

        return (new BeneficiarioResource($beneficiario))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Beneficiario $beneficiario)
    {
        abort_if(Gate::denies('beneficiario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiario->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
