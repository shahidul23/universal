<?php

namespace App\Http\Controllers;

use App\Models\PhoneDirectory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phonedirectories = PhoneDirectory::orderBy('id', 'desc')->get();
        
        return view('pages.phonedirectory.index')->with('phonedirectories', $phonedirectories);
    }

    // Query build and data send for filtering

    public function search(Request $request)
    {
      
      $unit_name = $request->unit_name;
      $personal_number = $request->personal_number;  
    //   $chamber_time = $request->chamber_time;
      $str = '';
      if($unit_name!='')
      {
        $str .= " and unit_name ='$unit_name' ";
      }
      if($personal_number!='')
      {
        $str .= " and personal_number ='$personal_number' ";
      }
    //   if($chamber_time!='')
    //   {
    //     $str .= " and chamber_time ='$chamber_time' ";
    //   }     

      $json_data = array(
            "additional_query" => $str, 
        );
      echo json_encode($json_data);
    }

    public function paging(Request $request)
    {
      // DataTable sends this draw, search, start, length
      $draw = $request->draw;
      $search = $request->search;
      $start = $request->start;
      $length = $request->length;

      // additional_query is the query string for filtering data 
      // form submit calles search which genarate this Query String 
      $additional_query = $request->additional_query;      
      
      $phonedirectory = DB::select("SELECT * FROM phone_directories WHERE 1 $additional_query limit $start ,$length");
      $count_result = DB::select("SELECT count(*) as total FROM phone_directories WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
           
      $output=array();
      foreach($phonedirectory as $item){
       
        $id=$item->id;
        $view_button ="<a href='phonedirectory/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='phonedirectory/edit/$id' class='badge bg-secondary'>Edit</a>";
        // $delete_button="<a href='phonedirectory/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->department,$item->unit_name,$item->unit_pabx_number,$item->corporate_number,$item->unit_cell_number,$item->personal_number,$item->alternative_number, "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
        
      }

      $json_data = array(
        "draw"            => $draw,   
        "recordsTotal"    => $recordsTotal,  
        "recordsFiltered" => $recordsFiltered,
        "data"            => $output   // total data array
        );
      echo json_encode($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('pages.phonedirectory.create');
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
            'department'   => 'required',
            'unit_name'  => 'required',
            // 'unit_pabx_number'      => 'numeric',
            // 'corporate_number'      => 'numeric',
            // 'unit_cell_number'      => 'numeric',
            // 'personal_number'      => 'numeric',
            // 'alternative_number'      => 'numeric',
          ]);      
          // Using service Modle
          $phonedirectory = new PhoneDirectory;
        //   dd($phonedirectory);
          $phonedirectory->name = $request->name;
          $phonedirectory->department = $request->department;
          $phonedirectory->unit_name = strtoupper($request->unit_name);
          $phonedirectory->unit_pabx_number = $request->unit_pabx_number;
          $phonedirectory->corporate_number = $request->corporate_number;
          $phonedirectory->unit_cell_number = $request->unit_cell_number;
          $phonedirectory->personal_number = $request->personal_number;
          $phonedirectory->alternative_number = $request->alternative_number;
          $phonedirectory->save();          
          session()->flash('success', 'New phonedirectory has added successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('phonedirectories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhoneDirectory  $phoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phonedirectory = PhoneDirectory::find($id);

      return view('pages.phonedirectory.show')->with('phonedirectory', $phonedirectory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneDirectory  $phoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phonedirectory = PhoneDirectory::find($id);
        return view('pages.phonedirectory.edit')->with('phonedirectory', $phonedirectory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhoneDirectory  $phoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'department'   => 'required',
            'unit_name'  => 'required',
            // 'unit_pabx_number'      => 'numeric',
            // 'corporate_number'      => 'numeric',
            // 'unit_cell_number'      => 'numeric',
            // 'personal_number'      => 'numeric',
            // 'alternative_number'      => 'numeric',
          ]);      
          // Using service Modle
          $phonedirectory = PhoneDirectory::find($id);
        //   dd($phonedirectory);
          $phonedirectory->name = $request->name;
          $phonedirectory->department = $request->department;
          $phonedirectory->unit_name = $request->unit_name;
          $phonedirectory->unit_pabx_number = $request->unit_pabx_number;
          $phonedirectory->corporate_number = $request->corporate_number;
          $phonedirectory->unit_cell_number = $request->unit_cell_number;
          $phonedirectory->personal_number = $request->personal_number;
          $phonedirectory->alternative_number = $request->alternative_number;
          $phonedirectory->save();          
          session()->flash('success', 'Updated successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('phonedirectories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhoneDirectory  $phoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneDirectory $phoneDirectory)
    {
        //
    }

    public function delete($id)
    {
        $phonedirectory = PhoneDirectory::find($id);
      if (!is_null($phonedirectory)) {
        $phonedirectory->delete();
      }

      session()->flash('success', 'phonedirectory has deleted successfully !!');

    //   return back();
    return redirect()->route('phonedirectories');
    }
}
