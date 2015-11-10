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
			<h4>General Inquire or Support</h4>
			<div id="message-contact"></div>
			{{-- Start  --}}
			<form method="post" action="{{route('contact.frontend.process')}}" id="contactform" class="@if (count($errors) > 0) has-errors @endif">
				{!! csrf_field() !!}
				<input type="hidden" name="type" value="contact">
				@if (Auth::user())
				<input type="hidden" name="user_id" value="{{{Auth::user()->id}}}">
				@else
				<input type="hidden" name="user_id" value="0">
				@endif
				<div class="row">
					
					<div class="form-group col-md-6 @if($errors->first('first_name')) has-error @endif">
						<label for="first_name">First Name <span class="required">* </span></label>
						<input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name', '')}}">
						<span class="help-block">{{{$errors->first('first_name')}}}</span>
					</div>

					<div class="form-group col-md-6 @if($errors->first('last_name')) has-error @endif">
						<label for="last_name">Last Name <span class="required">* </span></label>
						<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{old('last_name', '')}}">
						<span class="help-block">{{{$errors->first('last_name')}}}</span>
					</div>

					<div class="form-group col-md-6 @if($errors->first('email')) has-error @endif">
						<label for="email">Email <span class="required">* </span></label>
						<input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email', '')}}">
						<span class="help-block">{{{$errors->first('email')}}}</span>
					</div>

					<div class="form-group col-md-6 @if($errors->first('phone')) has-error @endif">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone', '')}}">
						<span class="help-block">{{{$errors->first('phone')}}}</span>
					</div>

					<div class="form-group col-md-6 @if($errors->first('subject')) has-error @endif">
						<label for="subject">Select a subject <span class="required">* </span></label>
						<select class="form-control" name="subject" id="subject">
							<option value="">---</option>
							@foreach (config('contact.contact_form_subjects') as $subject)
							<option value="{{{$subject}}}" @if(old('subject') === $subject) selected @endif>{{{$subject}}}</option>
							@endforeach
						</select>

						<span class="help-block">{{{$errors->first('subject')}}}</span>
					</div>

					<div class="form-group col-md-6"></div>

					<div class="form-group col-md-12 @if($errors->first('message')) has-error @endif">
						<label for="phone">Message <span class="required">* </span></label>
						<textarea class="form-control" rows="5" name="message">{{{old('message')}}}</textarea>
						<span class="help-block">{{{$errors->first('message')}}}</span>
					</div>

					<div class="col-md-12">
						<input type="submit" id="submit-contact" value="Submit" class="button_medium">
					</div>
				</div>

			</form>
		</div><!-- end col right-->
	</section>
</div><!-- end row-->
</div><!-- end container-->
@stop

@section('scripts')

@stop
