<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title', 'summary', 'body',
    ];

    protected $perPage = 10;

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('images');
    }

    public function setTitleAttribute(string $title): void
    {
        $this->attributes['title'] = $title;

        $this->slug = str_slug($title);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function viewPost(string $ip): void
    {
        $isViewed = $this->views()->where('user_ip', $ip)->exists();

        if (!$isViewed) {
            $this->views()->create(['user_id' => auth()->id(), 'user_ip' => $ip]);
        }
    }

}
