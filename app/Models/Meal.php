<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'registrations';

    protected $fillable = [
        'date',
        'note',  // text to be entered by the user, empty by default
        'user_id'
    ];

    public function User(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
