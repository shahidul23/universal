@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Query</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("query.update", $query->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" value="{{ $query->name }}" class="form-control" id="exampleFormControlInput1">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Phone</label>
                    <input type="number" name="phone" value="{{ $query->phone }}" class="form-control" id="exampleFormControlInput2">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput3">Email</label>
                    <input type="email" name="email" value="{{ $query->email }}" class="form-control" id="exampleFormControlInput3" >
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">address</label>
                    <input type="text" name="address" value="{{ $query->address }}" class="form-control" id="exampleFormControlInput4" >
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlSelect3">Query type</label>
                    <select class="form-control" name="query_type" id="exampleFormControlSelect3" required>
                        <option value="" >- Select query_type -</option>
                        <?php 
                          $query_type_dropdown=array('ipd service'=>'Ipd Service','opd service'=>'Opd Service', 'appointment'=>'Appointment', 'genetal query'=>'Genetal Query');
                          foreach ($query_type_dropdown as $key => $value) {
                              $selected="";
                              if($query->query_type==$key){
                                 $selected="selected";
                              }
                              echo "<option value='$key' $selected >$value</option>";
                              # code...
                          }
                        ?>                        
                    </select>
                </div>


                <div class="form-group col-6">
                    <label for="exampleFormControlSelect2">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect2" required>
                        <option value="" > - Select status - </option>
                        <?php 
                          $status_dropdown=array('complete'=>'Complete','hand over'=>'Hand over', 'pandding'=>'Pandding');
                          foreach ($status_dropdown as $key => $value) {
                              $selected="";
                              if($query->status==$key){
                                 $selected="selected";
                              }
                              echo "<option value='$key' $selected >$value</option>";
                              # code...
                          }
                        ?>                        
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Note</label>
                    <textarea class="form-control" name="note" value="{{ $query->note }}" id="exampleFormControlTextarea1" rows="3">{{ $query->note }}</textarea>                   
                </div> 
                {{-- <div class="form-group col-6">
                    <label for="exampleFormControlInput6">Regular price</label>
                    <input type="number" class="form-control" name="regular_price" id="exampleFormControlInput6" placeholder="Regular price" min="1" max="50000">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">query price</label>
                    <input type="number" class="form-control"  name="query_price" id="exampleFormControlInput7" placeholder="query price" min="1" max="50000">
                </div> --}}
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Edit</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection