<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        
        return view('pages.service.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.service.create');
    }

    // Query build and data send for filtering

    public function search(Request $request)
    {
      
      $service_type = $request->service_type;
      $service_group = $request->service_group;  
    //   $chamber_time = $request->chamber_time;
      $str = '';
      if($service_type!='')
      {
        $str .= " and service_type ='$service_type' ";
      }
      if($service_group!='')
      {
        $str .= " and service_group ='$service_group' ";
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
      
      $services = DB::select("SELECT * FROM services WHERE 1 $additional_query limit $start ,$length");
      
      //$recordsTotal = service::select('id')->get()->count();
      $count_result = DB::select("SELECT count(*) as total FROM services WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      // $c = {!! <td>
      //   <a href="{{ route('admin.service.show', $service->id) }}" class="badge bg-secondary">View</a>
      //   </td>e !!};
      
      $output=array();
      foreach($services as $item){
        // $output[]=array($item->name,$start,$length,$search['value'],$item->chamber_time,$item->chamber_schedule,$item->fee,$item->id);
        // $output[]=array($item->name,$item->department,$item->designation,$item->degree,$item->chamber_time,$item->chamber_schedule,$item->fee, '<a href="admin/show/4" class="badge bg-secondary">View</a>');
        $id=$item->id;
        $view_button ="<a href='service/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='service/edit/$id' class='badge bg-secondary'>Edit</a>";
        $delete_button="<a href='service/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->service_type,$item->service_group,$item->price,$item->note, "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
        // $output[]=array($item->name,$item->department,$item->designation,$item->degree,$item->chamber_time,$item->chamber_schedule,$item->fee, "$view_button&nbsp;&nbsp&nbsp;&nbsp;$delete_button");
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
        // Validation
        $request->validate([
            'name'         => 'required|max:200',
            'service_type'   => 'required',
            'service_group'  => 'required',
            'note'      => 'required',
            // 'chamber_time'   => 'required|date:hh:mm',
            'price'      => 'required|numeric',
          ]);      
          // Using service Modle
          $service = new Service;
        //   dd($service);
          $service->name = $request->name;
          $service->service_type = $request->service_type;
          $service->price = $request->price;
          $service->service_group = $request->service_group;
          $service->note = $request->note;
          $service->save();          
          session()->flash('success', 'New service has added successfully !!');      
          // return redirect()->route('admin.products');
          return redirect()->route('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

      return view('pages.service.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('pages.service.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        // dd($request);

        $request->validate([
            'name'         => 'required|max:200',
            'service_type'   => 'required',
            'service_group'  => 'required',
            'note'      => 'required',
            // 'chamber_time'   => 'required|date:hh:mm',
            'price'      => 'required|numeric',
          ]);      
          // Using service Modle
          $service = Service::find($id);
        //   dd($service);
          $service->name = $request->name;
          $service->service_type = $request->service_type;
          $service->price = $request->price;
          $service->service_group = $request->service_group;
          $service->note = $request->note;
          $service->save();          
          session()->flash('success', 'Service updated successfully !!');

          return redirect()->route('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function delete($id)
    {
        $service = Service::find($id);
      if (!is_null($service)) {
        $service->delete();
      }

      session()->flash('success', 'service has deleted successfully !!');

      return redirect()->route('services');
    }
}
