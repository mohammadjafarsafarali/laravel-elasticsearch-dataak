<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function usernames(): HasMany
    {
        return $this->hasMany(SocialUsername::class);
    }

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function socialPosts(): HasMany
    {
        return $this->hasMany(Social::class);
    }
}
