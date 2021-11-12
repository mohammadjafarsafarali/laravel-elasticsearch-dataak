<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'source_id',
        'title',
        'content',
        'url',
    ];

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }
}
