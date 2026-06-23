<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hierarchy extends Model
{
    protected $table = 'hierarchies';

    protected $fillable = [
        'user_id',
        'reporting_to',
        'level',
        'depth'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporting_to');
    }
}
