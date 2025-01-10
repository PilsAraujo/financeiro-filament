<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Financial extends Model
{
    use SoftDeletes, HasFactory, Notifiable;
    
    protected $table = 'financials';
    protected $fillable = [
        'name',
        'description',
        'value',
        'type'
    ];
}
