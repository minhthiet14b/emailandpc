<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = ['pc_name','name','chinese_name','dep_id','email','ip','role','skype','zalo','webchat','line','publish','off_job'];
}
