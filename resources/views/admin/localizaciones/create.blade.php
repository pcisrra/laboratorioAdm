@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.localizacione.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.localizaciones.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="codigo">{{ trans('cruds.localizacione.fields.codigo') }}</label>
                <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', '') }}" required>
                @if($errors->has('codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.localizacione.fields.codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.localizacione.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.localizacione.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto">{{ trans('cruds.localizacione.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.localizacione.fields.foto_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.localizaciones.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($localizacione) && $localizacione->foto)
      var file = {!! json_encode($localizacione->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $localizacione->foto->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection