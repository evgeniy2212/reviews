<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadWordTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'bad_word_translations';

    public $fillable = [
        'word',
    ];
}
