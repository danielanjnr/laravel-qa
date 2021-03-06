<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    // comment
    protected $fillable = [
        'title',
        'body'
    ];

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function getUrlAttribute(){
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public function getStatusAttribute(){
        if($this->answers_count > 0){
            
            if($this->best_answer){
                return 'answered-accepted';
            }
            return 'answered';
        }
        return 'unanswered';
    }

}
