<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasTenants;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;
// class User extends Authenticatable implements FilamentUser, HasTenants;

class User extends Authenticatable implements HasTenants, FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

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
        'password',
        // 'role',
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
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
    public function getTenants(Panel $panel): Collection
    {
        // return $this->teams;
        return $this->teams()->get();
    }

    public function canAccessTenant(Model $tenant): bool
    {
        // return $this->teams()->contains($tenant);
        return $this->teams()->whereKey($tenant->id)->exists();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {

            'super_admin' => $this->hasRole('super_admin'),
            'admin' => $this->hasAnyRole(['tenant_owner', 'tenant_user']),
            default => false,
        };
    }
    // public function canAccessPanel(Panel $panel): bool
    // {
    //     return match ($panel->getId()) {
    //         'admin' => $this->hasAnyRole(['super_admin', 'tenant_owner', 'tenant_user']),
    //         default => false,
    //     };
    // }
    public function getDefaultTenant(Panel $panel): ?Model
    {
        return $this->teams()->first();
    }

}
