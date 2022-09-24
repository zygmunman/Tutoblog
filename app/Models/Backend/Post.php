<?php

namespace App\Models\Backend;

use App\Models\Backend\Archivo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['usuario_id', 'titulo', 'slug', 'descripcion', 'contenido', 'estado'];

    public function categoria()
    {
        return $this->belongsToMany(Categoria::class, 'post_categoria');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function archivo()
    {
        return $this->morphOne(Archivo::class, 'archivable');
    }

      /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActivo($query)
    {
        $query->where('estado', true);
    }
}
