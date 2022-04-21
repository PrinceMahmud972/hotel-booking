<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roomType()
    {
       return $this->belongsTo(RoomType::class, 'room_type_id');
    }

   

}
