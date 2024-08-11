@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom " style="background: #f1f7f7;">
        <h2>Add Note</h2>
    </div>
    <div class="card-body" style="background: #f1f7f7;">
        <form action="{{ route("note.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="note name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Validity</label>
                    {{-- <textarea class="form-control" name="validity" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    <input type="date" name="validity" class="form-control" id="exampleFormControlInput2" placeholder="validity">
                </div>
                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Details</label>
                    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
                    
                </div>
                
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add Note</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection