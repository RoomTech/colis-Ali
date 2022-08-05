<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Company;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'serialNumber',
        'firstName',
        'lastName',
        'email',
        'contact',
        'image',
        'profile_id',
        'company_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function managerPacks(): HasMany
    {
        return $this->hasMany(Pack::class)->latest();
    }

    public function isManager(): bool
    {
        return $this->profile->id == Profile::MANAGER ? true : false;
    }

    public function isConvoyor(): bool
    {
        return $this->profile->id == Profile::CONVOYOR ? true : false;
    }

    public function convoyeurColis(): Collection
    {
        if ($this->isConvoyor()) {
            $manager = User::where([
                'company_id' => $this->company_id,
                'profile_id' => Profile::MANAGER,
            ])->first();
            return $manager->managerPacks;
        }

        return Collect([]);
    }
}
