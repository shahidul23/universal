<?php

namespace App\Http\Controllers;

use App\Models\Query;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $querys = Query::orderBy('id', 'desc')->get();
        return view('pages.query.index')->with('querys', $querys);
    }

    public function search(Request $request)
    {
      
      $status = $request->status;
      // $name_corporate_under_bd = $request->name_corporate_under_bd;
      $from_date = $request->from_date;  
      $to_date = $request->to_date;
      
      $str = '';
      if($status!='')
      {
        $str .= " and status ='$status' ";
      }
      // if($name_corporate_under_bd!='')
      // {
      //   $str .= " and name_corporate_under_bd ='$name_corporate_under_bd' ";
      // }
      
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
      
      $queries = DB::select("SELECT * FROM queries WHERE 1 $additional_query limit $start ,$length");
      //$recordsTotal = query::select('id')->get()->count();
      $count_result = DB::select("SELECT count(*) as total FROM queries WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      
      $output=array();
      foreach($queries as $item){
        $id=$item->id;
        $view_button ="<a href='query/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='query/edit/$id' class='badge bg-secondary'>Edit</a>";
        $delete_button="<a href='query/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->phone,$item->query_type,
        $item->status,$item->created_by,"$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
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
        $queries = DB::select("SELECT * FROM queries WHERE 1 $additional_query");;
        $pdf = PDF::loadView('pages.report.query_pdf', compact('queries'));
    
        return $pdf->download('query.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.query.create');
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
            'phone'   => 'required|numeric',
            'query_type'  => 'required',
            'address'  => 'required',
            'status'      => 'required',
            'email'      => 'nullable',
            'note'      => 'required',
            
          ]);      
          // Using service Modle
          $query = new Query;       
          $query->name = $request->name;
          $query->query_type = $request->query_type;
          $query->address = $request->address;
          $query->phone = $request->phone;
          $query->status = $request->status;
          $query->note = $request->note;
          $query->created_by = Auth::user()->email;

          $query->save();          
            session()->flash('success', 'New query has added successfully !!');
          $phone = $request->phone;
        //   $patient = Patient::find($phone);
          $patient_q = DB::select("SELECT * FROM patients WHERE phone = $phone");
        //   if($patient){
        //       echo "not null";
        //   }
        
        // If Patient is new then save is is patients table
        if($patient_q == null){
              // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'address'  => 'required',
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
          // echo $patient;
          // dd($patient);
          $patient->save();          
          session()->flash('success', 'New Patient & New query has added successfully !!');
            // echo " null";
        }

          return redirect()->route('querys');
          // return redirect()->route('patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Query::find($id);
        return view('pages.query.show')->with('query', $query);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = query::find($id);
        return view('pages.query.edit')->with('query', $query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'phone'   => 'required|numeric',
            'query_type'  => 'required',
            'address'  => 'required',
            'status'      => 'required',
            'email'      => 'nullable',
            'note'      => 'required',
            
          ]);      
          // Using service Modle
          $query = Query::find($id);
        
          $query->name = $request->name;
          $query->query_type = $request->query_type;
          $query->address = $request->address;
          $query->phone = $request->phone;
          $query->email = $request->email;
          $query->status = $request->status;
          $query->note = $request->note;
                   
          $query->save();
          session()->flash('success', 'Updated successfully !!');      
          
        //   return redirect()->route('querys');
        return view('pages.query.show')->with('query', $query);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $query = Query::find($id);
      if (!is_null($query)) {
        $query->delete();
      }

      session()->flash('success', 'Query has deleted successfully !!');

      return redirect()->route('querys');
    }
}
