<?php

namespace App;

use App\HasImage;
use App\Cover;

class Story extends HasImage implements Sectionable
{

  protected $table = 'stories';

  protected $fillable = ['title', 'description'];

  public static function boot()
  {
    parent::boot();

    static::created(function($story){

      $story->get_user()->created_story_bonus();

    });//static::creating

    static::deleted(function($story){

      $story->get_user()->deleted_story_deduction();

    });//static::creating
  }

  public function plus_up()
  {
    $this->up = $this->up+1;
    $this->save();
  }

  public function minus_up()
  {
    $this->up = $this->up == 0?0:$this->up-1;
    $this->save();
  }

  public function save_cover($img, $user_id)
  {
    $path = $this->save_covers($img, $this->make_covers_dir($user_id));

    $cover = new Cover($path);

    $this->covers()->save($cover);
  }

  public function update_cover($img)
  {
    if($img)
    {
      $directory = $this->make_covers_dir(Auth::id());
      $path = $this->update_covers($img, $directory);
      $this->covers()->first()->update($path);
    }
  }

  public function get_title()
  {
    return '《'.$this->title.'》';
  }

  static public function lastest($n)
  {
    $story = new static;
    return $story->orderBy('created_at', 'desc')->paginate($n);
  }

  public function user_uped($id)
  {
    return (boolean)$this->ups()->where('user_id', $id)->first();
  }

  public function is_author($id)
  {
    return $this->user_id === $id;
  }

  public function get_user()
  {
    return $this->user;
  }

  public function get_score()
  {
    return $this->score;
  }

  public function set_score($score)
  {
    $this->score = $score;
    return $this->save();
  }

  /*
  *Eloguent functions
  */

  public function user()
  {
    return $this->belongsTo('App\User');
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
    return $this->morphMany('App\Section', 'imageable');
  }

  public function volums()
  {
    return $this->hasMany('App\Volum');
  }

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }

  public function ups()
  {
    return $this->morphMany('App\Up', 'imageable');
  }
}
