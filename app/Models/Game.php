<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Game extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'category',
        'user_id'
    ]; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rooms():HasMany
    {
        return $this->hasMany(Room::class);
    }
 
}