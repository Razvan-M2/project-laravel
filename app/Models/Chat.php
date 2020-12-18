<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';


    protected function user()
    {
        //  This belongs to User with this id
        return $this->belongsTo(User::class, 'id-user');
    }
}
