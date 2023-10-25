<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=[
        'message',
        'user_id'
      ];
      public function users(){
        return  $this->belongsToMany(User::class);
      }
  public function rooms(){
      return $this->belongsToMany(Room::class);
  }
  public function getMessageAttribute($value){
    return ucwords($value);
        }
        public function getCreatedAtAttribute($value){
    return Carbon::parse($value)->diffForHumans();
        }
}
