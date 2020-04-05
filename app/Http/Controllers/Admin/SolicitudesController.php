<?php

namespace App\Http\Controllers\Admin;

use App\Fabricacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySolicitudeRequest;
use App\Http\Requests\StoreSolicitudeRequest;
use App\Http\Requests\UpdateSolicitudeRequest;
use App\Materiale;
use App\Solicitude;
use App\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SolicitudesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('solicitude_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitudes = Solicitude::all();

        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        abort_if(Gate::denies('solicitude_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_materials = Materiale::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_solicitantes = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabricacion_solicituds = Fabricacion::all()->pluck('proyecto_nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.solicitudes.create', compact('codigo_materials', 'nombre_solicitantes', 'fabricacion_solicituds'));
    }

    public function store(StoreSolicitudeRequest $request)
    {
        $solicitude = Solicitude::create($request->all());
        DB::select("CALL updateFechaSalida()");

        return redirect()->route('admin.solicitudes.index');
    }

    public function edit(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_materials = Materiale::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_solicitantes = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fabricacion_solicituds = Fabricacion::all()->pluck('proyecto_nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $solicitude->load('codigo_material', 'nombre_solicitante', 'fabricacion_solicitud');

        return view('admin.solicitudes.edit', compact('codigo_materials', 'nombre_solicitantes', 'fabricacion_solicituds', 'solicitude'));
    }

    public function update(UpdateSolicitudeRequest $request, Solicitude $solicitude)
    {
        $solicitude->update($request->all());

        return redirect()->route('admin.solicitudes.index');
    }

    public function show(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitude->load('codigo_material', 'nombre_solicitante', 'fabricacion_solicitud');

        return view('admin.solicitudes.show', compact('solicitude'));
    }

    public function destroy(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitude->delete();

        return back();
    }

    public function massDestroy(MassDestroySolicitudeRequest $request)
    {
        Solicitude::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
