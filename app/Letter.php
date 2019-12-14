<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $table = "letters";
    protected $fillable=['id', 'created_at', 'updated_at', 'user_id', 'contact_id', 'content','sent','delivered'];
}
