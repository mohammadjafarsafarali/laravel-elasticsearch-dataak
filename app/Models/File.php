<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'fileable',
        'type',
        'extension'
    ];


    /**
     * @return MorphTo
     * @author mj.safarali
     */
    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
