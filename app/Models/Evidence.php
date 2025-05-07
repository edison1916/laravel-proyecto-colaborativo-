<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    

    protected $fillable = [
        'user_id', 'file_type', 'file_path', 'description'
    ];
}
