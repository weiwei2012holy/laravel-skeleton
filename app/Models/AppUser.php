<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AppUser extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'app_users';

    protected $guard = 'api';


    public $fillable = [
        'nickname',
        'avatar'
    ];

    protected $casts = [
        'nickname' => 'string',
        'avatar' => 'string'
    ];

    public static $rules = [
        'nickname' => 'required|string',
        'avatar' => 'nullable|url',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
