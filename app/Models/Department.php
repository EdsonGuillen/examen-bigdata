<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
    protected $table = 'departments';
    protected $primaryKey = 'dept_no';
    protected $keyType = 'string'; // Porque dept_no es d001, d002...
    public $timestamps = false;

    public function employees() {
        return $this->belongsToMany(Employee::class, 'dept_emp', 'dept_no', 'emp_no');
    }
}
