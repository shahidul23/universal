@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Detail of {{ $consultant->name }}</h2>
    </div>
    <div class="card-body">
        
        <div class="card card-table-border-none" id="recent-orders">
            <table class="table table-responsive table-responsive-large" style="width:100%" id="sampleTable">           
                <tr>
                    <th class="d-none d-md-table-cell">Name</th>
                    <td>{{ $consultant->name }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Details</th>
                    <td>{{ $consultant->details }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Designation</th>
                    <td>{{ $consultant->designation }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Department</th>
                    <td>{{ $consultant->department }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Degree</th>
                    <td>{{ $consultant->degree }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Fee</th>
                    <td>{{ $consultant->fee }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Saturday</th>
                    <td>{{ $consultant->saturday_chamber_time }}</td>
                    {{-- <td><input type="time" class="form-control"  name="saturday_chamber_time" value="{{ $consultant->saturday_chamber_time }}"></td> --}}
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Sunday</th>
                    <td>{{ $consultant->sunday_chamber_time }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Monday</th>
                    <td>{{ $consultant->monday_chamber_time }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Tuesday</th>
                    <td>{{ $consultant->tuesday_chamber_time }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Wednesday</th>
                    <td>{{ $consultant->wednesday_chamber_time }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Thursday</th>
                    <td>{{ $consultant->thursday_chamber_time }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Friday</th>
                    <td>{{ $consultant->friday_chamber_time }}</td>
                </tr>
            
                          
            </table>    
            </div>

        <a href="#deleteModal{{ $consultant->id }}" data-toggle="modal" class="mb-1 btn btn-block btn-danger" style="height: 20%; width: 20%;">Delete</a>
        <div class="modal fade" id="deleteModal{{ $consultant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.consultant.delete', $consultant->id) !!}"  method="get">
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