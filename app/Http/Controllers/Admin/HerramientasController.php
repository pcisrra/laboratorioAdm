<?php

namespace App\Http\Controllers\Admin;

use App\Herramientum;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHerramientumRequest;
use App\Http\Requests\StoreHerramientumRequest;
use App\Http\Requests\UpdateHerramientumRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HerramientasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('herramientum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramienta = Herramientum::all();

        return view('admin.herramienta.index', compact('herramienta'));
    }

    public function create()
    {
        abort_if(Gate::denies('herramientum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.herramienta.create', compact('funcionario_asignados'));
    }

    public function store(StoreHerramientumRequest $request)
    {
        $herramientum = Herramientum::create($request->all());

        return redirect()->route('admin.herramienta.index');
    }

    public function edit(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $funcionario_asignados = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $herramientum->load('funcionario_asignado');

        return view('admin.herramienta.edit', compact('funcionario_asignados', 'herramientum'));
    }

    public function update(UpdateHerramientumRequest $request, Herramientum $herramientum)
    {
        $herramientum->update($request->all());

        return redirect()->route('admin.herramienta.index');
    }

    public function show(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->load('funcionario_asignado');

        return view('admin.herramienta.show', compact('herramientum'));
    }

    public function destroy(Herramientum $herramientum)
    {
        abort_if(Gate::denies('herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $herramientum->delete();

        return back();
    }

    public function massDestroy(MassDestroyHerramientumRequest $request)
    {
        Herramientum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
