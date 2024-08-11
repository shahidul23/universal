@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Promotion</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("promotion.update", $promotion->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"  value="{{ $promotion->name }}">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Validity</label>
                    {{-- <textarea class="form-control" name="validity" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    <input type="date" name="validity" class="form-control" id="exampleFormControlInput2" value="{{ $promotion->validity }}">
                </div>
                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Details</label>
                    <textarea class="form-control" name="details" id="exampleFormControlTextarea3" rows="5"> {{ $promotion->details }}</textarea>
                </div>
                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">Type</label>
                    <input type="text" name="type" class="form-control" id="exampleFormControlInput2" value="{{ $promotion->type }}">
                </div>
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Edit promotion</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection