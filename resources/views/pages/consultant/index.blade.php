@extends('layouts.layout')

@section('content')
{{-- <h2>Last 24 Hours</h2> --}}
{{-- <div class="card card-default pb-4">
  <div class="card-header justify-content-center">
    <h2>Last 24 Hours</h2>
  </div>
</div> --}}
<div class="row">
  <div class="col-xl-4 col-sm-6">
    <div class="card card-mini mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $totalBookings }}</h2>
        <p>Total Pre Booking  </p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6">
    <div class="card card-mini  mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $notavailedBookings }}</h2>
        <p>Not Availed Booking</p>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6">
    <div class="card card-mini mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $availedBookings }}</h2>
        <p>Availed Booking</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card card-mini mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $totalQuery }}</h2>
        <p>Total Query</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card card-mini mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $completedQuery }}</h2>
        <p>Query Completed</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card card-mini mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $panddingQuery }}</h2>
        <p>Query Pandding</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card card-mini mb-4 last24hourscard">
      <div class="card-body">
        <h2 class="mb-1">{{ $handoverQuery }}</h2>
        <p>Query Heand Over</p>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">Consultant List</h2>
            {{-- <div class="date-range-report ">
              <span>Jan 25, 2021 - Feb 23, 2021</span>
            </div> --}}
          </div>
          {{-- Filter --}}
          <form action="{{ route('admin.consultant.search') }}" method="post" enctype="multipart/form-data" id="search">
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
                <label for="exampleFormControlInput5">saturday</label>
                <input type="time" class="form-control"  name="saturday_chamber_time" id="exampleFormControlInput5" placeholder="saturday_chamber_time">
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput6">sunday</label>
                <input type="time" class="form-control"  name="sunday_chamber_time" id="exampleFormControlInput6" placeholder="sunday_chamber_time">
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput7">friday</label>
                <input type="time" class="form-control"  name="friday_chamber_time" id="exampleFormControlInput7" placeholder="friday_chamber_time">
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput8">monday</label>
                <input type="time" class="form-control"  name="monday_chamber_time" id="exampleFormControlInput8" placeholder="monday_chamber_time">
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput9">tuesday</label>
                <input type="time" class="form-control"  name="tuesday_chamber_time" id="exampleFormControlInput9" placeholder="tuesday_chamber_time">
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput10">wednesday</label>
                <input type="time" class="form-control"  name="wednesday_chamber_time" id="exampleFormControlInput10" placeholder="wednesday_chamber_time">
              </div><div class="form-group col-4">
                <label for="exampleFormControlInput11">thursday</label>
                <input type="time" class="form-control"  name="thursday_chamber_time" id="exampleFormControlInput11" placeholder="thursday_chamber_time">
              </div>
              
              <div class="form-footer pt-4 mt-4 ml-4">
                <button type="submit" class="btn btn-info btn-default">Search</button>    
              </div>
            </div>
            
          </form>


          <div class="card-body pt-0 pb-5">
            {{-- @include('partials.messages') --}}
            <table class="table card-table table-responsive table-responsive-large" style="width:100%" id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th class="d-none d-md-table-cell">Department</th>
                  <th class="d-none d-md-table-cell">Designation</th>
                  <th>Degree</th>
                  <th>Fee</th>
                  <th>saturday</th>
                  <th>sunday</th>
                  <th>monday</th>
                  <th>tuesday</th>
                  <th>wednesday</th>
                  <th>thursday</th>
                  <th>friday</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($consultants as $consultant)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('admin.consultant.edit', $consultant->id) }}">{{ $consultant->name }}</a>
                        </td>
                        <td class="d-none d-md-table-cell text-dark">{{ $consultant->department }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $consultant->designation }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $consultant->degree }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $consultant->chamber_time }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $consultant->chamber_schedule }}</td>
                        <td class="d-none d-md-table-cell text-dark">$ {{ $consultant->fee }}</td>
                        <td>
                          <a href="{{ route('admin.consultant.show', $consultant->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('admin.consultant.edit', $consultant->id) }}" class="badge badge-success">Edit</a>
                          <a href="#deleteModal{{ $consultant->id }}" data-toggle="modal" class="badge badge-danger">Delete</a>
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
                                  <form action="{!! route('admin.consultant.delete', $consultant->id) !!}"  method="post">
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
                        </td>
                    
                    </tr>
                @endforeach --}}
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
@endsection

@section('scripts')


<script>
  // console.log($consultants);

  // $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       }
  //   });
  function load_datatable(additional_query=''){
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $('#sampleTable').dataTable({
                    destroy: true, //use this to reinitiate the table, other wise problem will occur
                    processing: true,
                    serverSide: true,
                    "scrollX": true,
                    ajax: {
                        url: "http://127.0.0.1:8000/consultant/paging"
                        // url: '{{ route("admin.consultant.paging") }}'
                        ,type: 'POST'
                        ,data:{_token: CSRF_TOKEN,additional_query: additional_query} //,'records_total': records_total
                    }
                });
}

$(document).ready(function() {
    //$('#sampleTable').DataTable();
    load_datatable();
} );


$( "#search" ).submit(function( e ) {
        e.preventDefault();
        e.stopImmediatePropagation();
		$("#result").show();
    // alert('form submitted');
		$.ajax({
            data: $(this).serialize(), // get the form data
            type: $(this).attr('method'), // GET or POST
            url: $(this).attr('action'), // the file to call
            dataType : 'json',
				// beforeSend: function(  ) {
        //             $('#loading_modal').modal('toggle');
        //         }
            })
            .done(function( response ) {
				      console.log(response);
				      //alert('success');
                //var obj=JSON.parse(response);
                var additional_query=response.additional_query;
                load_datatable(additional_query);
                //$('#loading_modal').modal('toggle');
            });
        //alert('form submitted');
        
        return false;
    });


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