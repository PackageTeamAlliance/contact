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
				<ul class="list clearfix">
					<li><i class="fa fa-home"></i>
						<address>
							<strong>@content('site-name')</strong><br>
							PO Box 835<br>
							Pismo Beach, CA 93448<br>
						</address>
					</li>
					<li><i class="fa fa-phone"></i> Telephone: (805) 489-2831</li>
					<li><i class="fa fa-envelope"></i> Email: <a href="mailto:support@westcottcourses.com">Support</a></li>
				</ul>
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
			<div id="message-contact"></div>
			
			{!! BootForm::open()->action( route('contact.frontend.process') )->attribute('id', 'contactform')->post() !!}
			{!! BootForm::hidden('user_id', 'user_id')->value(Auth::user()->id ? : 0) !!}
			{!! BootForm::hidden('contact', 'contact')->value('contact') !!}
			{!! BootForm::text('First Name', 'first_name')->value(old('first_name', ''))->attribute('id', 'first_name') !!}
			{!! BootForm::text('Last Name', 'last_name')->value(old('last_name', ''))->attribute('id', 'last_name') !!}
			{!! BootForm::email('Email', 'email')->value(old('email', ''))->attribute('id', 'email') !!}
			{!! BootForm::text('Phone', 'phone')->value(old('phone', ''))->attribute('id', 'phone') !!}
			{!! BootForm::textarea('Message', 'message')->value(old('message', ''))->attribute('id', 'message') !!}
			{!! BootForm::select('Subject', 'subject')->options(config('contact.contact_form_subjects'))->select(old('subject', '')); !!}
			{!! BootForm::submit('Submit') !!}
			{!! BootForm::close() !!}
			</div><!-- end col right-->
		</section>
	</div><!-- end row-->
</div><!-- end container-->
@stop

@section('scripts')

@stop
