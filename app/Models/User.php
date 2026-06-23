<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'employee_id',
        'role_id',
        'password',
        'department_id',
        'reporting_to',
        'phone',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporting_to');
    }

    public function subordinates(): HasMany
    {
        return $this->hasMany(User::class, 'reporting_to');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    public function assignedTickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'assigned_to');
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function hierarchy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Hierarchy::class);
    }

    public function assignedDepartments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_users')
                    ->using(DepartmentUser::class)
                    ->withPivot(['is_head', 'role_in_department'])
                    ->withTimestamps();
    }

    public function hasRole(string|array $roleName): bool
    {
        $userRoleName = $this->role?->name;
        if (is_array($roleName)) {
            return in_array($userRoleName, $roleName);
        }
        return $userRoleName === $roleName;
    }

    /**
     * Check if user has a specific permission.
     */
    public function hasPermission(string $permissionName): bool
    {
        $role = $this->role;
        if ($role) {
            return $role->permissions()->where('name', $permissionName)->exists();
        }
        return false;
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }

    public function isTeamLead(): bool
    {
        return $this->hasRole('Team Lead');
    }

    public function isProjectManager(): bool
    {
        return $this->hasRole('Project Manager');
    }

    public function isHR(): bool
    {
        return $this->hasRole('HR');
    }

    public function isEmployee(): bool
    {
        return $this->hasRole('Employee');
    }
}

