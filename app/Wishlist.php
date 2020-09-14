<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'naam', 'plaatje', 'beschrijving', 'prijs', 'link',
    ];
}
