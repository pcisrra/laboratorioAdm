<?php

namespace App\Http\Controllers\Admin;

use App\Beneficiario;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiarioRequest;
use App\Http\Requests\StoreBeneficiarioRequest;
use App\Http\Requests\UpdateBeneficiarioRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiarioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiarios = Beneficiario::all();

        return view('admin.beneficiarios.index', compact('beneficiarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiarios.create');
    }

    public function store(StoreBeneficiarioRequest $request)
    {
        $beneficiario = Beneficiario::create($request->all());

        return redirect()->route('admin.beneficiarios.index');

    }

    public function edit(Beneficiario $beneficiario)
    {
        abort_if(Gate::denies('beneficiario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiarios.edit', compact('beneficiario'));
    }

    public function update(UpdateBeneficiarioRequest $request, Beneficiario $beneficiario)
    {
        $beneficiario->update($request->all());

        return redirect()->route('admin.beneficiarios.index');

    }

    public function show(Beneficiario $beneficiario)
    {
        abort_if(Gate::denies('beneficiario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiarios.show', compact('beneficiario'));
    }

    public function destroy(Beneficiario $beneficiario)
    {
        abort_if(Gate::denies('beneficiario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiario->delete();

        return back();

    }

    public function massDestroy(MassDestroyBeneficiarioRequest $request)
    {
        Beneficiario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
