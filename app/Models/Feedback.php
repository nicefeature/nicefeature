<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'description',
        'board_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
