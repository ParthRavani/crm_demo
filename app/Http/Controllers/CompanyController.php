<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

require_once app_path() . '/Helper/CommonUtility.php';


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'email|nullable',
            'website'=>'nullable|url',
            'logo'=>'image|mimes:jpeg,png,jpg,svg|dimensions:min_width=100,min_height=100',

        ]);

        $logo= '';
        if (!isEmpty($request->logo)) {
            //save image and generate path
            $files = $request->file('logo');
            $destinationPath = 'img/comp/'; // upload path
            // if(!is_dir($destinationPath)){
            //     //If Directory does not exist, then create it.
            //     mkdir($destinationPath, 0755);
            // }
            $logo = uniqid() . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $logo);
        }

        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => $request->get('website'),
            'logo' => $logo
        ]);
        $company->save();
        return redirect('/companies')->with('success', 'Company saved!');
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
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'nullable|email',
            'website'=>'nullable|url',
            'logo'=>'nullable',
        ]);

        $company = Company::find($id);
        $company->name =  $request->get('name');
        $company->email = $request->get('email');
        $company->website = $request->get('website');
        $company->logo = $request->get('logo');
        $company->save();

        return redirect('/companies')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('/companies')->with('success', 'Company deleted!');
    }
}
