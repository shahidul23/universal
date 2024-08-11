
<div class="row">
    <div class="col-12">
        <!-- Product Table -->
        <div class="card card-table-border-none" id="recent-orders">
          <div class="card-header justify-content-between">
            <h2 class="pb-4">All bookings</h2>
          </div>

          <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%" id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  
                  <th class="d-none d-md-table-cell">Service type</th>
                  <th class="d-none d-md-table-cell">Service title</th>
                  <th class="d-none d-md-table-cell">Availed</th>
                  {{-- <th class="d-none d-md-table-cell">Created At</th> --}}
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->name }} </td>
                        <td>{{ $booking->phone }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->service_type }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->service_title }}</td>
                        <td class="d-none d-md-table-cell text-dark">{{ $booking->availed }}</td>                                     
                    </tr>
                @endforeach
              </tbody>
          
            </table>
          </div>
        </div>
    </div>
  </div>
