<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
        protected  $fillable=[
            'name',
            'description',
           'topic_id'
        ];
        public function user(){
            return  $this->belongsTo(User::class);
        }
        public function topic(){
            return   $this->belongsTo(Topic::class);
        }
       
        public function message(){
            return $this->hasMany(Message::class);
        }
        public function setNameAttribute($value){
            $this->attributes['name']=strtolower($value);
        }
        public function setDescAttribute($value){
            $this->attributes['description']=strtolower($value);
        }
        public function getNameAttribute($value){
    return ucwords($value);
        }
        public function getCreatedAtAttribute($value){
    return Carbon::parse($value)->diffForHumans();
        }
        public function getDescAttribute($value){
            return ucwords($value);
        }
        public function participants(){
            return $this->belongsToMany(User::class,'participants','room_id','user_id');
        }
}
