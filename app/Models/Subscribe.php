<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['source_id', 'user_id', 'email'];

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     * @author mj.safarali
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);

    }
}
