<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public const SUPER_ADMIN = 1;
    public const MANAGER = 2;
    public const CONVOYOR = 3;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}