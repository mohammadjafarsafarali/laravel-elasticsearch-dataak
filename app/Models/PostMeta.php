<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostMeta extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['post_id', 'key', 'value'];

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
