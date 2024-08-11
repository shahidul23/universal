@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add Package</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("package.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Package name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Validity</label>
                    {{-- <textarea class="form-control" name="validity" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    <input type="date" name="validity" class="form-control" id="exampleFormControlInput2" placeholder="validity">
                </div>
                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Details</label>
                    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
                    {{-- <input type="text" name="department" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                    {{-- <select class="form-control" name="department" id="exampleFormControlSelect3" placeholder="Department">
                        <option value=""disabled selected hidden>Department</option>
                        <option value="cardiologist">Cardiologist</option>
                        <option value="urologist">Urologist</option>
                        
                    </select> --}}
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Regular price</label>
                    <input type="number" class="form-control" name="regular_price" id="exampleFormControlInput4" placeholder="Regular price" min="1" max="50000">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Package price</label>
                    <input type="number" class="form-control"  name="package_price" id="exampleFormControlInput7" placeholder="Package price" min="1" max="50000">
                </div>
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add Package</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection