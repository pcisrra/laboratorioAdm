<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIngresoMaterialeRequest;
use App\Http\Requests\StoreIngresoMaterialeRequest;
use App\Http\Requests\UpdateIngresoMaterialeRequest;
use App\IngresoMateriale;
use App\Materiale;
use App\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IngresoMaterialesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ingreso_materiale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingresoMateriales = IngresoMateriale::all();

        return view('admin.ingresoMateriales.index', compact('ingresoMateriales'));
    }

    public function create()
    {
        abort_if(Gate::denies('ingreso_materiale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_materials = Materiale::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usuario_ingresos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ingresoMateriales.create', compact('codigo_materials', 'usuario_ingresos'));
    }

    public function store(StoreIngresoMaterialeRequest $request)
    {
        $ingresoMateriale = IngresoMateriale::create($request->all());
        DB::select("CALL updateFechaSalida()");

        return view('/home');
    }

    public function edit(IngresoMateriale $ingresoMateriale)
    {
        abort_if(Gate::denies('ingreso_materiale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_materials = Materiale::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usuario_ingresos = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingresoMateriale->load('codigo_material', 'usuario_ingreso');

        return view('admin.ingresoMateriales.edit', compact('codigo_materials', 'usuario_ingresos', 'ingresoMateriale'));
    }

    public function update(UpdateIngresoMaterialeRequest $request, IngresoMateriale $ingresoMateriale)
    {
        $ingresoMateriale->update($request->all());

        return redirect()->route('admin.ingreso-materiales.index');
    }

    public function show(IngresoMateriale $ingresoMateriale)
    {
        abort_if(Gate::denies('ingreso_materiale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingresoMateriale->load('codigo_material', 'usuario_ingreso');

        return view('admin.ingresoMateriales.show', compact('ingresoMateriale'));
    }

    public function destroy(IngresoMateriale $ingresoMateriale)
    {
        abort_if(Gate::denies('ingreso_materiale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingresoMateriale->delete();

        return back();
    }

    public function massDestroy(MassDestroyIngresoMaterialeRequest $request)
    {
        IngresoMateriale::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
