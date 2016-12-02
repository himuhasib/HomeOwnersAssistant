@extends('templates.default')

@section('head')
	<title>Renters Details</title>
@stop


@section('content')
	<div class="container">
		@foreach($currentrenters as $renter)
			<div class="well">
				<h4>Name: {{$renter->name}} <small><a href="{{URL::route('renteredit', $renter->id)}}">Edit</a></small></h4>
				<h4>Gender: {{$renter->gender}}</h4>
				<h4>Age: {{$renter->age}}</h4>
				<h4>Profession: {{$renter->profession}}</h4>
				<h4>Email: {{$renter->email}}</h4>
				<h4>Contact: {{$renter->contact}}</h4>
				<h4>NID: {{$renter->nid}}</h4>
				<h4>Arrival Date: {{$renter->arrival}}</h4>
				@if($renter->flats->count() > 0)
					<h4>Pays for Flat Rent:<b> {{ $renter->flats->first()->rent }}</b> <small><a href="{{URL::route('flatdetails', $renter->flats->first()->id)}}">Details</a></small></h4>
				@endif

				@if($renter->parking->count() > 0)
					<h4>Car Name: {{$renter->parking->first()->carname}} <small><a href="parking?id={{$renter->parking->first()->id}}">Details</a></small></h4>
				@endif

				@if($renter->maids->count() > 0)
					<h4>Maid Name: {{$renter->maids->first()->name}} <small><a href="maid?id={{$renter->maids->first()->id}}">Details</a></small></h4>
				@endif
				<hr>

				<h4 style="display: inline">Paid For Current Month: <b>{{$renter->hasPaid()?$renter->hasPaid():"No"}}</b></h4> &bull; <a href="/payment/new?id={{$renter->id}}"><button class="btn btn-raised">Add Payment</button></a>
				
			</div>

		@endforeach
	</div>

@stop
