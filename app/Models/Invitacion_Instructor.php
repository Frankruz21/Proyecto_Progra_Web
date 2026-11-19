<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitacion_Instructor extends Model
{
    protected $fillable = [
        'token_hash',
        'expira_en',
        'usado_en',
        'solicitud_id',
    ];
}
