<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * table name
     * @var string
     */
    protected $table = "settings";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name',
        'phone',
        'mobile',
        'email',
        'address',
        'logo',
        'favicon',
        'facebook_url',
        'telegram_url',
        'twitter_url',
    ];
}
