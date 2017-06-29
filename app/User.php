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

    public function created_story_bonus()
    {
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+1;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！实践+1，经验+1，热情+1。');
      $this->save();
    }

    public function deleted_story_deduction()
    {
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-1;
      $this->passion = $this->passion<=0?0:$this->passion-1;

      session()->flash('warning', '删除成功！实践-1，经验-1，热情-1。');
      $this->save();
    }

    public function created_volum_bonus()
    {
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+1;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！实践+1，经验+1，热情+1。');
      $this->save();
    }

    public function deleted_volum_deduction()
    {
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-1;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！实践-1，经验-1，热情-1。');
      $this->save();
    }

    public function created_section_bonus()
    {
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+1;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！实践+1，经验+1，热情+1。');
      $this->save();
    }

    public function deleted_section_deduction()
    {
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-1;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！实践-1，经验-1，热情-1。');
      $this->save();
    }

    public function created_draft_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_draft_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$this->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_multiple_frame_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_multiple_frame_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_poster_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_poster_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_score_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_score_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_setting_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_setting_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_sketch_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_sketch_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_text_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_text_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function created_up_bonus()
    {
      $this->coins = $this->coins+1;
      $this->experience = $this->experience+1;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '成功点赞！金币+1，经验+1，热情+1。');
      $this->save();
    }

    public function deleted_up_deduction()
    {
      $this->coins = $this->coins-1;
      $this->experience = $this->experience-1;
      $this->passion = $this->passion<=0?0:$this->passion-1;

      session()->flash('warning', '取消点赞！金币-1，经验-1，热情-1。');
      $this->save();
    }

    public function created_webtoon_bonus()
    {
      $this->coins = $this->coins+3;
      $this->practice = $this->practice+1;
      $this->experience = $this->experience+3;
      $this->passion = $this->passion>=150?150:$this->passion+1;

      session()->flash('success', '创建成功！金币+3，实践+1，经验+3，热情+1。');
      $this->save();
    }

    public function deleted_webtoon_deduction()
    {
      $this->coins = $this->coins-3;
      $this->practice = $this->practice-1;
      $this->experience = $this->experience-3;
      $this->passion = $this->passion<=0?0:$user->passion-1;

      session()->flash('warning', '删除成功！金币-3，实践-1，经验-3，热情-1。');
      $this->save();
    }

    public function has_story()
    {
      return count($this->stories);
    }

    public function update_aesthetic()
    {
      $user_scores = $this->scores;

      $user_scores = $user_scores->filter(function ($item) {
        return !$item->gallery->scorable;
      });

      $n = count($user_scores);
      $sum = 0.00;
      if($n)
      {
        while(count($user_scores))
        {
          $user_score = $user_scores->shift();
          $score_final = $user_score->gallery->imageable->score;
          $sum+=abs(($user_score->score - $score_final)*100)/$score_final;
        }

        $this->aesthetic = round(1.5*(100.00 - $sum/$n), 2);
        $this->save();
        return true;

      }else{

        return false;

      }


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
