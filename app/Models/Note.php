<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

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

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
