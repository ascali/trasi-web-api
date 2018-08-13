<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * summary
     */
    /**
    * Table database
    */
    protected $table = 'news';
    protected $primaryKey = 'news_id';

    protected $fillable = [
      'category', 'title', 'main', 'image', 'created_by', 'updated_by',
    ];

}