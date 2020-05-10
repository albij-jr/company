<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Repository\CompanyRepository;
use App\Modules\Repository\EmployeeRepository;

class DashboardController extends Controller
{

    public function __construct(EmployeeRepository $employeeRepository){
        $this->employeeRepository = $employeeRepository;
    }
    public function index(){
        $user = Auth::user();
        $employees = $this->employeeRepository->getPaginatedData();
        return view('admin.dashboard',compact('user','employees'));
    }
}
