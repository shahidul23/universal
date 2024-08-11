<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporates = Corporate::orderBy('id', 'desc')->get();
        $phonedirectories = DB::select("SELECT * FROM phone_directories WHERE unit_name = 'BDO'");
          foreach($corporates as $corporate){
            if ($corporate->force_active = "NO" && $corporate->status = "Active")
            {            
            $validity_date = $corporate->agreement_validity_date;
            $current = Carbon::now();
              if($current>$validity_date)
              {
                $corporateObj = Corporate::find($corporate->id);
                $corporateObj->status = "Inactive";
                $corporateObj->save();                
              }
            }          
          }
          $corporates = Corporate::orderBy('id', 'desc')->get();       
        return view('pages.corporate.index')->with('corporates', $corporates)->with('phonedirectories', $phonedirectories);
        // return view('pages.test')->with('corporates', $corporates);
    }

    public function search(Request $request)
    {
      
      $status = $request->status;
      $name_corporate_under_bd = $request->name_corporate_under_bd;
      $from_date = $request->from_date;  
      $to_date = $request->to_date;
      
      $str = '';
      if($status!='')
      {
        $str .= " and status ='$status' ";
      }
      if($name_corporate_under_bd!='')
      {
        $str .= " and name_corporate_under_bd ='$name_corporate_under_bd' ";
      }
      
      if($from_date!='')
      {
        $str .= " and DATE(created_at) >= '$from_date' ";
      }
      if($to_date!='')
      {
        $str .= " and DATE(created_at) <= '$to_date' ";
      }
      // echo $str;

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
      
      $corporates = DB::select("SELECT * FROM corporates WHERE 1 $additional_query limit $start ,$length");
      //$recordsTotal = corporate::select('id')->get()->count();
      $count_result = DB::select("SELECT count(*) as total FROM corporates WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      // dd($count_result);
      // print_r($count_result);
      
      $output=array();
      foreach($corporates as $item){
        $id=$item->id;
        $view_button ="<a href='corporate/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='corporate/edit/$id' class='badge bg-secondary'>Edit</a>";
        $delete_button="<a href='corporate/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->address,$item->phone,$item->contact_person_name,$item->contact_person_phone,
        $item->industry_type,$item->agreement_validity_date,$item->status,"$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
      }

      $json_data = array(
        "draw"            => $draw,   
        "recordsTotal"    => $recordsTotal,  
        "recordsFiltered" => $recordsFiltered,
        "data"            => $output   // total data array
        );
      echo json_encode($json_data);
    }

    public function generatePDF($additional_query)
    {
        $corporates = DB::select("SELECT * FROM corporates WHERE 1 $additional_query");;
        $pdf = PDF::loadView('pages.report.corporate_pdf', compact('corporates'));
    
        return $pdf->download('corporate.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $phonedirectories = DB::select("SELECT * FROM phone_directories WHERE unit_name = 'BDO'");
        return view('pages.corporate.create')->with('phonedirectories', $phonedirectories);
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
        // dd($request);
        $request->validate([
            'name'         => 'required|max:200',
            'address'   => 'required',
            'phone'  => 'required|numeric',
            'contact_person_name'   => 'required',
            'contact_person_phone'   => 'required|numeric',
            'contact_person_whatsapp'  => 'numeric',
            'alter_contact_person_phone'   => 'nullable|numeric',
            'alter_contact_person_whatsapp'  => 'nullable|numeric',
            'industry_type'   => 'nullable|required',
            'agreement_validity_date'   => 'required|date',
            'ipd_discount'   => 'nullable|numeric',
            'covid_test_discount'  => 'nullable|numeric',
            'radiology_imaging_discount'   => 'nullable|numeric',
            'pathology_discount'   => 'nullable|numeric',
            // 'chamber_time'   => 'required|date:hh:mm',
          ]);      
          // Using Consultant Modle
          $corporate = new Corporate;
        //   dd($corporate);
          $corporate->name = $request->name;
          $corporate->address = $request->address;
          $corporate->phone = $request->phone;
          $corporate->contact_person_name = $request->contact_person_name;
          $corporate->contact_person_phone = $request->contact_person_phone;
          $corporate->contact_person_whatsapp = $request->contact_person_whatsapp;
          $corporate->contact_person_email = $request->contact_person_email;
          $corporate->alter_contact_person_name = $request->alter_contact_person_name;
          $corporate->alter_contact_person_phone = $request->alter_contact_person_phone;
          $corporate->alter_contact_person_whatsapp = $request->alter_contact_person_whatsapp;
          $corporate->alter_contact_person_email = $request->alter_contact_person_email;
          $corporate->industry_type = $request->industry_type;
          $corporate->agreement_date = $request->agreement_date;
          $corporate->agreement_validity_date = $request->agreement_validity_date;
          $corporate->name_corporate_under_bd = $request->name_corporate_under_bd;
          $corporate->pathology_discount = $request->pathology_discount;
          $corporate->radiology_imaging_discount = $request->radiology_imaging_discount;
          $corporate->ipd_discount = $request->ipd_discount;
          $corporate->covid_test_discount = $request->covid_test_discount;
          $corporate->privileged_service = $request->privileged_service;
          $corporate->cashless_service = $request->cashless_service;
          $corporate->status = $request->status;
          // $corporate->force_active = $request->force_active;

          $corporate->save();          
          session()->flash('success', 'New Corporate has added successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('corporates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corporate = Corporate::find($id);

      return view('pages.corporate.show')->with('corporate', $corporate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $phonedirectories = DB::select("SELECT * FROM phone_directories WHERE unit_name = 'BDO'");
        $corporate = Corporate::find($id);
        return view('pages.corporate.edit')->with('corporate', $corporate)->with('phonedirectories', $phonedirectories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        // dd($request);
        $request->validate([
            'name'         => 'required|max:200',
            'address'   => 'required',
            'phone'  => 'required|numeric',
            'contact_person_name'   => 'required',
            'contact_person_phone'   => 'required|numeric',
            'contact_person_whatsapp'  => 'numeric',
            'alter_contact_person_phone'   => 'nullable|numeric',
            'alter_contact_person_whatsapp'  => 'nullable|numeric',
            'industry_type'   => 'nullable|required',
            'agreement_validity_date'   => 'required|date',
            'ipd_discount'   => 'nullable|numeric',
            'covid_test_discount'  => 'nullable|numeric',
            'radiology_imaging_discount'   => 'nullable|numeric',
            'pathology_discount'   => 'nullable|numeric',
            // 'chamber_time'   => 'required|date:hh:mm',
          ]); 
          $phonedirectories = DB::select("SELECT * FROM phone_directories WHERE unit_name = 'BDO'");     
          // Using Consultant Modle
          $corporate = Corporate::find($id);
        //   dd($corporate);
          $corporate->name = $request->name;
          $corporate->address = $request->address;
          $corporate->phone = $request->phone;
          $corporate->contact_person_name = $request->contact_person_name;
          $corporate->contact_person_phone = $request->contact_person_phone;
          $corporate->contact_person_whatsapp = $request->contact_person_whatsapp;
          $corporate->contact_person_email = $request->contact_person_email;
          $corporate->alter_contact_person_name = $request->alter_contact_person_name;
          $corporate->alter_contact_person_phone = $request->alter_contact_person_phone;
          $corporate->alter_contact_person_whatsapp = $request->alter_contact_person_whatsapp;
          $corporate->alter_contact_person_email = $request->alter_contact_person_email;
          $corporate->industry_type = $request->industry_type;
          $corporate->agreement_date = $request->agreement_date;
          $corporate->agreement_validity_date = $request->agreement_validity_date;
          $corporate->name_corporate_under_bd = $request->name_corporate_under_bd;
          $corporate->pathology_discount = $request->pathology_discount;
          $corporate->radiology_imaging_discount = $request->radiology_imaging_discount;
          $corporate->ipd_discount = $request->ipd_discount;
          $corporate->covid_test_discount = $request->covid_test_discount;
          $corporate->privileged_service = $request->privileged_service;
          $corporate->cashless_service = $request->cashless_service;
          $corporate->force_active = strtoupper($request->force_active);

          $corporate->save();          
          session()->flash('success', 'New Corporate has added successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('corporates');
    }

    public function delete($id)
    {
        $corporate = Corporate::find($id);
      if (!is_null($corporate)) {
        $corporate->delete();
      }

      session()->flash('success', 'Corporate has deleted successfully !!');

      return redirect()->route('corporates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate $corporate)
    {
        //
    }
}
