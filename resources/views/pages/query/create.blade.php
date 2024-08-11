@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom" style="background: #f1f7f7;">
        <h2>Add Query</h2>
    </div>
    <div class="card-body" style="background: #f1f7f7;">
        <form action="{{ route("query.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="query name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput2" placeholder="phone">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput3">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput3" placeholder="Email">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput4" placeholder="address">
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
                {{-- <div class="form-group col-6">
                    <label for="exampleFormControlSelect5">availability</label>
                    <select class="form-control" name="availability" id="exampleFormControlSelect5" placeholder="availability">
                        <option value=""disabled selected hidden>availability</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>  
                    </select>
                </div> --}}

                <div class="form-group col-6">
                    <label for="exampleFormControlSelect5">Query Type</label>
                    <select class="form-control" name="query_type" id="exampleFormControlSelect5">
                        <option value=""disabled selected hidden>Query Type</option>
                        <option value="Ipd Service">Ipd Service</option>
                        <option value="opd service">Opd Service</option>
                        <option value="Opd Service">Appointment</option>
                        <option value="Genetal Query">Genetal Query</option>
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlSelect6">Status</label>
                    <select class="form-control" name="status" id="6" placeholder="status">
                        <option value=""disabled selected hidden>status</option>
                        <option value="Complete">Complete</option>
                        <option value="Hand Over">Hand over</option>
                        <option value="Pandding">Pandding</option>                        
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Note</label>
                    <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>                   
                </div>             
                
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add query</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection