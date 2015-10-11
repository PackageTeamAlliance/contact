@extends('frontend.layouts.master')

@section('content')

<div class="container pagecontent">
	
	<div class="row">
		<h1 class="col-md-12">Contact</h1>
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Contact</li>
			</ul>
		</div>
		<!-- =========================Start Col left section ============================= -->
		<aside class="col-md-4">
			<div class="col-left">
				<h3>Address</h3>
				<ul>
					<li><i class="fa fa-home"></i> @content('site-name') <br />PO Box 835 Pismo Beach, Ca. 93448</li>
					<li><i class="fa fa-phone"></i> Telephone: (805) 489-2831</li>
					<li><i class="fa fa-envelope"></i> Email: <a href="mailto:support@westcottcourses.com">Support</a></li>
				</ul>

				<hr>

			</div>
		</aside>

		<!-- =========================Start Col right section ============================= -->
		<section class="col-md-8">
			<div class="col-right">
				<div class="main-img">
					<img src="{{url('img/contact/contact_us_image.jpg')}}" alt="Physical and Biological Sciences" >
					<p class="lead">If you need to reach us please use the form below or call us at (805) 489-2831</p>
				</div>
			<!-- <p class="lead">
				If you need to reach us please use the form below or call us at (805) 489-2831.
			</p>
			<hr> -->
			<h4>General Enquire or Support</h4>


		</div><!-- end col right-->
	</section>
</div><!-- end row-->
</div><!-- end container-->
@stop

@section('scripts')

@stop
