<?php

namespace App;

use App\Notifications\Auth\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['email_verified_at'];

    public function markEmailAsVerified(): void
    {
        $this->forceFill(['email_verified_at' => now()])->save();
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function like(Post $post): void
    {
        $this->likes()->create(['post_id' => $post->id]);
    }

    public function unlike(Post $post): void
    {
        $this->likes()->where('post_id', $post->id)->delete();
    }

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }
}
