<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'locked',
        'starred',
    ];

    public function isLocked(): bool
    {
        return $this->locked;
    }

    public function starred() : bool
    {
        return $this->starred;
    }
}
