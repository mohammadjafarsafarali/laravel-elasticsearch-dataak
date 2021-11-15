<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ArticleMeta extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['article_id', 'key', 'value'];

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
