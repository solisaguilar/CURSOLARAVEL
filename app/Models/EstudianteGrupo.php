<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteGrupo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'estudiante_grupo';
    protected $fillable = [
        'estudiante_id',
        'grupo_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}

