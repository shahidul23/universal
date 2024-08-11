@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All users</h2>
            {{-- <div class="date-range-report ">
              <span>Jan 25, 2021 - Feb 23, 2021</span>
            </div> --}}
          </div>
          {{-- Filter --}}
          {{-- <form action="{{ route('user.search') }}" method="post" enctype="multipart/form-data" id="search">
            @csrf
            <div class="row card-body pt-0 pb-5 position-relative">
              <div class="form-group col-4">
                  <label for="exampleFormControlInput2">Designation</label>
                  <input type="text" name="designation" class="form-control" id="exampleFormControlInput2" placeholder="Designation">
              </div>
              <div class="form-group col-4">
                  <label for="exampleFormControlSelect3">Department</label>                 
                  <select class="form-control" name="department" id="exampleFormControlSelect3" placeholder="Department">
                      <option value=""disabled selected hidden>Department</option>
                      <option value="cardiologist">Cardiologist</option>
                      <option value="urologist">Urologist</option>
                      
                  </select>
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput5">Chamber time</label>
                <input type="time" class="form-control"  name="chamber_time" id="exampleFormControlInput5" placeholder="Chamber Time">
              </div>
              <div class="form-footer pt-4 mt-4 ml-4">
                <button type="submit" class="btn btn-info btn-default">Khuj The Search</button>    
              </div>
            </div>
            
          </form> --}}


          <div class="card-body pt-0 pb-5">
            {{-- @include('partials.messages') --}}
            <table class="table card-table table-responsive table-responsive-large" style="width:100%" id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th class="d-none d-md-table-cell">User Type</th>
                  <th>Created At</th>
                  {{-- <th>Options</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- <td>
                          <a class="text-dark" href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                        </td> --}}
                        <td class="d-none d-md-table-cell text-dark">{{ $user->name }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $user->email }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $user->user_type }}</td>
                        {{-- <td class="d-none d-md-table-cell text-dark">{{ $user->department }}</td> --}}
                        {{-- <td class="d-none d-md-table-cell text-dark">{{ $user->con_name }}</td> --}}
                        <td class="d-none d-md-table-cell text-dark">{{ $user->created_at }}</td>
                        {{-- <td>
                          <a href="{{ route('user.show', $user->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('user.edit', $user->id) }}" class="badge badge-success">Edit</a>
                          <a href="#deleteModal{{ $user->id }}" data-toggle="modal" class="badge badge-danger">Delete</a>
                          <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{!! route('user.delete', $user->id) !!}"  method="get">
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
                        </td> --}}
                    
                    </tr>
                @endforeach
              </tbody>
          
            </table>
          </div>
        </div>
    </div>
  </div>
@endsection


@section('scripts')


<script>
  
  

$(document).ready(function() {
    $('#sampleTable').DataTable();
    // load_datatable();
} );



</script>











{{-- <script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#sampleTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#sampleTable').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
</script> --}}

@endsection