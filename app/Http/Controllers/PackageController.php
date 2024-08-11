<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('id', 'desc')->get();
        
        return view('pages.package.index')->with('packages', $packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'details'   => 'required',
            'validity'  => 'required',
            'regular_price'      => 'required',
            // 'chamber_time'   => 'required|date:hh:mm',
            'package_price'      => 'required|numeric',
          ]);      
          // Using Consultant Modle
          $package = new Package;
        //   dd($package);
          $package->name = $request->name;
          $package->details = $request->details;
          $package->validity = $request->validity;
          $package->regular_price = $request->regular_price;
          $package->package_price = $request->package_price;
          $package->save();          
          session()->flash('success', 'New package has added successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $package = Package::find($id);

      return view('pages.package.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('pages.package.edit')->with('package', $package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'details'   => 'required',
            'validity'  => 'required',
            'regular_price'      => 'required',
            // 'chamber_time'   => 'required|date:hh:mm',
            'package_price'      => 'required|numeric',
          ]);      
          // Using Consultant Modle
          $package = Package::find($id);
        //   dd($package);
          $package->name = $request->name;
          $package->details = $request->details;
          $package->validity = $request->validity;
          $package->regular_price = $request->regular_price;
          $package->package_price = $request->package_price;
          $package->save();          
          session()->flash('success', 'Package updated successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $package = Package::find($id);
      if (!is_null($package)) {
        $package->delete();
      }

      session()->flash('success', 'package has deleted successfully !!');

      return redirect()->route('packages');
    }
}
