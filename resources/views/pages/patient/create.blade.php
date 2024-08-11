@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add Patient</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("patient.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="patient name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput2" placeholder="phone">
                </div>

                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Consultent</label>
                    {{-- <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    {{-- <input type="text" name="department" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                    <select class="form-control" name="consultant_id" id="exampleFormControlSelect3">
                        <option value=""disabled selected hidden>Consultent</option>
                        @foreach ($consultants as $consultant)
                            
                        <option value="{{ $consultant->id }}">{{ $consultant->name }}</option>
                        @endforeach
                        {{-- <option value="urologist">Urologist</option> --}}
                        
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput3">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput3" placeholder="address">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput4" placeholder="email">
                </div>

                {{-- <div class="form-group col-6">
                    <label for="exampleFormControlInput5">department</label>
                    <input type="text" name="department" class="form-control" id="exampleFormControlInput5" placeholder="department">
                </div> --}}
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect5">Department</label>
                    {{-- <input type="text" name="department" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                    <select class="form-control" name="department" id="exampleFormControlSelect5" placeholder="Department">
                        <option value=""disabled selected hidden>Department</option>
                        <option value="cardiologist">Cardiologist</option>
                        <option value="urologist">Urologist</option>
                        <option value="gynecology">Gynecology</option>
                        
                    </select>
                </div>

                {{-- <div class="form-group col-6">
                    <label for="exampleFormControlInput6">Regular price</label>
                    <input type="number" class="form-control" name="regular_price" id="exampleFormControlInput6" placeholder="Regular price" min="1" max="50000">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">patient price</label>
                    <input type="number" class="form-control"  name="patient_price" id="exampleFormControlInput7" placeholder="patient price" min="1" max="50000">
                </div> --}}
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add patient</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection