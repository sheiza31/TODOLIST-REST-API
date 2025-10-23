<?php

namespace App\Models;
use App\Models\Tasks;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $table = 'users';
    protected $guarded=[];

    public function tasks()  {
        return $this->hasMany(Tasks::class);
    }
}
