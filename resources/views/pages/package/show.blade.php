@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Detail of {{ $package->name }}</h2>
    </div>
    <div class="card-body">
        <div class="card card-table-border-none" id="recent-orders">
        <table class="table table-responsive table-responsive-large" style="width:100%" id="sampleTable">           
            <tr>
                <th class="d-none d-md-table-cell">Name</th>
                <td>{{ $package->name }}</td>
            </tr>                      
            <tr>
                <th class="d-none d-md-table-cell">Details</th>
                <td>{{ $package->details }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Validity</th>
                <td>{{ $package->validity }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Regular price</th>
                <td>{{ $package->regular_price }}</td>
            </tr>
            <tr>
                <th class="d-none d-md-table-cell">Package price</th>
                <td>{{ $package->package_price }}</td>
            </tr>           
        </table>    
        </div>
        <a href="#deleteModal{{ $package->id }}" data-toggle="modal" class="mb-1 btn btn-block btn-danger" style="height: 20%; width: 20%;">Delete</a>
        <div class="modal fade" id="deleteModal{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('package.delete', $package->id) !!}"  method="get">
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