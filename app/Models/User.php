<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
        'photo',
        'role',
        'timestamps',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
    public function room_user()
    {
        return $this->hasMany(Room_user::class);
    }
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_user', 'user_id', 'room_id');
    }
    public function messageToRoom(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'messages');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}