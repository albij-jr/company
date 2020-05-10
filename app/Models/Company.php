<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table="companies";

    protected $primaryKey = "company_id";

    protected $fillable= [
        'name',
        'email',
        'logo',
        'website'
    ];


    public function employee(){
        return $this->hasMany(Employee::class,'company_id','fk_company_id');
    }

}
