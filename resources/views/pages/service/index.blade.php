@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All Services</h2>
            {{-- <div class="date-range-report ">
              <span>Jan 25, 2021 - Feb 23, 2021</span>
            </div> --}}
          </div>
          {{-- Filter --}}
          <form action="{{ route('service.search') }}" method="post" enctype="multipart/form-data" id="search">
            @csrf
            <div class="row card-body pt-0 pb-5 position-relative">
              <div class="form-group col-4">
                <label for="exampleFormControlSelect3">Service type</label>
                <select class="form-control" name="service_type" id="service_type_id">
                    <option value=""disabled selected hidden>Service type</option>
                    <option value="ipd">IPD</option>
                    <option value="opd">OPD</option>                       
                </select>
              </div>
              <div class="form-group col-4">
                <label for="exampleFormControlInput4">Service Group</label>
                    <select class="form-control" name="service_group" id="service_group_id" >
                        <option value="" >-  Select Service Group  -</option>
                        <option id="nicu_ipd_options" style="display: none" value="nicu">NICU</option>
                        <option id="picu_ipd_options" style="display: none" value="picu">PICU</option>
                        <option id="cicu_ipd_options" style="display: none" value="cicu">CICU</option>
                        <option id="ccu_ipd_options" style="display: none" value="ccu">CCU</option>
                        <option id="icu_ipd_options" style="display: none" value="icu">ICU</option>
                        <option id="rcu_ipd_options" style="display: none" value="rcu">RCU</option>
                        <option id="imaging_opd_options" style="display: none" value="imaging">Imaging</option>
                        <option id="radiology_opd_options" style="display: none" value="radiology">Radiology</option>
                    </select>
              </div>
              
              <div class="form-footer m-4 pt-2">
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
                  <th class="d-none d-md-table-cell">Service Type</th>
                  <th class="d-none d-md-table-cell">Service Group</th>
                  <th>Price</th>
                  <th>Note</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($services as $service)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('service.edit', $service->id) }}">{{ $service->name }}</a>
                        </td>
                        <td class="d-none d-md-table-cell text-dark">{{ $service->service_type }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $service->service_group }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $service->price }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $service->note }}</td>
                        <td>
                          <a href="{{ route('service.show', $service->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('service.edit', $service->id) }}" class="badge badge-success">Edit</a>
                          <a href="#deleteModal{{ $service->id }}" data-toggle="modal" class="badge badge-danger">Delete</a>
                          <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{!! route('service.delete', $service->id) !!}"  method="get">
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

    $("#service_type_id").change(function(){
        $val = $("#service_type_id").val();
        // console.log($val);
        $("#service_group_id").show();
        select = document.getElementById('service_group_id');
        var opt = document.createElement('option');
        if($val == "ipd"){
        
        $("#radiology_opd_options").hide();
        $("#imaging_opd_options").hide();
        $("#nicu_ipd_options").show();
        $("#picu_ipd_options").show();
        $("#cicu_ipd_options").show();
        $("#ccu_ipd_options").show();
        $("#icu_ipd_options").show();
        $("#rcu_ipd_options").show();

        
        }
        else if($val == "opd")
        {
        // $("#opd_options").classList.remove("hidden");
        $("#nicu_ipd_options").hide();
        $("#picu_ipd_options").hide();
        $("#cicu_ipd_options").hide();
        $("#ccu_ipd_options").hide();
        $("#icu_ipd_options").hide();
        $("#rcu_ipd_options").hide();
        $("#radiology_opd_options").show();
        $("#imaging_opd_options").show();
        
        }
        else{
            console.log('Nothing');
        }
    })

  
    function load_datatable(additional_query=''){
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
    $('#sampleTable').dataTable({
      destroy: true, //use this to reinitiate the table, other wise problem will occur
      processing: true,
      serverSide: true,
      ajax: {
          url: "http://127.0.0.1:8000/service/paging"
          // url: '{{ route("service.paging") }}'
          ,type: 'POST'
          ,data:{_token: CSRF_TOKEN,additional_query: additional_query} //,'records_total': records_total
      }
    });
  }

  // Genetare Data Table 
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