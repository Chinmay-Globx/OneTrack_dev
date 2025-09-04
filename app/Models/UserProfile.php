<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'mobile_number',
        'department',
        'designation',
        'employee_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
