<?php

namespace App\Http\Controllers\Admin;

use App\AsistenciaTecnica;
use App\Beneficiario;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAsistenciaTecnicaRequest;
use App\Http\Requests\StoreAsistenciaTecnicaRequest;
use App\Http\Requests\UpdateAsistenciaTecnicaRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsistenciaTecnicaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asistencia_tecnica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaTecnicas = AsistenciaTecnica::all();

        return view('admin.asistenciaTecnicas.index', compact('asistenciaTecnicas'));
    }

    public function create()
    {
        abort_if(Gate::denies('asistencia_tecnica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario_asistencias = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_clientes = Beneficiario::all()->pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.asistenciaTecnicas.create', compact('funcionario_asistencias', 'nombre_clientes'));
    }

    public function store(StoreAsistenciaTecnicaRequest $request)
    {
        $asistenciaTecnica = AsistenciaTecnica::create($request->all());

        return redirect()->route('admin.asistencia-tecnicas.index');
    }

    public function edit(AsistenciaTecnica $asistenciaTecnica)
    {
        abort_if(Gate::denies('asistencia_tecnica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario_asistencias = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nombre_clientes = Beneficiario::all()->pluck('nombre_completo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistenciaTecnica->load('funcionario_asistencia', 'nombre_cliente');

        return view('admin.asistenciaTecnicas.edit', compact('funcionario_asistencias', 'nombre_clientes', 'asistenciaTecnica'));
    }

    public function update(UpdateAsistenciaTecnicaRequest $request, AsistenciaTecnica $asistenciaTecnica)
    {
        $asistenciaTecnica->update($request->all());

        return redirect()->route('admin.asistencia-tecnicas.index');
    }

    public function show(AsistenciaTecnica $asistenciaTecnica)
    {
        abort_if(Gate::denies('asistencia_tecnica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaTecnica->load('funcionario_asistencia', 'nombre_cliente');

        return view('admin.asistenciaTecnicas.show', compact('asistenciaTecnica'));
    }

    public function destroy(AsistenciaTecnica $asistenciaTecnica)
    {
        abort_if(Gate::denies('asistencia_tecnica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asistenciaTecnica->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsistenciaTecnicaRequest $request)
    {
        AsistenciaTecnica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
