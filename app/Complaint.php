<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    /**
     * summary
     */
    /**
    * Table database
    */
    protected $table = 'complaints';
    protected $primaryKey = 'complaint_id';

    protected $fillable = [
      'user_id', 'complaint_type', 'in_charge_police', 'description', 'complaint_status', 'latitude', 'longitude', 'address', 'created_by', 'updated_by',
    ];

}