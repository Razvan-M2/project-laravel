<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['date'];
    protected $primaryKey = "id";

    public function user()
    {
        //  This belongs to class with this id
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function chat()
    // {
    //     return $this->hasMany
    // }
    // public function chat()
    // {
    //     return $this->hasMany(, 'foreign_key', );
    // }
}
