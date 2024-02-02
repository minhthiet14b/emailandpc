<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Dep;
use App\Models\User;

class Email extends Model
{
    use HasFactory;
    protected $fillable = ['pc_name','name','chinese_name','dep_id','email','ip','role','skype','zalo','webchat','line','publish','off_job'];

    public function deps(){
        return $this->belongsTo(Dep::class,'dep_id','id');
    }
    public function users(){
        return $this->hasOne(User::class,'id','role');
    }
}
