<?php

class AddrenterController extends BaseController{

	public function index()
	{
		$user = User::getCurrentUser();

		$param['flats'] = $user->flats;
		return View::make('Addrenter.index', $param);
	}


	public function add()
	{
		$renter = new Renter;
		$renter->name = Input::get('name');
		$renter->gender = Input::get('gender');
		$renter->age = Input::get('age');
		$renter->profession = Input::get('profession');
		$renter->email = Input::get('email');
		$renter->contact = Input::get('contact');
		$renter->nid = Input::get('nid');
		$renter->arrival = Input::get('arrival');

		$user = User::getCurrentUser();

		$renter->user()->associate($user);

		$renter->save();

		$flatID = Input::get('flat');

		if(!empty($flatID))
		{
			$flat = Flat::findOrFail($flatID);
			$renter->flats()->save($flat);
		}



		$renter->save();

		return View::make('Success.success');
	}

}
