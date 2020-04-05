<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Localizacione extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'localizaciones';

    protected $appends = [
        'foto',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'codigo',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function localizacionMateriales()
    {
        return $this->hasMany(Materiale::class, 'localizacion_id', 'id');
    }

    public function localizacionActivos()
    {
        return $this->hasMany(Activo::class, 'localizacion_id', 'id');
    }

    public function getFotoAttribute()
    {
        $file = $this->getMedia('foto')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
