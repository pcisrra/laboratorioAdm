<?php

namespace App\Http\Controllers\Admin;

use App\Beneficiario;
use App\DisenoAsistido;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDisenoAsistidoRequest;
use App\Http\Requests\StoreDisenoAsistidoRequest;
use App\Http\Requests\UpdateDisenoAsistidoRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisenoAsistidoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diseno_asistido_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disenoAsistidos = DisenoAsistido::all();

        return view('admin.disenoAsistidos.index', compact('disenoAsistidos'));
    }

    public function create()
    {
        abort_if(Gate::denies('diseno_asistido_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuario_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_clientes = Beneficiario::all()->pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.disenoAsistidos.create', compact('usuario_asignados', 'nombre_clientes'));
    }

    public function store(StoreDisenoAsistidoRequest $request)
    {
        $disenoAsistido = DisenoAsistido::create($request->all());

        return redirect()->route('admin.diseno-asistidos.index');
    }

    public function edit(DisenoAsistido $disenoAsistido)
    {
        abort_if(Gate::denies('diseno_asistido_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuario_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_clientes = Beneficiario::all()->pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disenoAsistido->load('usuario_asignado', 'nombre_cliente');

        return view('admin.disenoAsistidos.edit', compact('usuario_asignados', 'nombre_clientes', 'disenoAsistido'));
    }

    public function update(UpdateDisenoAsistidoRequest $request, DisenoAsistido $disenoAsistido)
    {
        $disenoAsistido->update($request->all());

        return redirect()->route('admin.diseno-asistidos.index');
    }

    public function show(DisenoAsistido $disenoAsistido)
    {
        abort_if(Gate::denies('diseno_asistido_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disenoAsistido->load('usuario_asignado', 'nombre_cliente');

        return view('admin.disenoAsistidos.show', compact('disenoAsistido'));
    }

    public function destroy(DisenoAsistido $disenoAsistido)
    {
        abort_if(Gate::denies('diseno_asistido_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disenoAsistido->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisenoAsistidoRequest $request)
    {
        DisenoAsistido::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
