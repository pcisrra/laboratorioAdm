<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMuestraRequest;
use App\Http\Requests\StoreMuestraRequest;
use App\Http\Requests\UpdateMuestraRequest;
use App\Muestra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MuestrasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('muestra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muestras = Muestra::all();

        return view('admin.muestras.index', compact('muestras'));
    }

    public function create()
    {
        abort_if(Gate::denies('muestra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.muestras.create');
    }

    public function store(StoreMuestraRequest $request)
    {
        $muestra = Muestra::create($request->all());

        return redirect()->route('admin.muestras.index');
    }

    public function edit(Muestra $muestra)
    {
        abort_if(Gate::denies('muestra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.muestras.edit', compact('muestra'));
    }

    public function update(UpdateMuestraRequest $request, Muestra $muestra)
    {
        $muestra->update($request->all());

        return redirect()->route('admin.muestras.index');
    }

    public function show(Muestra $muestra)
    {
        abort_if(Gate::denies('muestra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.muestras.show', compact('muestra'));
    }

    public function destroy(Muestra $muestra)
    {
        abort_if(Gate::denies('muestra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muestra->delete();

        return back();
    }

    public function massDestroy(MassDestroyMuestraRequest $request)
    {
        Muestra::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
