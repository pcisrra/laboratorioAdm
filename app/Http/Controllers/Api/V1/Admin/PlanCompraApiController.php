<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanCompraRequest;
use App\Http\Requests\UpdatePlanCompraRequest;
use App\Http\Resources\Admin\PlanCompraResource;
use App\PlanCompra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanCompraApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plan_compra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlanCompraResource(PlanCompra::all());
    }

    public function store(StorePlanCompraRequest $request)
    {
        $planCompra = PlanCompra::create($request->all());

        return (new PlanCompraResource($planCompra))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PlanCompra $planCompra)
    {
        abort_if(Gate::denies('plan_compra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlanCompraResource($planCompra);
    }

    public function update(UpdatePlanCompraRequest $request, PlanCompra $planCompra)
    {
        $planCompra->update($request->all());

        return (new PlanCompraResource($planCompra))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PlanCompra $planCompra)
    {
        abort_if(Gate::denies('plan_compra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planCompra->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
