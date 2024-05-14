<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categoryStyle()
    {
        switch ($this->category) {
            case 'magas':
                return 'text-red-500'; // Adjust class names as needed
            case 'kozepes':
                return 'text-yellow-500';
            case 'alacsony':
                return 'text-green-500';
            default:
                return '';
        }
    }

}
