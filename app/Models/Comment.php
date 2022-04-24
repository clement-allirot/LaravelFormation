<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * laisse possible d'ajouter modifier ce champ via le code
     */
    //protected $fillable = ['body'];

    /**
     * mass asignement ok pour tous les champ
     */
    protected $guarded = [];

    /**
     * Get the parent commentable model (post or video).
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
