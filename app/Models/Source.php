<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Source extends Model
{
    use ElasticquentTrait, HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'url'
    ];

    /**
     * @return string
     * @author mj.safarali
     */
    function getIndexName(): string
    {
        return 'source_index';
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
