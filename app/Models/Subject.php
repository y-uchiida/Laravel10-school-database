<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function students(){
        return ( $this->belongsToMany(Student::class) );
    }

    public function get_data(){
        return ( "{$this->name} (id:{$this->id})" );
    }
}
