<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class User extends Model
{
    use HasFactory, SoftDeletes, ElasticquentTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'instagram_id', 'twitter_id', 'instagram_avatar', 'twitter_avatar'
    ];

    /**
     * @return string
     * @author mj.safarali
     */
    function getIndexName(): string
    {
        return 'user_index';
    }

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
