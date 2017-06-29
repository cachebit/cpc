<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model implements Scorable
{
  protected $table = 'drafts';

  protected $fillable = ['title', 'description', 'content'];

  public static function boot()
  {
    parent::boot();

    static::created(function($draft){

      $draft->get_user()->created_draft_bonus();

    });//static::creating

    static::deleted(function($draft){

      $draft->get_user()->deleted_draft_deduction();

    });//static::creating
  }

  static public function lastest()
  {
    $sketch = new static;
    return $sketch->orderBy('created_at', 'desc')->paginate(6);
  }

  public function is_author($id)
  {
    return $this->story->is_author($id);
  }

  public function get_user()
  {
    return $this->story->user;
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

  public function story()
  {
    return $this->belongsTo('App\Story');
  }

  public function ups()
  {
    return $this->morphMany('App\Up', 'imageable');
  }
}
