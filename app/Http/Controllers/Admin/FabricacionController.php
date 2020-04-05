<?php

namespace App\Http\Controllers\Admin;

use App\Beneficiario;
use App\Fabricacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFabricacionRequest;
use App\Http\Requests\StoreFabricacionRequest;
use App\Http\Requests\UpdateFabricacionRequest;
use App\Maquina;
use App\Materiale;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FabricacionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fabricacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabricacions = Fabricacion::all();

        return view('admin.fabricacions.index', compact('fabricacions'));
    }

    public function create()
    {
        abort_if(Gate::denies('fabricacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maquina_asignadas = Maquina::all()->pluck('nombre', 'id');

        $beneficiarios = Beneficiario::all()->pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tecnico_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_asignados = Materiale::all()->pluck('codigo', 'id');

        return view('admin.fabricacions.create', compact('maquina_asignadas', 'beneficiarios', 'tecnico_asignados', 'material_asignados'));
    }

    public function store(StoreFabricacionRequest $request)
    {
        $fabricacion = Fabricacion::create($request->all());
        $fabricacion->maquina_asignadas()->sync($request->input('maquina_asignadas', []));
        $fabricacion->material_asignados()->sync($request->input('material_asignados', []));

        return redirect()->route('admin.fabricacions.index');

    }

    public function edit(Fabricacion $fabricacion)
    {
        abort_if(Gate::denies('fabricacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maquina_asignadas = Maquina::all()->pluck('nombre', 'id');

        $tecnico_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_asignados = Materiale::all()->pluck('codigo', 'id');

        $fabricacion->load('maquina_asignadas', 'beneficiario', 'tecnico_asignado', 'material_asignados');

        return view('admin.fabricacions.edit', compact('maquina_asignadas', 'tecnico_asignados', 'material_asignados', 'fabricacion'));
    }

    public function update(UpdateFabricacionRequest $request, Fabricacion $fabricacion)
    {
        $fabricacion->update($request->all());
        $fabricacion->maquina_asignadas()->sync($request->input('maquina_asignadas', []));
        $fabricacion->material_asignados()->sync($request->input('material_asignados', []));

        return redirect()->route('admin.fabricacions.index');

    }

    public function show(Fabricacion $fabricacion)
    {
        abort_if(Gate::denies('fabricacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabricacion->load('maquina_asignadas', 'beneficiario', 'tecnico_asignado', 'material_asignados');

        return view('admin.fabricacions.show', compact('fabricacion'));
    }

    public function destroy(Fabricacion $fabricacion)
    {
        abort_if(Gate::denies('fabricacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fabricacion->delete();

        return back();

    }

    public function massDestroy(MassDestroyFabricacionRequest $request)
    {
        Fabricacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
