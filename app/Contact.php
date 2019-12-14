<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    protected $fillable = [
        'first_name', 'last_name', 'addr_line_1', 'addr_line_2', 'city', 'state', 'postal',
        'name', 'email', 'password',
    ];
}
