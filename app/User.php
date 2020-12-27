<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }

    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function follow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;
    
        if (!$existing && !$myself) {
            $this->followings()->attach($userId);
        }
    }
    
    public function unfollow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;
    

        if ($existing && !$myself) {
            $this->followings()->detach($userId);
        }
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Song::class, 'favorites', 'user_id', 'song_id')->withTimestamps();
    }

    public function favorite($songId)
    {
        $exist = $this->is_favorite($songId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($songId);
            return true;
        }
    }

    public function unfavorite($songId)
    {
        $exist = $this->is_favorite($songId);

        if($exist){
            $this->favorites()->detach($songId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($songId)
    {
        return $this->favorites()->where('song_id',$songId)->exists();
    }
}
