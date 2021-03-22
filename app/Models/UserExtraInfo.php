<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExtraInfo extends Model
{
    use HasFactory;

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_extra_info_id');
    // }
    protected $casts = [
        'interet' => 'array',
        'education' => 'array',
        'skills' => 'array',
        'experience' => 'array',
        'languages' => 'array',
        'certifications' => 'array'
        ];
}
