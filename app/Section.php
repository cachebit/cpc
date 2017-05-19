<?php

namespace App;

use App\HasImage;
use Auth;

class Section extends HasImage
{
  protected $table = 'sections';

  protected $fillable = ['title', 'description', 'volum'];

  public function is_author(User $user)
  {
    if($this->imageable instanceof \App\Story){
      return $user->id === $this->imageable->user_id;
    }elseif($this->imageable instanceof \App\Volum){
      return $user->id === $this->imageable->story->user_id;
    }else{
      return false;
    }
  }

  public function imageable()
  {
    return $this->morphTo();
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

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }
}
