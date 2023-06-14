<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /* その生徒が受講している科目を取得する */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    /* 生徒が所属するクラスを取得する */
    public function homeroom()
    {
        return $this->belongsTo(Homeroom::class);
    }

    /* getData() でカラムの情報をまとめて文字列にする */
    public function getData(){
        return ("{$this->name} ({$this->homeroom->name})");
    }
}
