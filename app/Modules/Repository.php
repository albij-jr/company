<?php
namespace App\Modules;
class Repository {
    public $dbModel;

    public function __construct(){}

    public function findById($id){
        return $this->dbModel->findOrFail($id);
    }


    public function where($array){
        return $this->dbModel->where($array)->get();
    }

    public function create($array){
        return $this->dbModel->create($array);
    }

    public function delete($id){
        $item = $this->findById($id);
        $item->delete();
    }


    public function update($array,$id){
        $entity = $this->findById($id);
        $entity->update($array);
        return $entity;
    }
}
?>
