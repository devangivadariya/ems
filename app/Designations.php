<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Department;

class Designations extends Model
{
 
    protected $table = 'designations';

    protected $fillable = [
        'designations',
      ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
