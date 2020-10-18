<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataproject extends Model
{
    //
    protected $table = 'addproject';
    protected $filtable = ['project_name', 'users_id'];
    public function Datausers() {
        return $this->belongTo(Datausers::class, 'users_id');
    }
    

}
