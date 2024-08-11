@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All Queries</h2>
            <div class="btn-group" >
              <a id="print_excel" href="#" class="btn btn-sm btn-secondary" style="display: none">
                <i class="mdi mdi-content-save"></i> Download Excel</a>
              <a id="print_pdf" class="btn btn-sm btn-secondary" style="display: none">
                <i class="mdi mdi-printer" id="print_icon" ></i> Download PDF</a>
            </div>
          </div>
          {{-- Filter --}}
          <form action="{{ route('query.search') }}" method="post" enctype="multipart/form-data" id="search">
            @csrf
            <div class="row card-body pt-0 pb-5 position-relative">
              <div class="form-group col-3">
                <label for="exampleFormControlSelect3">Status</label>                 
                <select class="form-control" name="status" id="exampleFormControlSelect3">
                  <option value=""disabled selected hidden>status</option>
                  <option value="Complete">Complete</option>
                  <option value="Hand Over">Hand over</option>
                  <option value="Pandding">Pandding</option> 
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
              <div class="form-footer col-3 m-4 pt-2">
                <button type="submit" class="btn btn-info btn-default" id="search-btn"> Search</button>    
              </div>
            </div>
          </form>


          <div class="card-body pt-0 pb-5">
            {{-- @include('partials.messages') --}}
            <table class="table card-table table-responsive table-responsive-large" style="width:100%" id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th class="d-none d-md-table-cell">Phone</th>
                  <th>Query type</th>
                  <th>Status</th>
                  <th>Created by</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($querys as $query)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('query.show', $query->id) }}">{{ $query->name }}</a>
                        </td>
                        <td class="d-none d-md-table-cell text-dark">{{ $query->phone }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $query->address }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $query->query_type }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $query->note }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $query->status }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $query->created_by }}</td>
                        <td>
                          <a href="{{ route('query.show', $query->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('query.edit', $query->id) }}" class="badge badge-success">Edit</a>
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
          url: "http://127.0.0.1:8000/query/paging"
          // url: '{{ route("query.paging") }}'
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
                load_datatable(additional_query);
                var url = '{{ route("pdf.query", ":id") }}';
                url = url.replace(':id', additional_query);
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