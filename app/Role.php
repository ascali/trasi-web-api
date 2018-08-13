<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * summary
     */
    /**
    * Table database
    */
    protected $table = 'roles';
    protected $primaryKey = 'role_id';

    protected $fillable = [
      'rolename', 'created_by', 'updated_by',
    ];

}