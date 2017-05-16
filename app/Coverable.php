<?php

namespace App;

use vendor\symfony\http-foundation\File\UploadedFile;

interface Coverable
{
  public function is_img(UploadedFile $img);

  public function save_cover();

  public function move_img($img);
}
