@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Detail of {{ $corporate->name }}</h2>
    </div>
    <div class="card-body">
        <div class="card card-table-border-none" id="recent-orders">
            <table class="table table-responsive table-responsive-large" style="width:100%" id="sampleTable">           
                <tr>
                    <th class="d-none d-md-table-cell">Name</th>
                    <td>{{ $corporate->name }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Address</th>
                    <td>{{ $corporate->address }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Phone</th>
                    <td>{{ $corporate->phone }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Contact Person Name</th>
                    <td>{{ $corporate->contact_person_name }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Contact Person Phone</th>
                    <td>{{ $corporate->contact_person_phone }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Contact Person Whatsapp</th>
                    <td>{{ $corporate->contact_person_whatsapp }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Contact Person Email</th>
                    <td>{{ $corporate->contact_person_email }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Alter Contact Person  name</th>
                    <td>{{ $corporate->alter_contact_person_name }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Alter contact person phone</th>
                    <td>{{ $corporate->alter_contact_person_phone }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Alter contact person whatsapp</th>
                    <td>{{ $corporate->alter_contact_person_whatsapp }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Alter contact person email</th>
                    <td>{{ $corporate->alter_contact_person_email }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Industry type</th>
                    <td>{{ $corporate->industry_type }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Agreement date</th>
                    <td>{{ $corporate->agreement_date }}</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Agreement validity date</th>
                    <td>{{ $corporate->agreement_validity_date }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Name corporate under bd</th>
                    <td>{{ $corporate->name_corporate_under_bd }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Pathology discount</th>
                    <td>{{ $corporate->pathology_discount }} %</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Radiology imaging discount</th>
                    <td>{{ $corporate->radiology_imaging_discount }} %</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Ipd discount</th>
                    <td>{{ $corporate->ipd_discount }} %</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Covid test discount</th>
                    <td>{{ $corporate->covid_test_discount }} %</td>
                </tr>                      
                <tr>
                    <th class="d-none d-md-table-cell">Privileged service</th>
                    <td>{{ $corporate->privileged_service }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Cashless service</th>
                    <td>{{ $corporate->cashless_service }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Status</th>
                    <td>{{ $corporate->status }}</td>
                </tr>
                <tr>
                    <th class="d-none d-md-table-cell">Force Active</th>
                    <td>{{ $corporate->force_active }}</td>
                </tr>
                        
            </table>    
        </div>
        {{-- <div class="modal-body">
            <form action="{!! route('corporate.delete', $corporate->id) !!}"  method="get">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Permanent Delete</button>
            </form>
        </div> --}}
        <a href="#deleteModal{{ $corporate->id }}" data-toggle="modal" class="mb-1 btn btn-block btn-danger" style="height: 20%; width: 20%;">Delete</a>
        <div class="modal fade" id="deleteModal{{ $corporate->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('corporate.delete', $corporate->id) !!}"  method="get">
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