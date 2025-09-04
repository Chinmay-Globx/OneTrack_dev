<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'master_user_type'; 
    protected $fillable = ['name'];
}