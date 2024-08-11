<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('id', 'desc')->get();
        // $patients = DB::table('patients')
        // ->join('consultants', 'consultants.id', '=', 'patients.consultant_id')
        // ->select('consultants.name as con_name', 'patients.*')
        // ->get();
        // dd($patients);
        $consultants = Consultant::orderBy('id', 'desc')->get();
        
        // return view('pages.patient.index')->with('patients', $patients);
        return view('pages.patient.index', compact('patients', 'consultants'));
    }

    public function search(Request $request)
    {
      
      $consultant_id = $request->consultant_id;
      $department = $request->department;
      $from_date = $request->from_date;  
      $to_date = $request->to_date;
      
      $str = '';
      if($consultant_id!='')
      {
        $str .= " and patients.consultant_id ='$consultant_id' ";
      }
      if($department!='')
      {
        $str .= " and patients.department ='$department' ";
      }
      if($from_date!='')
      {
        $str .= " and DATE(patients.created_at) >= '$from_date' ";
      }
      if($to_date!='')
      {
        $str .= " and DATE(patients.created_at) <= '$to_date' ";
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
      $patients = DB::select("SELECT consultants.name as consultant_name, patients.* FROM patients LEFT JOIN consultants ON consultants.id= patients.consultant_id WHERE 1 $additional_query limit $start ,$length");
      $count_result = DB::select("SELECT count(*) as total FROM patients LEFT JOIN consultants ON consultants.id= patients.consultant_id WHERE 1 $additional_query ");  
      
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      
      $output=array();
      foreach($patients as $item){
        $id=$item->id;
        $view_button ="<a href='patient/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='patient/edit/$id' class='badge bg-secondary'>Edit</a>";
        $delete_button="<a href='patient/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->phone,$item->email,$item->address,$item->department,
        $item->consultant_name, "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
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
        $patients = DB::select("SELECT consultants.name as consultant_name, patients.* FROM patients LEFT JOIN consultants ON consultants.id= patients.consultant_id WHERE 1 $additional_query");;
        $pdf = PDF::loadView('pages.report.patient_pdf', compact('patients'));
    
        return $pdf->download('patient.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultants = Consultant::orderBy('id', 'desc')->get();
        return view('pages.patient.create')->with('consultants', $consultants);
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
            // 'consultant_id'   => 'required',
            'address'  => 'required',
            // 'email'      => 'required',
            // 'chamber_time'   => 'required|date:hh:mm',
            'phone'      => 'required|numeric',
          ]);      
          // Using Consultant Modle
          $patient = new Patient;
        //   dd($patient);
          $patient->name = $request->name;
          $patient->consultant_id = $request->consultant_id;
          $patient->department = $request->department;
          $patient->address = $request->address;
          $patient->email = $request->email;
          $patient->phone = $request->phone;
          $patient->save();          
          session()->flash('success', 'New Patient has added successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        $consultant = $patient->consultant_id;
        $consultant = Consultant::find($consultant);

      // return view('pages.patient.show')->with('patient', $patient);
      return view('pages.patient.show', compact('patient','consultant'));
    }

    public function showInfo($phone)
    {
      // dd($phone);
        // $patient = Patient::find($phone);
        $patient = DB::select("SELECT * FROM patients WHERE phone = $phone");
        $queries = DB::select("SELECT * FROM queries WHERE phone = $phone");
        // dd($patient);


      return view('pages.patient.showInfo')->with('patient', $patient)->with('queries', $queries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        $consultants = Consultant::orderBy('id', 'desc')->get();
        return view('pages.patient.edit')->with(compact('patient', 'consultants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'department'   => 'required',
            'consultant_id'   => 'required',
            'address'  => 'required',
            // 'email'      => 'required',
            // 'chamber_time'   => 'required|date:hh:mm',
            'phone'      => 'required|numeric',
          ]);      
          // Using Consultant Modle
          $patient = Patient::find($id);
        //   dd($patient);
          $patient->name = $request->name;
          $patient->consultant_id = $request->consultant_id;
          $patient->department = $request->department;
          $patient->address = $request->address;
          $patient->email = $request->email;
          $patient->phone = $request->phone;
          $patient->save();          
          session()->flash('success', 'Patient Edited successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function delete($id)
    {
        $patient = Patient::find($id);
      if (!is_null($patient)) {
        $patient->delete();
      }

      session()->flash('success', 'Patient has deleted successfully !!');

    //   return back();
    return redirect()->route('patients');
    }
}
