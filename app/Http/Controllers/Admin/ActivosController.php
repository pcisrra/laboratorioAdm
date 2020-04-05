<?php

namespace App\Http\Controllers\Admin;

use App\Activo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActivoRequest;
use App\Http\Requests\StoreActivoRequest;
use App\Http\Requests\UpdateActivoRequest;
use App\Localizacione;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('activo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activos = Activo::all();

        return view('admin.activos.index', compact('activos'));
    }

    public function create()
    {
        abort_if(Gate::denies('activo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacions = Localizacione::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $func_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.activos.create', compact('localizacions', 'func_asignados'));
    }

    public function store(StoreActivoRequest $request)
    {
        $activo = Activo::create($request->all());

        return redirect()->route('admin.activos.index');
    }

    public function edit(Activo $activo)
    {
        abort_if(Gate::denies('activo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacions = Localizacione::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $func_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $activo->load('localizacion', 'func_asignado');

        return view('admin.activos.edit', compact('localizacions', 'func_asignados', 'activo'));
    }

    public function update(UpdateActivoRequest $request, Activo $activo)
    {
        $activo->update($request->all());

        return redirect()->route('admin.activos.index');
    }

    public function show(Activo $activo)
    {
        abort_if(Gate::denies('activo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activo->load('localizacion', 'func_asignado');

        return view('admin.activos.show', compact('activo'));
    }

    public function destroy(Activo $activo)
    {
        abort_if(Gate::denies('activo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activo->delete();

        return back();
    }

    public function massDestroy(MassDestroyActivoRequest $request)
    {
        Activo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
