<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Query;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class BookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id', 'desc')->get();
        // foreach($bookings as $item){
        //   print_r($item);   
        //   echo "<br><br><br>";    
        // }
        return view('pages.booking.index')->with('bookings', $bookings);
    }

    public function search(Request $request)
    {
      
      $availed = $request->availed;
      $from_date = $request->from_date;  
      $to_date = $request->to_date;
      
      $str = '';
      if($availed!='')
      {
        $str .= " and availed ='$availed' ";
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
      
      $bookings = DB::select("SELECT * FROM bookings WHERE 1 $additional_query limit $start ,$length");
      //$recordsTotal = booking::select('id')->get()->count();
      $count_result = DB::select("SELECT count(*) as total FROM bookings WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      // dd($count_result);
      // print_r($count_result);
      
      $output=array();
      foreach($bookings as $item){
        $id=$item->id;
        $view_button ="<a href='booking/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='booking/edit/$id' class='badge bg-secondary'>Edit</a>";
        $delete_button="<a href='booking/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->phone,$item->service_type,$item->service_title,$item->availed,
         "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
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
        $bookings = DB::select("SELECT * FROM bookings WHERE 1 $additional_query");;
        $pdf = PDF::loadView('pages.report.booking_pdf', compact('bookings'));
    
        return $pdf->download('Booking.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.booking.create');
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
            'service_type'  => 'required',
            'service_title'  => 'required',
            'discount'      => 'nullable|numeric',
            'availed'      => 'required',
            
          ]);      
          // Using service Modle
          $booking = new Booking;
        
          $booking->name = $request->name;
          $booking->service_type = $request->service_type;
          $booking->service_title = $request->service_title;
          $booking->phone = $request->phone;
          $booking->discount = $request->discount;
          $booking->availed = strtoupper($request->availed);
        
          $booking->save();          
          session()->flash('success', 'New booking has added successfully !!');      
          
          return redirect()->route('bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $booking = Booking::find($id);
      return view('pages.booking.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('pages.booking.edit')->with('booking', $booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'phone'   => 'required|numeric',
            'service_type'  => 'required',
            'service_title'  => 'required',
            'discount'      => 'nullable|numeric',
            'availed'      => 'required',
            
          ]);      
          // Using service Modle
          $booking = Booking::find($id);
        
          $booking->name = $request->name;
          $booking->service_type = $request->service_type;
          $booking->service_title = $request->service_title;
          $booking->phone = $request->phone;
          $booking->discount = $request->discount;
          $booking->availed = $request->availed;
        
          $booking->save();          
          session()->flash('success', 'Updated successfully !!');      
          
        //   return redirect()->route('bookings');
        $booking = Booking::find($id);

        return view('pages.booking.show')->with('booking', $booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $booking = Booking::find($id);
      if (!is_null($booking)) {
        $booking->delete();
      }

      session()->flash('success', 'Booking has deleted successfully !!');

      return redirect()->route('bookings');
    }
}
