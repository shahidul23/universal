<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::orderBy('id', 'desc')->get();
        return view('pages.promotion.index')->with('promotions', $promotion);
    }

    // Query build and data send for filtering

    public function search(Request $request)
    {
      
      $type = $request->type;
    //   $service_group = $request->service_group;  
    //   $chamber_time = $request->chamber_time;
      $str = '';
      if($type!='')
      {
        $str .= " and type ='$type' ";
      }
    //   if($service_group!='')
    //   {
    //     $str .= " and service_group ='$service_group' ";
    //   }
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
      
      $promotions = DB::select("SELECT * FROM promotions WHERE 1 $additional_query limit $start ,$length");
      
      //$recordsTotal = promotion::select('id')->get()->count();
      $count_result = DB::select("SELECT count(*) as total FROM promotions WHERE 1 $additional_query ");
      $recordsTotal = $count_result[0]->total;
      $recordsFiltered=$recordsTotal; //by default its equal to total record when no search applied
      // $c = {!! <td>
      //   <a href="{{ route('admin.promotion.show', $promotion->id) }}" class="badge bg-secondary">View</a>
      //   </td>e !!};
      
      $output=array();
      foreach($promotions as $item){
        // $output[]=array($item->name,$start,$length,$search['value'],$item->chamber_time,$item->chamber_schedule,$item->fee,$item->id);
        // $output[]=array($item->name,$item->department,$item->designation,$item->degree,$item->chamber_time,$item->chamber_schedule,$item->fee, '<a href="admin/show/4" class="badge bg-secondary">View</a>');
        $id=$item->id;
        $view_button ="<a href='promotion/show/$id' class='badge badge-success'>View</a>";
        $edit_button="<a href='promotion/edit/$id' class='badge bg-secondary'>Edit</a>";
        // $delete_button="<a href='promotion/delete/$id' class='badge badge-danger'>Delete</a>";
        $output[]=array($item->name,$item->type,$item->validity,$item->details, "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;");
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.promotion.create');
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
            'name' => 'required|max:200',
            'details' => 'required',
            'validity' => 'required',
        ]);

        $promotion = new Promotion;

        $promotion->name = $request->name;
        $promotion->type = $request->type;
        $promotion->details = $request->details;
        $promotion->validity = $request->validity;
        $promotion->save();
        session()->flash('success', 'New promotion has added successfully !!');
        return redirect()->route('promotions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);
        return view('pages.promotion.show')->with('promotion', $promotion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('pages.promotion.edit')->with('promotion', $promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:200',
            'details' => 'required',
            'validity' => 'required',
        ]);

        $promotion = Promotion::find($id);

        $promotion->name = $request->name;
        $promotion->type = $request->type;
        $promotion->details = $request->details;
        $promotion->validity = $request->validity;
        $promotion->save();
        session()->flash('success', 'Promotion Updated successfully !!');
        return redirect()->route('promotions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }

    public function delete($id)
    {
        $promotion = Promotion::find($id);
      if (!is_null($promotion)) {
        $promotion->delete();
      }

      session()->flash('success', 'promotion has deleted successfully !!');

      return redirect()->route('promotions');
    }
}
