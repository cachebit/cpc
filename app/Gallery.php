<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table = 'galleries';

  public function get_content()
  {
    $belong = $this->imageable;

    if($belong instanceof \App\Story){

    }elseif($belong instanceof \App\Draft){
      echo '<h3>'.$belong->title.'</h3><p>'.$belong->description.'</p><hr/><p>'.$belong->content.'</p>';
      return;
    }elseif($belong instanceof \App\Poster){
      echo '
      <div class="thumbnail">
        <img class="img-responsive" src="'.$belong->path.'"/>
        <div class="caption">
          <p>类型：海报</p>
        </div>
      </div>
      ';
      return;
    }elseif($belong instanceof \App\Setting){
      echo '<h3>'.$belong->title.'</h3><p>'.$belong->description.'</p><hr/><img class="img-responsive" src="'.$belong->path.'"/>';
      return;
    }elseif($belong instanceof \App\Sketch){
      echo '<h3>'.$belong->title.'</h3><p>'.$belong->description.'</p><hr/><img class="img-responsive" src="'.$belong->path.'"/>';
      return;
    }else{
      echo '<p>-获取内容失败-</p>';
      return;
    }
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function imageable()
  {
    return $this->morphTo();
  }
}
