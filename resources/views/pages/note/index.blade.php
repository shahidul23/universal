@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All Notes</h2>
            {{-- <div class="date-range-report ">
              <span>Jan 25, 2021 - Feb 23, 2021</span>
            </div> --}}
          </div>
          {{-- Filter --}}
          {{-- <form action="{{ route('note.search') }}" method="post" enctype="multipart/form-data" id="search">
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
                  <th class="d-none d-md-table-cell">Details</th>
                  <th class="d-none d-md-table-cell">Validity</th>
                  
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($notes as $note)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('note.edit', $note->id) }}">{{ $note->name }}</a>
                        </td>
                        {{-- <td class="d-none d-md-table-cell text-dark">{{ $note->name }}</td> --}}
                        <td class="d-none d-md-table-cell text-dark">{{ $note->details }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $note->validity }}</td>
                        
                        <td>
                          <a href="{{ route('note.show', $note->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('note.edit', $note->id) }}" class="badge badge-success">Edit</a>
                          {{-- <a href="#deleteModal{{ $note->id }}" data-toggle="modal" class="badge badge-danger">Delete</a>
                          <div class="modal fade" id="deleteModal{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{!! route('note.delete', $note->id) !!}"  method="get">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                        </td>
                    
                    </tr>
                @endforeach
              </tbody>
              {{-- <tfoot>
                <tr>
                  <th>Name</th>
                  <th >Department</th>
                  <th >Designation</th>
                  <th>Degree</th>
                  <th>Chamber Time</th>
                  <th>Chamber Schedule</th>
                  <th>Fee</th>
                  <th></th>
                </tr>
              </tfoot> --}}
            </table>
          </div>
        </div>
    </div>
  </div>
@endsection

{{-- @push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush --}}

@section('scripts')


<script>
  
  //   function load_datatable(additional_query=''){
  //   let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
  //   $('#sampleTable').dataTable({
  //     destroy: true, //use this to reinitiate the table, other wise problem will occur
  //     processing: true,
  //     serverSide: true,
  //     ajax: {
  //         url: "http://127.0.0.1:8000/note/paging"
  //         // url: '{{ route("note.paging") }}'
  //         ,type: 'POST'
  //         ,data:{_token: CSRF_TOKEN,additional_query: additional_query} //,'records_total': records_total
  //     }
  //   });
  // }

$(document).ready(function() {
    $('#sampleTable').DataTable();
    // load_datatable();
} );


// $( "#search" ).submit(function( e ) {
//         e.preventDefault();
//         e.stopImmediatePropagation();
// 		$("#result").show();
//     // alert('form submitted');
// 		$.ajax({
//             data: $(this).serialize(), // get the form data
//             type: $(this).attr('method'), // GET or POST
//             url: $(this).attr('action'), // the file to call
//             dataType : 'json',
//             })
//             .done(function( response ) {
//                 var additional_query=response.additional_query;
//                 load_datatable(additional_query);
//             });
//         //alert('form submitted');
        
//         return false;
//     });


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