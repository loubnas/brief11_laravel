<?php

namespace App\Models;
use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Commentaire extends Model
{
    use HasFactory;
    public function Film(){

        return $this->belongsTo("App\Models\Film");
    }
    public function User(){

        return $this->belongsTo("App\Models\User");
    }

}
