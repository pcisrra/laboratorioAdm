<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMaterialeRequest;
use App\Http\Requests\StoreMaterialeRequest;
use App\Http\Requests\UpdateMaterialeRequest;
use App\Localizacione;
use App\Materiale;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterialesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materiale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiales = Materiale::all();

        return view('admin.materiales.index', compact('materiales'));
    }

    public function create()
    {
        abort_if(Gate::denies('materiale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacions = Localizacione::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.materiales.create', compact('localizacions'));
    }

    public function store(StoreMaterialeRequest $request)
    {
        $materiale = Materiale::create($request->all());

        return redirect()->route('admin.materiales.index');

    }

    public function edit(Materiale $materiale)
    {
        abort_if(Gate::denies('materiale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizacions = Localizacione::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $materiale->load('localizacion');

        return view('admin.materiales.edit', compact('localizacions', 'materiale'));
    }

    public function update(UpdateMaterialeRequest $request, Materiale $materiale)
    {
        $materiale->update($request->all());

        return redirect()->route('admin.materiales.index');

    }

    public function show(Materiale $materiale)
    {
        abort_if(Gate::denies('materiale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiale->load('localizacion');

        return view('admin.materiales.show', compact('materiale'));
    }

    public function destroy(Materiale $materiale)
    {
        abort_if(Gate::denies('materiale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiale->delete();

        return back();

    }

    public function massDestroy(MassDestroyMaterialeRequest $request)
    {
        Materiale::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public static function enterMat($codigo_material, $cantidad){
        DB::select("UPDATE materiales SET cantidad = cantidad + ? WHERE codigo = ?", [$cantidad, $codigo_material]);
        DB::select("DELETE FROM ingreso_materiales ORDER BY id DESC LIMIT 1");
        return back();
    }

    public static function exitMat($codigo_material, $cantidad){
        DB::select("UPDATE materiales SET cantidad  = cantidad - ? WHERE codigo = ?", [$cantidad, $codigo_material]);
        DB::select("DELETE FROM solicitudes ORDER BY id DESC LIMIT 1");
        return back();
    }
}
