<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMaquinaRequest;
use App\Http\Requests\StoreMaquinaRequest;
use App\Http\Requests\UpdateMaquinaRequest;
use App\Maquina;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MaquinaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('maquina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maquinas = Maquina::all();

        return view('admin.maquinas.index', compact('maquinas'));
    }

    public function create()
    {
        abort_if(Gate::denies('maquina_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.maquinas.create');
    }

    public function store(StoreMaquinaRequest $request)
    {
        $maquina = Maquina::create($request->all());

        foreach ($request->input('foto_ref', []) as $file) {
            $maquina->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto_ref');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $maquina->id]);
        }

        return redirect()->route('admin.maquinas.index');

    }

    public function edit(Maquina $maquina)
    {
        abort_if(Gate::denies('maquina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.maquinas.edit', compact('maquina'));
    }

    public function update(UpdateMaquinaRequest $request, Maquina $maquina)
    {
        $maquina->update($request->all());

        if (count($maquina->foto_ref) > 0) {
            foreach ($maquina->foto_ref as $media) {
                if (!in_array($media->file_name, $request->input('foto_ref', []))) {
                    $media->delete();
                }

            }

        }

        $media = $maquina->foto_ref->pluck('file_name')->toArray();

        foreach ($request->input('foto_ref', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $maquina->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto_ref');
            }

        }

        return redirect()->route('admin.maquinas.index');

    }

    public function show(Maquina $maquina)
    {
        abort_if(Gate::denies('maquina_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.maquinas.show', compact('maquina'));
    }

    public function destroy(Maquina $maquina)
    {
        abort_if(Gate::denies('maquina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maquina->delete();

        return back();

    }

    public function massDestroy(MassDestroyMaquinaRequest $request)
    {
        Maquina::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('maquina_create') && Gate::denies('maquina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Maquina();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);

    }

}
