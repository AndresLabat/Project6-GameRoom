<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Room extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'game_id',
        'is_active',
        'timestamps',
    ];
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
    public function room_user()
    {
        return $this->hasMany(User::class);
    }
    public function messageToUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'messages');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}