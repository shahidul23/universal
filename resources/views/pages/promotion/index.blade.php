@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All promotions</h2>
            {{-- <div class="date-range-report ">
              <span>Jan 25, 2021 - Feb 23, 2021</span>
            </div> --}}
          </div>
          {{-- Filter --}}
          <form action="{{ route('promotion.search') }}" method="post" enctype="multipart/form-data" id="search">
            @csrf
            <div class="row card-body pt-0 pb-5 position-relative">
              <div class="form-group col-4">
                  <label for="exampleFormControlInput2">Promotion Type</label>
                  <input type="text" name="type" class="form-control" id="exampleFormControlInput2" placeholder="Promotion Type">
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
                  <th class="d-none d-md-table-cell">Details</th>
                  <th class="d-none d-md-table-cell">Validity</th>
                  <th class="d-none d-md-table-cell">Promotion Type</th>                 
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($promotions as $promotion)
                    <tr>
                        <td>
                          <a class="text-dark" href="{{ route('promotion.edit', $promotion->id) }}">{{ $promotion->name }}</a>
                        </td>
                        
                        <td class="d-none d-md-table-cell text-dark">{{ $promotion->details }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $promotion->validity }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $promotion->type }}</td>
                        
                        <td>
                          <a href="{{ route('promotion.show', $promotion->id) }}" class="badge bg-secondary">View</a>
                          <a href="{{ route('promotion.edit', $promotion->id) }}" class="badge badge-success">Edit</a>
                          <a href="#deleteModal{{ $promotion->id }}" data-toggle="modal" class="badge badge-danger">Delete</a>
                          <div class="modal fade" id="deleteModal{{ $promotion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{!! route('promotion.delete', $promotion->id) !!}"  method="get">
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
  
    function load_datatable(additional_query=''){
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
    $('#sampleTable').dataTable({
      destroy: true, //use this to reinitiate the table, other wise problem will occur
      processing: true,
      serverSide: true,
      ajax: {
          url: "http://127.0.0.1:8000/promotion/paging"
          // url: '{{ route("promotion.paging") }}'
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