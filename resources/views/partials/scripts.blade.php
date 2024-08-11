	{{-- <!-- jQuery -->
	<script src={{asset("assets/js/jquery.min.js")}}></script>
	<!-- Bootstrap -->
	<script src={{asset("assets/js/bootstrap.min.js")}}></script>
	<!-- Placeholder -->
	<script src={{asset("assets/js/jquery.placeholder.min.js")}}></script>
	<!-- Waypoints -->
	<script src={{asset("assets/js/jquery.waypoints.min.js")}}></script>
	<!-- Main JS -->
	<script src={{asset("assets/js/main.js")}}></script> --}}

	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script> --}}
	<script src={{asset("assets/plugins/jquery/jquery.min.js")}}></script>
	<script src={{asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
	<script src={{asset("assets/plugins/toaster/toastr.min.js")}}></script>
	<script src={{asset("assets/plugins/slimscrollbar/jquery.slimscroll.min.js")}}></script>
	<!-- <script src={{asset("assets/plugins/charts/Chart.min.js")}}></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src={{asset("assets/plugins/ladda/spin.min.js")}}></script>
	<script src={{asset("assets/plugins/ladda/ladda.min.js")}}></script>
	<script src={{asset("assets/plugins/jquery-mask-input/jquery.mask.min.js")}}></script>
	<script src={{asset("assets/plugins/select2/js/select2.min.js")}}></script>
	<script src={{asset("assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js")}}></script>
	<script src={{asset("assets/plugins/jvectormap/jquery-jvectormap-world-mill.js")}}></script>
	<script src={{asset("assets/plugins/daterangepicker/moment.min.js")}}></script>
	<script src={{asset("assets/plugins/daterangepicker/daterangepicker.js")}}></script>
	<!-- <script src={{asset("assets/plugins/jekyll-search.min.js")}}></script> -->
	<script src={{asset("assets/js/sleek.js")}}></script>
	<script src={{asset("assets/js/chart.js")}}></script>
	<script src={{asset("assets/js/date-range.js")}}></script>
	<script src={{asset("assets/js/map.js")}}></script>
	{{-- GSAP for animation --}}
	{{-- <script src={{asset("assets/js/gsap.min.js")}}></script> --}}
	{{-- custom js --}}
	{{-- <script src={{asset("js/style.js")}}></script> --}}
	{{-- Data Table --}}
	<script type="text/javascript" src="{{ asset('assets/plugins/dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/plugins/dataTables.bootstrap5.min.js') }}"></script>
	{{-- Data Table js--}}
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script> --}}

{{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}

{{-- <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<!-- Latest jQuery -->
<script src={{asset("assets/js/jquery-1.12.4.min.js")}}></script>
<!-- popper min js -->
<script src={{asset("assets/js/popper.min.js")}}></script>

<!-- owl-carousel min js  -->
<script src={{asset("assets/owlcarousel/js/owl.carousel.min.js")}}></script>
<!-- magnific-popup min js  -->
<script src={{asset("assets/js/magnific-popup.min.js")}}></script>
<!-- waypoints min js  -->
<script src={{asset("assets/js/waypoints.min.js")}}></script>
<!-- parallax js  -->
<script src={{asset("assets/js/parallax.js")}}></script>
<!-- countdown js  -->
<script src={{asset("assets/js/jquery.countdown.min.js")}}></script>
<!-- imagesloaded js -->
<script src={{asset("assets/js/imagesloaded.pkgd.min.js")}}></script>
<!-- isotope min js -->
<script src={{asset("assets/js/isotope.min.js")}}></script>
<!-- jquery.dd.min js -->
<script src={{asset("assets/js/jquery.dd.min.js")}}></script>
<!-- slick js -->
<script src={{asset("assets/js/slick.min.js")}}></script>
<!-- elevatezoom js -->
<script src={{asset("assets/js/jquery.elevatezoom.js")}}></script>
<!-- Google Map Js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src={{asset("assets/bootstrap/js/bootstrap.min.js")}}></script>
<!-- scripts js -->
<script src={{asset("assets/js/scripts.js")}}></script> --}}


<!-- Aletify JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



{{-- <script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function addToCart(product_id){
		var url = "{{ url('/') }}";
		$.post( url+"/api/carts/store",
		{
			product_id: product_id
		})
		.done(function( data ) {
			// alert( "Data Loaded: " + data );
			data = JSON.parse(data);
		    if(data.status == 'success'){
		    	// using Alertify
		    	alertify.set('notifier','position', 'top-center');
				alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');

		    	$("#totalItems").html(data.totalItems);
				$("#cart_count").html(data.totalItems);
		    }
			console.log(data);
			// $("#totalItems").html(data.totalItems);
		});
	}
</script> --}}

