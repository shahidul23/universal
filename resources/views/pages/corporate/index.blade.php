@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All Corporates</h2>
              <div class="btn-group" >
                <a id="print_excel" href="#" class="btn btn-sm btn-secondary" style="display: none">
                  <i class="mdi mdi-content-save"></i> Download Excel</a>
                <a id="print_pdf" class="btn btn-sm btn-secondary" style="display: none">
                  <i class="mdi mdi-printer" id="print_icon" ></i> Download PDF</a>
              </div>
          </div>
          {{-- Filter --}}
          <form action="{{ route('corporate.search') }}" method="post" enctype="multipart/form-data" id="search">
            @csrf
            <div class="row card-body pt-0 pb-5 position-relative">
              <div class="form-group col-3">
                <label for="exampleFormControlSelect3">Status</label>                 
                <select class="form-control" name="status" id="exampleFormControlSelect3" placeholder="status">
                    <option value=""disabled selected hidden>status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>  
                </select>
              </div>
              <div class="form-group col-3">
                <label for="exampleFormControlSelect3">BD Officers</label>                 
                <select class="form-control" name="name_corporate_under_bd" id="exampleFormControlSelect3">
                    <option value=""disabled selected hidden>BD Officers</option>
                    @foreach ($phonedirectories as $consultant)
                      <option value="{{ $consultant->name }}">{{ $consultant->name }}</option>
                    @endforeach 
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
                  <th class="d-none d-md-table-cell">Address</th>
                  <th>Phone</th>
                  <th class="d-none d-md-table-cell">Contact person name</th>
                  <th>Contact person phone</th>                  
                  <th>Industry type</th>
                  <th>Agreement validity date</th>
                  <th class="d-none d-md-table-cell">Status</th>
                  <th>Options</th>

                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($corporates as $corporate)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('corporate.show', $corporate->id) }}">{{ $corporate->name }}</a>
                        </td>

                        <td class="d-none d-md-table-cell text-dark">{{ $corporate->address }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $corporate->phone }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $corporate->contact_person_name }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $corporate->contact_person_phone }}</td>                        
                        <td class="d-none d-md-table-cell text-dark">{{ $corporate->industry_type }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $corporate->agreement_validity_date }}</td>
                        
                        @php
                            if ($corporate->status == 'Active' )
                                // $whatscolor = 'background-color: green !important;';
                                $whatscolor = 'badge bg-light text-dark';
                            else if ($corporate->status == 'Inactive' )
                                $whatscolor = 'badge bg-danger';
                            

                        @endphp
                          
                        
                        <td class="<?php echo $whatscolor; ?>"  id="status">{{ $corporate->status }}</td>
                        <td>
                          <a href="{{ route('corporate.show', $corporate->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('corporate.edit', $corporate->id) }}" class="badge badge-success">Edit</a>
                          
                        </td>
                    
                    </tr>
                    
                    <script>
                      // let statusId = document.getElementById('status').innerHTML;
                        if(document.getElementById('status').innerHTML = 'Active')
                        {
                          // console.log('------------', statusId);
                          document.getElementById('status').style.backgroundColor = "red";
                        }
                  </script>
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
          url: "http://127.0.0.1:8000/corporate/paging"
          // url: '{{ route("corporate.paging") }}'
          ,type: 'POST'
          ,data:{_token: CSRF_TOKEN,additional_query: additional_query} //,'records_total': records_total
      }
    });
  }

  // let statusId = document.getElementById('status').innerHTML;
  // if(statusId = 'Active')
  // {
  //   console.log('------------', statusId);
  //   document.getElementById('status').style.backgroundColor = "red";
  // }

$(document).ready(function() {
    // $('#sampleTable').DataTable({
    //   "scrollX": true,
    // });
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
                var url = '{{ route("pdf.corporate", ":id") }}';
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