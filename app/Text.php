<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
  protected $table = 'texts';

  protected $fillable = ['body'];

  public static function boot()
  {
    parent::boot();

    static::created(function($text){

      $text->get_user()->created_text_bonus();

    });//static::creating

    static::deleted(function($text){

      $text->get_user()->deleted_text_deduction();

    });//static::creating
  }
  }

  public function is_author($id)
  {
    return $this->section->is_author($id);
  }

  public function get_story()
  {
    return $this->section->get_story();
  }

  public function get_user()
  {
    return $this->section->get_user();
  }

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
