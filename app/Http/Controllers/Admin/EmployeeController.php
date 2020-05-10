<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;
use App\Modules\Repository\CompanyRepository;
use App\Modules\Repository\EmployeeRepository;
use App\Http\Controllers\Admin\EmployeeController;

class EmployeeController extends Controller
{

    private $companyRepository,$employeeRepository;

    public function __construct(CompanyRepository $companyRepository, EmployeeRepository $employeeRepository){
        $this->companyRepository = $companyRepository;
        $this->employeeRepository = $employeeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $companies = $this->companyRepository->getSelectCompany();
        $employees = $this->employeeRepository->getPaginatedData();

        return view('admin.employee.index',compact('user','companies', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $formData = $request->only('first_name','last_name','email','fk_company_id','phone');

        $data = $this->employeeRepository->create($formData);
        if($data != null){
            return response()->json(['message' => 'Employee Record added succesfully']);
        }else{
            return reponse()->json(['message' => 'Employee Record could not be added'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $request->validate([
            'email' =>'required|email|unique:employee,email,'.$id.',employee_id'
        ]);

        $formData = $request->only('first_name', 'last_name' , 'email' , 'phone' , 'fk_company_id');
        $status = $this->employeeRepository->update($formData,$id);
        if($status == true){
            return response()->json(['message' => 'Employee Record updated successfully.']);
        } else {
            return response()->json(['message' => 'cannot update employee record.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeeRepository->delete($id);
        return response()->json(['message' =>'Successfully deleted employee record']);
    }
}
