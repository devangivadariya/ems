<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Designations;
use App\Employees;

class Department extends Model
{
    

    protected $table = 'departments';

    protected $fillable = [
      'name',
    ];

    public function designations_r()
    {
      return $this->hasMany(Designations::class, 'department_id', 'id');
    }
    public function employees_r()
    {
      return $this->hasMany(Employees::class, 'department_id', 'id');
    }
}
