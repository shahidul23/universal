@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Detail of {{ $booking->name }}</h2>
    </div>
    <div class="card-body">
        <div class="card card-table-border-none" id="recent-orders">
        <table class="table table-responsive table-responsive-large" style="width:100%" id="sampleTable">           
            <tr>
                <th class="d-none d-md-table-cell">Name</th>
                <td>{{ $booking->name }}</td>
            </tr>                      
            <tr>
                <th class="d-none d-md-table-cell">Phone</th>
                <td>{{ $booking->phone }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Discount</th>
                <td>{{ $booking->discount }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Service type</th>
                <td>{{ $booking->service_type }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Service title</th>
                <td>{{ $booking->service_title }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Availed</th>
                <td>{{ $booking->availed }}</td>
            </tr>
            
            <tr>
                <th class="d-none d-md-table-cell">Created At</th>
                <td>{{ $booking->created_at }}</td>
            </tr>            
        </table>    
        </div>
        {{-- <div class="modal-body">
            <form action="{!! route('booking.delete', $booking->id) !!}"  method="get">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Permanent Delete</button>
            </form>
          </div> --}}
          <a href="#deleteModal{{ $booking->id }}" data-toggle="modal" class="mb-1 btn btn-block btn-danger" style="height: 20%; width: 20%;">Delete</a>
          <div class="modal fade" id="deleteModal{{ $booking->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="{!! route('booking.delete', $booking->id) !!}"  method="get">
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