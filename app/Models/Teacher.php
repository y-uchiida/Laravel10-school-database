<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /* homeroom(担任クラス)をhasOneで持つ */
    public function homeroom(){
        return ($this->hasOne(Homeroom::class));
    }
}
