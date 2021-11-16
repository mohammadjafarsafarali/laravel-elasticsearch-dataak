<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Article extends Model
{
    use HasFactory, SoftDeletes, ElasticquentTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'source_id',
        'user_id',
        'title',
        'content',
    ];

    /**
     * @return string
     * @author mj.safarali
     */
    function getIndexName(): string
    {
        return 'article_index';
    }

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

    /**
     * @return HasMany
     * @author mj.safarali
     */
    public function properties(): HasMany
    {
        return $this->hasMany(ArticleMeta::class);
    }

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return MorphMany
     * @author mj.safarali
     */
    public function gallery(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
