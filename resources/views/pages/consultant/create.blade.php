@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom " style="background: #f1f7f7;">
        <h2>Add Consultant</h2>
    </div>
    <div class="card-body" style="background: #f1f7f7;">
        <form action="{{ route("admin.consultant.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Consultant name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Designation</label>
                    {{-- <textarea class="form-control" name="designation" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    <input type="text" name="designation" class="form-control" id="exampleFormControlInput2" placeholder="Designation">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect3">Department</label>
                    {{-- <input type="text" name="department" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                    <select class="form-control" name="department" id="exampleFormControlSelect3" placeholder="Department">
                        <option value=""disabled selected hidden>Department</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Urologist">Urologist</option>
                        <option value="Anesthesiologists">Anesthesiologists</option>
                        <option value="Radiologists">Radiologists</option>
                        <option value="Psychiatrists">Psychiatrists</option>
                        <option value="Emergency physicians">Emergency physicians</option>
                        
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Degree</label>
                    <input type="text" class="form-control" name="degree" id="exampleFormControlInput4" placeholder="Degree">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput5">Saturday Chamber Time</label>
                    <input type="time" class="form-control"  name="saturday_chamber_time" id="exampleFormControlInput5" placeholder="saturday_chamber_time">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput6">Sunday Chamber Time</label>
                    <input type="time" class="form-control"  name="sunday_chamber_time" id="exampleFormControlInput6" placeholder="sunday_chamber_time">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Monday Chamber Time</label>
                    <input type="time" class="form-control"  name="monday_chamber_time" id="exampleFormControlInput7" placeholder="monday_chamber_time">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput8">Tuesday Chamber Time</label>
                    <input type="time" class="form-control"  name="tuesday_chamber_time" id="exampleFormControlInput8" placeholder="tuesday_chamber_time">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput9">Wednesday Chamber Time</label>
                    <input type="time" class="form-control"  name="wednesday_chamber_time" id="exampleFormControlInput9" placeholder="wednesday_chamber_time">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput10">Thursday Chamber Time</label>
                    <input type="time" class="form-control"  name="thursday_chamber_time" id="exampleFormControlInput10" placeholder="thursday_chamber_time">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput11">Friday Chamber Time</label>
                    <input type="time" class="form-control"  name="friday_chamber_time" id="exampleFormControlInput11" placeholder="friday_chamber_time">
                </div>

                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput12">Fee</label>
                    <input type="number" class="form-control"  name="fee" id="exampleFormControlInput12" placeholder="fee">
                </div>
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add consultant</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection