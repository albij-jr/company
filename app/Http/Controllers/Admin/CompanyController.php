<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ComapniesStoreRequest;
use App\Modules\Repository\CompanyRepository;

class CompanyController extends Controller
{

    public function __construct(CompanyRepository $companyRepository){
        $this->companyRepository = $companyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $companies = $this->companyRepository->getPaginatedData();
        return view('admin.companies.index',compact('user','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $formData = $request->all();
        $fileName="default.png";
        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());

            $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('public/images/companies'.'/'.$fileName, $img, 'public');
        }
        $formData['logo'] = $fileName;

        $this->companyRepository->create($formData);

        return redirect()->route('company.index')->withSuccess("successfully stored Company Information.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->findById($id);
        $user = auth()->user();
        return view('admin.companies.edit', compact('user','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $request->validate(
            ['email' => 'required|email|unique:companies,email,'.$id . ',company_id']
        );
        $company = $this->companyRepository->findById($id);
        $formData = $request->all();
        $formData= $request->only('name','email','website');
        if($request->has('logo')){

            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:5000|dimensions:min_width=100,min_height=100'
                ]);
            $image      = $request->file('logo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());

            $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('public/images/companies'.'/'.$fileName, $img, 'public');

            if(Storage::exists('public/images/companies'.'/'.$fileName)){
                Storage::delete('public/images/companies/' . $company->logo);
            }

            $formData['logo'] = $fileName;
        }
        $this->companyRepository->update($formData,$company->company_id);

        return redirect()->route('company.index')->withSuccess("Company information updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->companyRepository->delete($request->company_id);

        return redirect()->back()->withSuccess('Company Data Sucessfully deleted');
    }
}
