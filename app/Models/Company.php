<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'serialNumber',
        'name',
        'contact',
        'address',
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class)->where('profile_id', Profile::company()->get()->first()->id);// Pourquoi tu fais ça ?
    }
}
