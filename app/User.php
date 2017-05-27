<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'portrait', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function boot()
    {
      parent::boot();

      static::creating(function($user){
        $user->activation_token = str_random(30);
      });
    }

    static public function lastest($n)
    {
      $user = new static;
      return $user->orderBy('created_at', 'desc')->paginate($n);
    }

    public function has_story()
    {
      return count($this->stories);
    }

    public function stories()
    {
      return $this->hasMany('App\Story');
    }

    public function galleries()
    {
      return $this->hasMany('App\Gallery');
    }

    public function ups()
    {
      return $this->hasMany('App\Up');
    }

    public function scores()
    {
      return $this->hasMany('App\Score');
    }

    public function posters()
    {
      return $this->hasManyThrough('App\Poster', 'App\Story');
    }

    public function settings()
    {
      return $this->hasManyThrough('App\Setting', 'App\Story');
    }

    public function sketches()
    {
      return $this->hasManyThrough('App\Sketch', 'App\Story');
    }

    public function drafts()
    {
      return $this->hasManyThrough('App\Draft', 'App\Story');
    }

    public function sections()
    {
      return $this->hasManyThrough('App\Section', 'App\Story');
    }

    public function texts()
    {
      return $this->hasManyThrough('App\Text', 'App\Story');
    }

    public function webtoons()
    {
      return $this->hasManyThrough('App\Webtoon', 'App\Story');
    }

    public function multiple_frames()
    {
      return $this->hasManyThrough('App\MultipleFrame', 'App\Story');
    }
}
