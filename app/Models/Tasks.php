<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Users;
class Tasks extends Model
{
    protected $table = "tasks";
    protected $guarded = [];

    public function user()  {
        return $this->belongsTo(Users::class, 'user_id');
    }


    protected $casts = [
    'is_completed' => 'boolean',
    ];
}
