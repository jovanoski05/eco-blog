<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    //

    protected $fillable = [
        'user_id',
        'API_Key'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
