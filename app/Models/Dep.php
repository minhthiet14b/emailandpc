<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Email;

class Dep extends Model
{
    use HasFactory;
    protected $fillable = ['name','publish'];

    public function depsemail(){
        return $this->hasMany(Email::class,'dep_id','id');
    }
}
