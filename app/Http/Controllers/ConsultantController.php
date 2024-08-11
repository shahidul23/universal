<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Booking;
use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultants = Consultant::orderBy('id', 'desc')->get();
        // foreach($consultants as $item){
        //   print_r($item);   
        //   echo "<br><br><br>";    
        // }

        $totalBookings = Booking::where('created_at', '>', Carbon::now()->subDays(1))
                                ->count();
                                                      
        $notavailedBookings = Booking::where('created_at', '>', Carbon::now()->subDays(1))
                                        ->where('availed', '=', 'no')
                                        ->count();

        $availedBookings = Booking::where('created_at', '>', Carbon::now()->subDays(1))
        ->where('availed', '=', 'yes')
        ->count();

        $totalQuery = Query::where('created_at', '>', Carbon::now()->subDays(1))
                                ->count();
        
        $completedQuery = Query::where('created_at', '>', Carbon::now()->subDays(1))
        ->where('status', '=', 'complete')
        ->count();
        $panddingQuery = Query::where('created_at', '>', Carbon::now()->subDays(1))
        ->where('status', '=', 'pandding')
        ->count();
        $handoverQuery = Query::where('created_at', '>', Carbon::now()->subDays(1))
        ->where('status', '=', 'hand over')
        ->count();
        // $notavailedBookings = Booking::select('name')
        // ->where('created_at', '>', Carbon::now()->subDays(1))
        // ->where('availed', '=', 'no');
        // // ->count();
        // ->groupBy(\DB::raw('HOUR(created_at)'))
        // $totalBookings = DB::table('bookings') // write your table name
        //  ->selectRaw('count(id) as total_Bookings') // use your field for count
        //  ->where('created_at', '>', Carbon::now()->subDays(1))
        //  ->groupBy(\DB::raw('HOUR(created_at)'))
        //  ->get();
        $current = Carbon::now();
        // echo $current;
        // dd($current);
        //  dd($notavailedBookings);


        return view('pages.consultant.index')->with('consultants', $consultants)
        ->with('totalBookings', $totalBookings)
        ->with('availedBookings', $availedBookings)
        ->with('totalQuery', $totalQuery)
        ->with('completedQuery', $completedQuery)
        ->with('panddingQuery', $panddingQuery)
        ->with('handoverQuery', $handoverQuery)
        ->with('notavailedBookings', $notavailedBookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.consultant.create');
    }

    public function search(Request $request)
    {
      
      $department = $request->department;
      $designation = $request->designation;  
      $saturday_chamber_time = $request->saturday_chamber_time;
      $sunday_chamber_time = $request->sunday_chamber_time;
      $monday_chamber_time = $request->monday_chamber_time;
      $tuesday_chamber_time = $request->tuesday_chamber_time;
      $wednesday_chamber_time = $request->wednesday_chamber_time;
      $thursday_chamber_time = $request->thursday_chamber_time;
      $friday_chamber_time = $request->friday_chamber_time;
      $str = '';
      if($department!='')
      {
        $str .= " and department ='$department' ";
      }
      if($designation!='')
      {
        $str .= " and designation ='$designation' ";
      }
      if($saturday_chamber_time!='')
      {
        $str .= " and saturday_chamber_time ='$saturday_chamber_time' ";
      }
      if($sunday_chamber_time!='')
      {
        $str .= " and sunday_chamber_time ='$sunday_chamber_time' ";
      }
      if($monday_chamber_time!='')
      {
        $str .= " and monday_chamber_time ='$monday_chamber_time' ";
      }
      if($tuesday_chamber_time!='')
      {
        $str .= " and tuesday_chamber_time ='$tuesday_chamber_time' ";
      }
      if($wednesday_chamber_time!='')
      {
        $str .= " and wednesday_chamber_time ='$wednesday_chamber_time' ";
      }
      if($thursday_chamber_time!='')
      {
        $str .= " and thursday_chamber_time ='$thursday_chamber_time' ";
      }
      if($friday_chamber_time!='')
      {
        $str .= " and friday_chamber_time ='$friday_chamber_time' ";
      }
      

      
      // if($chamber_time!='')
      // {
      //   $str .= " and chamber_time ='$chamber_time' ";
      // }     

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
      
      $consultants = DB::select("SELECT * FROM consultants WHERE 1 $additional_query limit $start ,$length");
      
      //$recordsTotal = Consultant::select('id')->get()->count();
      $count_result = DB::select("SELECT count(*) as total FROM consultants WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      // dd($count_result);
      // print_r($count_result);
      
      $output=array();
      foreach($consultants as $item){
        $id=$item->id;
        $view_button ="<a href='consultant/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='consultant/edit/$id' class='badge bg-secondary'>Edit</a>";
        $delete_button="<a href='consultant/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->department,$item->designation,$item->degree,$item->fee,$item->saturday_chamber_time,
        $item->sunday_chamber_time,$item->monday_chamber_time,$item->tuesday_chamber_time,$item->wednesday_chamber_time,
        $item->thursday_chamber_time,$item->friday_chamber_time, "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validation
        $request->validate([
        'name'         => 'required|max:150',
        'department'   => 'required',
        'designation'  => 'required',
        'degree'      => 'required',
        
        'fee'      => 'required|numeric',
      ]);
  
      // Using Consultant Modle
      $consultant = new Consultant;
    
      $consultant->name = $request->name;
      $consultant->department = $request->department;
      $consultant->designation = $request->designation;
      $consultant->degree = $request->degree;
      $consultant->saturday_chamber_time = $request->saturday_chamber_time;
      $consultant->sunday_chamber_time = $request->sunday_chamber_time;
      $consultant->monday_chamber_time = $request->monday_chamber_time;
      $consultant->tuesday_chamber_time = $request->tuesday_chamber_time;
      $consultant->wednesday_chamber_time = $request->wednesday_chamber_time;
      $consultant->thursday_chamber_time = $request->thursday_chamber_time;
      $consultant->friday_chamber_time = $request->friday_chamber_time;

      $consultant->fee = $request->fee;
    
      $consultant->save();
      
      session()->flash('success', 'New Consultant has added successfully !!');
  
      // return redirect()->route('admin.products');
      return redirect()->route('admin.consultants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $consultant = Consultant::find($id);

      return view('pages.consultant.show')->with('consultant', $consultant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $consultant = Consultant::find($id);
      return view('pages.consultant.edit')->with('consultant', $consultant);
        // return view('pages.consultant.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
          'name'         => 'required|max:150',
          'department'   => 'required',
          'designation'  => 'required',
          'degree'      => 'required',
          // 'chamber_time'   => 'required|date:hh:mm',
          'fee'      => 'required|numeric',
        ]);
          
        $consultant = Consultant::find($id);
        $consultant->name = $request->name;
        $consultant->department = $request->department;
        $consultant->designation = $request->designation;
        $consultant->degree = $request->degree;  
        $consultant->saturday_chamber_time = $request->saturday_chamber_time;
        $consultant->sunday_chamber_time = $request->sunday_chamber_time;
        $consultant->monday_chamber_time = $request->monday_chamber_time;
        $consultant->tuesday_chamber_time = $request->tuesday_chamber_time;
        $consultant->wednesday_chamber_time = $request->wednesday_chamber_time;
        $consultant->thursday_chamber_time = $request->thursday_chamber_time;
        $consultant->friday_chamber_time = $request->friday_chamber_time;
        $consultant->fee = $request->fee;
;
        $consultant->save();
        session()->flash('success', 'Consultant Updated successfully !!');

        return redirect()->route('admin.consultants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $consultant = Consultant::find($id);
      if (!is_null($consultant)) {
        $consultant->delete();
      }

      session()->flash('success', 'consultant has deleted successfully !!');

      return redirect()->route('admin.consultants');
    }
}
