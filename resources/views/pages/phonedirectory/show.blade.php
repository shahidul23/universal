@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Detail of {{ $phonedirectory->name }}</h2>
    </div>
    <div class="card-body">
        <div class="card card-table-border-none" id="recent-orders">
        <table class="table table-responsive table-responsive-large" style="width:100%" id="sampleTable">           
            <tr>
                <th >Name</th>
                <td>{{ $phonedirectory->name }}</td>
            </tr>                      
            <tr>
                <th >Department</th>
                <td>{{ $phonedirectory->department }}</td>
            </tr>
            <tr>
                <th >Unit Name</th>
                <td>{{ $phonedirectory->unit_name }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Unit Pabx Number</th>
                <td>{{ $phonedirectory->unit_pabx_number }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Corporate Number</th>
                <td>{{ $phonedirectory->corporate_number }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Unit Cell Number</th>
                <td>{{ $phonedirectory->unit_cell_number }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Personal Number</th>
                <td>{{ $phonedirectory->personal_number }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Alternative Number</th>
                <td>{{ $phonedirectory->alternative_number }}</td>
            </tr>           
        </table>    
        </div>
        {{-- <div class="modal-body">
            <form action="{!! route('phonedirectory.delete', $phonedirectory->id) !!}"  method="get">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Permanent Delete</button>
            </form>
          </div> --}}
          <a href="#deleteModal{{ $phonedirectory->id }}" data-toggle="modal" class="mb-1 btn btn-block btn-danger" style="height: 20%; width: 20%;">Delete</a>
          <div class="modal fade" id="deleteModal{{ $phonedirectory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="{!! route('phonedirectory.delete', $phonedirectory->id) !!}"  method="get">
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