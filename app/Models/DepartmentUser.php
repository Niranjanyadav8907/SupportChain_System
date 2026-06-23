<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DepartmentUser extends Pivot
{
    protected $table = 'department_users';

    protected $fillable = [
        'user_id',
        'department_id',
        'is_head',
        'role_in_department'
    ];

    protected $casts = [
        'is_head' => 'boolean'
    ];
}
