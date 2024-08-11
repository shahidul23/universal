@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit service</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("phonedirectory.update", $phonedirectory->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $phonedirectory->name }}">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Department</label>
                    <input type="text" name="department" class="form-control" id="exampleFormControlInput2" value="{{ $phonedirectory->department }}">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Unit Name</label>
                    <input type="text" name="unit_name" class="form-control" id="exampleFormControlInput3" value="{{ $phonedirectory->unit_name }}">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Unit Pabx Number</label>
                    <input type="number" class="form-control"  name="unit_pabx_number" id="exampleFormControlInput4" value="{{ $phonedirectory->unit_pabx_number }}" min="1" max="999999999999999">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Corporate Number</label>
                    <input type="number" class="form-control"  name="corporate_number" id="exampleFormControlInput5" value="{{ $phonedirectory->corporate_number }}" min="1" max="999999999999999">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Unit Cell Number</label>
                    <input type="number" class="form-control"  name="unit_cell_number" id="exampleFormControlInput6" value="{{ $phonedirectory->unit_cell_number }}" min="1" max="999999999999999">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Personal Number</label>
                    <input type="number" class="form-control"  name="personal_number" id="exampleFormControlInput7" value="{{ $phonedirectory->personal_number }}" min="1" max="999999999999999">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Alternative Number</label>
                    <input type="number" class="form-control"  name="alternative_number" id="exampleFormControlInput8" value="{{ $phonedirectory->alternative_number }}" min="1" max="999999999999999">
                </div>
                
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Edit</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
