<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * table name
     * @var string
     */
    protected $table = "categories";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    /**
     * relation between category and news
     * @return HasMany
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id','id');
    }

    /**
     *  class HasMany childs
     */
    public function child(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
