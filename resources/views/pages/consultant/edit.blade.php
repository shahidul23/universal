@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Consultant</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("admin.consultant.update", $consultant->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
              <div class="form-group col-6">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="text" name="name" class="form-control"  value="{{ $consultant->name }}">
                  {{-- <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Consultant name"> --}}
              </div>
              
              <div class="form-group col-6">
                  <label for="exampleFormControlInput2">Designation</label>
                  {{-- <textarea class="form-control" name="designation" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                  <input type="text" name="designation" class="form-control" value="{{ $consultant->designation }}">
              </div>
              <div class="form-group col-6">
                  <label for="exampleFormControlSelect3">Department</label>
                  {{-- <input type="text" name="department" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                  <select class="form-control" name="department" id="exampleFormControlSelect3" required>
                      {{-- <option value=""disabled selected hidden>{{ $consultant->department }}</option> --}}
                      <option value="" >--select Department--</option>
                      <?php 
                        $department_dropdown=array('Cardiologist'=>'Cardiologist','Urologist'=>'Urologist','Anesthesiologist'=>'Anesthesiologist');
                        foreach ($department_dropdown as $key => $value) {
                            $selected="";
                            if($consultant->department==$key){
                               $selected="selected";
                            }
                            echo "<option value='$key' $selected >$value</option>";
                            # code...
                        }
                      ?>
                      
                  </select>
              </div>
              <div class="form-group col-6">
                  <label for="exampleFormControlInput4">Degree</label>
                  <input type="text" class="form-control" name="degree" value="{{ $consultant->degree }}">
              </div>
              <div class="form-group col-6">
                  <label for="exampleFormControlInput5">Saturday</label>
                  {{-- {{ $consultant->saturday_chamber_time }} --}}
                  <input type="time" class="form-control"  name="saturday_chamber_time" value="{{ $consultant->saturday_chamber_time }}">
              </div>
              <div class="form-group col-6">
                  <label for="exampleFormControlInput6">Sunday</label>
                  {{-- {{ $consultant->sunday_chamber_time }} --}}
                  <input type="time" class="form-control"  name="sunday_chamber_time" value="{{ $consultant->sunday_chamber_time }}">
              </div>
              <div class="form-group col-6">
                <label for="exampleFormControlInput7">Monday</label>
                <input type="time" class="form-control"  name="monday_chamber_time" value="{{ $consultant->monday_chamber_time }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">Tuesday</label>
                <input type="time" class="form-control"  name="tuesday_chamber_time" value="{{ $consultant->tuesday_chamber_time }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">Wednesday</label>
                <input type="time" class="form-control"  name="wednesday_chamber_time" value="{{ $consultant->wednesday_chamber_time }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">Thursday</label>
                <input type="time" class="form-control"  name="thursday_chamber_time" value="{{ $consultant->thursday_chamber_time }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">Friday</label>
                <input type="time" class="form-control"  name="friday_chamber_time" value="{{ $consultant->friday_chamber_time }}">
            </div>
            
              <div class="form-group col-6">
                  <label for="exampleFormControlInput12">Fee</label>
                  <input type="number" class="form-control"  name="fee" value="{{ $consultant->fee }}">
              </div>
          </div>
          
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Consultant Update</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection