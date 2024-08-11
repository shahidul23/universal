@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Detail of {{ $promotion->name }}</h2>
    </div>
    <div class="card-body">
        <div class="card card-table-border-none" id="recent-orders">
        <table class="table table-responsive table-responsive-large" style="width:100%" id="sampleTable">           
            <tr>
                <th class="d-none d-md-table-cell">Name</th>
                <td>{{ $promotion->name }}</td>
            </tr>                      
            <tr>
                <th class="d-none d-md-table-cell">Details</th>
                <td>{{ $promotion->details }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Validity</th>
                <td>{{ $promotion->validity }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Type</th>
                <td>{{ $promotion->type }}</td>
            </tr>
                      
        </table>    
        </div>
        {{-- <div class="modal-body">
            <form action="{!! route('promotion.delete', $promotion->id) !!}"  method="get">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Permanent Delete</button>
            </form>
          </div> --}}<a href="#deleteModal{{ $promotion->id }}" data-toggle="modal" class="mb-1 btn btn-block btn-danger" style="height: 20%; width: 20%;">Delete</a>
        <div class="modal fade" id="deleteModal{{ $promotion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('promotion.delete', $promotion->id) !!}"  method="get">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Permanent Delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection