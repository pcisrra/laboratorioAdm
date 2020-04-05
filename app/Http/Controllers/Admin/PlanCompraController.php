<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlanCompraRequest;
use App\Http\Requests\StorePlanCompraRequest;
use App\Http\Requests\UpdatePlanCompraRequest;
use App\PlanCompra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanCompraController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plan_compra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planCompras = PlanCompra::all();

        return view('admin.planCompras.index', compact('planCompras'));
    }

    public function create()
    {
        abort_if(Gate::denies('plan_compra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planCompras.create');
    }

    public function store(StorePlanCompraRequest $request)
    {
        $planCompra = PlanCompra::create($request->all());

        return redirect()->route('admin.plan-compras.index');
    }

    public function edit(PlanCompra $planCompra)
    {
        abort_if(Gate::denies('plan_compra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planCompras.edit', compact('planCompra'));
    }

    public function update(UpdatePlanCompraRequest $request, PlanCompra $planCompra)
    {
        $planCompra->update($request->all());

        return redirect()->route('admin.plan-compras.index');
    }

    public function show(PlanCompra $planCompra)
    {
        abort_if(Gate::denies('plan_compra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planCompras.show', compact('planCompra'));
    }

    public function destroy(PlanCompra $planCompra)
    {
        abort_if(Gate::denies('plan_compra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planCompra->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanCompraRequest $request)
    {
        PlanCompra::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
