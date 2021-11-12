<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'social_id',
        'user_id',
        'content',
        'retweet_count'
    ];

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function social(): BelongsTo
    {
        return $this->belongsTo(Social::class);
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
