@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add booking</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("booking.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="booking name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput2" placeholder="phone">
                </div>

                {{-- <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Consultent</label>
                    <select class="form-control" name="consultant_id" id="exampleFormControlSelect3">
                        <option value=""disabled selected hidden>Consultent</option>
                        @foreach ($consultants as $consultant)
                            
                        <option value="{{ $consultant->id }}">{{ $consultant->name }}</option>
                        @endforeach
                        
                        
                    </select>
                </div> --}}


                {{-- <div class="form-group col-6">
                    <label for="exampleFormControlInput5">department</label>
                    <input type="text" name="department" class="form-control" id="exampleFormControlInput5" placeholder="department">
                </div> --}}
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect5">Availed</label>
                    <select class="form-control" name="availed" id="exampleFormControlSelect5" placeholder="availed">
                        <option value=""disabled selected hidden>availed</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        
                        
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlSelect5">service_type</label>
                    {{-- <input type="text" name="service_type" class="form-control" id="exampleFormControlInput3" placeholder="service_type name"> --}}
                    <select class="form-control" name="service_type" id="exampleFormControlSelect5" placeholder="service_type">
                        <option value=""disabled selected hidden>service_type</option>
                        <option value="service_type1">service_type1</option>
                        <option value="service_type2">service_type2</option>
                        <option value="service_type3">service_type3</option>
                        
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlSelect6">service_title</label>
                    {{-- <input type="text" name="service_title" class="form-control" id="exampleFormControlInput3" placeholder="service_title name"> --}}
                    <select class="form-control" name="service_title" id="6" placeholder="service_title">
                        <option value=""disabled selected hidden>service_title</option>
                        <option value="service_title1">service_title1</option>
                        <option value="service_title2">service_title2</option>
                        <option value="service_title3">service_title3</option>
                        
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput6">Discount</label>
                    <input type="number" class="form-control" name="discount" id="exampleFormControlInput6" placeholder="discount" min="1" max="99">
                </div>               
                
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add booking</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection