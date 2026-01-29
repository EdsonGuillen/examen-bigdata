<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    protected $table = 'employees';
    protected $primaryKey = 'emp_no';
    public $timestamps = false;

    // Relación para el reporte 1.1.1 (Salario y Título actual)
    public function salaries() {
        return $this->hasMany(Salary::class, 'emp_no', 'emp_no');
    }

    public function departments() {
        return $this->belongsToMany(Department::class, 'dept_emp', 'emp_no', 'dept_no')
                    ->withPivot('from_date', 'to_date');
    }
}
