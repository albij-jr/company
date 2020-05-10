<?php

namespace App\Modules\Repository;

use App\Models\Employee;
use App\Modules\Repository;

class EmployeeRepository extends Repository{

    public function __construct(){
        $this->dbModel = new Employee();
    }


    public function getPaginatedData($items = 10){
        return $this->dbModel->paginate($items);
    }

}
?>
