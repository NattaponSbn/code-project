<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';
    protected $primaryKey = 'project_id';
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}
