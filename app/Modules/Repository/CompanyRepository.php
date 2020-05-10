<?php


namespace App\Modules\Repository;

use App\Models\Company;
use App\Modules\Repository;

class CompanyRepository extends Repository{

    public function __construct(){
        $this->dbModel = new Company();
    }

    public function getPaginatedData($items = 10){
        return $this->dbModel->paginate($items);
    }

    public function getSelectCompany(){
        return $this->dbModel->select('company_id','name')->get();
    }
}

?>
