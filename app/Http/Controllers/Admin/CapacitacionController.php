<?php

namespace App\Http\Controllers\Admin;

use App\Beneficiario;
use App\Capacitacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCapacitacionRequest;
use App\Http\Requests\StoreCapacitacionRequest;
use App\Http\Requests\UpdateCapacitacionRequest;
use App\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CapacitacionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('capacitacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capacitacions = Capacitacion::all();

        return view('admin.capacitacions.index', compact('capacitacions'));
    }

    public function create()
    {
        abort_if(Gate::denies('capacitacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario_capacitacions = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = Beneficiario::all()->pluck('nombre_completo', 'id');

        return view('admin.capacitacions.create', compact('funcionario_capacitacions', 'asistentes'));
    }

    public function store(StoreCapacitacionRequest $request)
    {
        $capacitacion = Capacitacion::create($request->all());
        $capacitacion->asistentes()->sync($request->input('asistentes', []));
        DB::select('CALL generateList()');
        DB::select('CALL createReport()');
        app('App\Http\Controllers\AssistanceController')->createList();
        return view('/home');

    }

    public function edit(Capacitacion $capacitacion)
    {
        abort_if(Gate::denies('capacitacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario_capacitacions = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = Beneficiario::all()->pluck('nombre_completo', 'id');

        $capacitacion->load('funcionario_capacitacion', 'asistentes');

        return view('admin.capacitacions.edit', compact('funcionario_capacitacions', 'asistentes', 'capacitacion'));
    }

    public function update(UpdateCapacitacionRequest $request, Capacitacion $capacitacion)
    {
        $capacitacion->update($request->all());
        $capacitacion->asistentes()->sync($request->input('asistentes', []));

        return redirect()->route('admin.capacitacions.index');
    }

    public function show(Capacitacion $capacitacion)
    {
        abort_if(Gate::denies('capacitacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capacitacion->load('funcionario_capacitacion', 'asistentes');

        return view('admin.capacitacions.show', compact('capacitacion'));
    }

    public function destroy(Capacitacion $capacitacion)
    {
        abort_if(Gate::denies('capacitacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capacitacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyCapacitacionRequest $request)
    {
        Capacitacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
