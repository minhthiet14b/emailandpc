<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PcName extends Model
{
    use HasFactory;
    protected $fillable = ['network_name','ip_address','model','processor','total_HDD','operating_system','ram','hark_disk','motherboard_summary','description','current_user','status','monitors_summary','screen_size','year_used','location'];

}
