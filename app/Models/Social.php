<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'posts_count'
    ];

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function instagrams(): HasMany
    {
        return $this->hasMany(Instagram::class);
    }

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function twitters(): HasMany
    {
        return $this->hasMany(Twitter::class);
    }

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function usernames(): HasMany
    {
        return $this->hasMany(SocialUsername::class);
    }
}
