<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";

    protected $primaryKey = "employee_id";

    protected $fillable = [
        'first_name',
        'last_name',
        'fk_company_id',
        'email',
        'phone'
    ];



    /**
     *
     * @return relationships_of_employee_table
     *
     */
    public function company(){
        return $this->belongsTo(Company::class,'fk_company_id','company_id');
    }
}
