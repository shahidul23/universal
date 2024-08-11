@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All bookings</h2>
            {{-- <div class="date-range-report ">
              <span>Jan 25, 2021 - Feb 23, 2021</span>
            </div> --}}
            <div class="btn-group" >
              
                <a id="print_excel" href="#" class="btn btn-sm btn-secondary" style="display: none">
                  <i class="mdi mdi-content-save"></i> Download Excel</a>
              <a id="print_pdf" class="btn btn-sm btn-secondary" style="display: none">
                <i class="mdi mdi-printer" id="print_icon" ></i> Download PDF</a>
            </div>
          </div>
          {{-- Filter --}}
          <form action="{{ route('booking.search') }}" method="post" enctype="multipart/form-data" id="search">
            @csrf
            <div class="row card-body pt-0 pb-5 position-relative">
              {{-- <div class="form-group col-4">
                  <label for="exampleFormControlInput2">Designation</label>
                  <input type="text" name="designation" class="form-control" id="exampleFormControlInput2" placeholder="Designation">
              </div> --}}
              <div class="form-group col-3">
                  <label for="exampleFormControlSelect3">Availed</label>                 
                  <select class="form-control" name="availed" id="exampleFormControlSelect3" placeholder="availed">
                      <option value=""disabled selected hidden>availed</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                      
                  </select>
              </div>
              
                <div class="form-group col-3" id="from_date">
                  <label for="exampleFormControlInput6">Start Date</label>
                  <input type="date" class="form-control"  name="from_date" id="exampleFormControlInput6" placeholder="Chamber Time">
                </div>
                <div class="form-group col-3" id="to_date">
                  <label for="exampleFormControlInput5"> End Date</label>
                  <input type="date" class="form-control"  name="to_date" id="exampleFormControlInput5" placeholder="Chamber Time">
                </div>
                
                <div class="form-group col-3 m-4 pt-2">
                  <button type="submit" class="btn btn-info btn-default" id="search-btn">Search</button>    
                </div>
              </div>
          </form>


          <div class="card-body pt-0 pb-5">
            {{-- @include('partials.messages') --}}
            <table class="table card-table table-responsive table-responsive-large" style="width:100%" id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  
                  <th class="d-none d-md-table-cell">Service type</th>
                  <th class="d-none d-md-table-cell">Service title</th>
                  <th class="d-none d-md-table-cell">Availed</th>
                  {{-- <th class="d-none d-md-table-cell">Created At</th> --}}
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($bookings as $booking)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('booking.show', $booking->id) }}">{{ $booking->name }}</a>
                        </td>
                        <td>{{ $booking->phone }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->discount }}%</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->service_type }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->service_title }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->availed }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->created_at }}</td>
                        <td>
                          <a href="{{ route('booking.show', $booking->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('booking.edit', $booking->id) }}" class="badge badge-success">Edit</a>
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
  
  $(document).ready(function(){
  
  $("#search-btn").click(function(){
    $("#print_pdf").show();
    // $("#print_excel").show();
  });
});

    function load_datatable(additional_query=''){
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
    $('#sampleTable').dataTable({
      destroy: true, //use this to reinitiate the table, other wise problem will occur
      processing: true,
      serverSide: true,
      "scrollX": true,
      ajax: {
          url: "http://127.0.0.1:8000/booking/paging"
          // url: '{{ route("booking.paging") }}'
          ,type: 'POST'
          ,data:{_token: CSRF_TOKEN,additional_query: additional_query} //,'records_total': records_total
      }
    });
  }

$(document).ready(function() {
    // $('#sampleTable').DataTable();
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
            })
            .done(function( response ) {
                var additional_query=response.additional_query;
                // var download_pdf_url="BookingController/download_pdf?additional_query="+additional_query;
                // console.log('----------------',additional_query);
                
                load_datatable(additional_query);
                var url = '{{ route("pdf.booking", ":id") }}';
                url = url.replace(':id', additional_query);
                // $('#print_pdf').append('<li><a href="'+url+'">' + **print** + ' </a></li>');
                document.getElementById("print_pdf").setAttribute("href",url);
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