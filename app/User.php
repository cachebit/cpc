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
    protected $fillable = ['name', 'character', 'portrait_path', 'prestige', 'experience', 'email', 'password'];

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

    public function stories()
    {
      return $this->hasMany('App\Story');
    }

    public function posters()
    {
      return $this->hasMany('App\Poster');
    }

    public function settings()
    {
      return $this->hasMany('App\Setting');
    }

    public function sketches()
    {
      return $this->hasMany('App\Sketch');
    }

    public function drafts()
    {
      return $this->hasMany('App\Draft');
    }

    public function sections()
    {
      return $this->hasMany('App\Section');
    }

    public function texts()
    {
      return $this->hasMany('App\Text');
    }

    public function webtoons()
    {
      return $this->hasMany('App\Webtoon');
    }

    public function multiple_frames()
    {
      return $this->hasMany('App\MultipleFrame');
    }
}
