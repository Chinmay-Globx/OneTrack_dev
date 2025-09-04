<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'user_type'
    ];

    protected $hidden = ['password'];

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type');
    }
}