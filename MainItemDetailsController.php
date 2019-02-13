<?php

class MainItemDetailsController extends BaseController {

	public function showRecords()
	{
		$itemDetails = DB::table('tblitemdetails')
			->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
			->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemtype.ItemCode',  'tblitemdetails.ItemQuantity','tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemdetails.ItemTypeID')
			//->orderBy('tblitemdetails.DateTime', 'asc')
			->orderBy('tblitemdetails.itemTypeID', 'asc')
			->orderBy('tblitemdetails.ItemID', 'asc')
			->get();

		$itemType = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->get();

		return View::make('mainItem.item_details')
			->with('iDetails', $itemDetails)
			->with('iType', $itemType);
	}

	public function addRecord()
	{
				date_default_timezone_set('Asia/Manila');

		$post = Input::all();
		$messages = array(
			'quan.required' => 'º Quantity is required.',
			'quan.numeric' => 'º Quantity accepts NUMBERS only.',
			'iType.required' => 'º Item Type is required.'
			);
		$v = Validator::make($post,
				[
					'quan'	=>'required|numeric',
					'iType'	=>'required'
				],$messages);

		$iDetails = DB::table('tblitemdetails')
				->where('ItemStatus', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'iDetails' => $iDetails, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax()){

			$result = DB::table('tblitemdetails')
				->where('ItemTypeID', '=', Input::get('iType'))
				->count();
			

			if($result == 0)
			{
				$ctr = 0;
				$quantity = Input::get('quan');


				
					DB::table('tblitemdetails')
						->insert(array(
								'ItemID' => 1,
								'ItemTypeID' => Input::get('iType'),
								'ItemQuantity' => $quantity,
								'ItemStatus' => 'Good'

							));


$loginInfo = DB::table('tblofficialaccount')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblofficialaccount.Username', '=', Session::get('username'))
				->where('tblofficialaccount.Password', '=', Session::get('password'))
				->where('tblofficialaccount.OfficialID', '=', Session::get('ID'))
				->get();

			Session::put('username', $loginInfo[0]->Username);
			Session::put('password', $loginInfo[0]->Password);
			Session::put('ID', $loginInfo[0]->OfficialID);



				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Item Quantity',
						'NewValue' => "No."." "."1"." ".Input::get('iType'),
						'Date' => date('Y/m/d H:m:s')
					));





				


				$itemType = DB::table('tblitemtype')
					->where('ItemTypeID', '=', Input::get('iType'))
					->get();


				$iDetails = DB::table('tblitemdetails')
					->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
					->select('tblitemdetails.ItemID', 'tblitemtype.ItemName','tblitemdetails.ItemQuantity', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime')
					//->orderBy('tblitemdetails.DateTime', 'asc')
					->orderBy('tblitemdetails.itemTypeID', 'asc')
					->orderBy('tblitemdetails.ItemID', 'asc')
					->get();

				return Response::json(array('it' => $itemType, 'ctr' => 0,'te' => $typeExists, 'iDetails' => $iDetails));
			}
			else
			{
				$typeExists = DB::table('tblitemdetails')
					->where('ItemTypeID', '=', Input::get('iType'))
					->orderBy('ItemID', 'desc')
					->take(1)
					->get();


				$i = $typeExists[0]->ItemID+1;
				$quantity = Input::get('quan');

				
					DB::table('tblitemdetails')
						->insert(array(
								'ItemID' => $i,
								'ItemQuantity' => $quantity,
								'ItemTypeID' => Input::get('iType'),
								'ItemStatus' => 'Good'

							));
				
				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Item Quantity',
						'NewValue' => $i." ".Input::get('iType'),
						'Date' => date('Y/m/d H:m:s')
					));

				

				$itemType = DB::table('tblitemtype')
					->where('ItemTypeID', '=', Input::get('iType'))
					->get();

				$iDetails = DB::table('tblitemdetails')
					->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
					->select('tblitemdetails.ItemID', 'tblitemtype.ItemName','tblitemdetails.ItemQuantity', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemdetails.ItemTypeID')
					//->orderBy('tblitemdetails.DateTime', 'asc')
					->orderBy('tblitemdetails.itemTypeID', 'asc')
					->orderBy('tblitemdetails.ItemID', 'asc')
					->get();

				return Response::json(array('it' => $itemType, 'ctr' => 1, 'te' => $typeExists, 'iDetails' => $iDetails));

			}


		}
	}
}
	public function getInfo()
	{
		if(Request::ajax())
		{
			$itemInfo = DB::table('tblitemdetails')
				->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemdetails.ItemQuantity','tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemtype.ItemTypeID')
				->where('tblitemdetails.ItemID', '=', Input::get('x'))
				->where('tblitemtype.ItemTypeID', '=', Input::get('y'))
				->get();

			return Response::json(array('iInfo' => $itemInfo));
		}
	}


	public function updateRecord()
	{
		/*$post = Input::all();
		$messages = array(
			'etxtID.required' => 'º Quantity is required.',
			'etxtID.numeric' => 'º Quantity accepts NUMBERS only.',
			'etxtStatus.required' => 'º Item Type is required.'
			);
		$v = Validator::make($post,
				[
					'etxtID'	=>'required|numeric',
					'etxtStatus'	=>'required'
				],$messages);

		$iDetails = DB::table('tblitemdetails')
				->where('ItemStatus', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'iDetails' => $iDetails, 'messages' => $v->errors() ));

			}
			else{
				*/
		if(Request::ajax())
		{
			DB::table('tblitemdetails')
				->where('ItemID',  '=', Input::get('origID'))
				->where('ItemTypeID', '=', Input::get('tID'))
				->update(array(
						'ItemID' => Input::get('itemID'),
						'ItemStatus' => Input::get('itemStatus'),
						'ItemQuantity' => Input::get('itemQuantity')

					));

			$uDetails = DB::table('tblitemdetails')
				->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemdetails.ItemQuantity','tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemdetails.ItemTypeID')
				//->orderBy('tblitemdetails.DateTime', 'asc')
				->orderBy('tblitemdetails.itemTypeID', 'asc')
				->orderBy('tblitemdetails.ItemID', 'asc')
				->get();

			return Response::json(array('uDetails' => $uDetails));
		}
//	}
	
}
	public function deleteRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblitemdetails')
				->where('ItemID',  '=', Input::get('origID'))
				->where('ItemTypeID', '=', Input::get('tID'))
				->delete();


			  $fac = DB::table('tblitemdetails')
				->where('ItemID', '=', Input::get('origID'))
				->get();
   			
   		//	Session::put('iID', $fac[0]->ItemID);
   		//	Session::put('iTypeID', $fac[0]->ItemTypeID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Item Quantity',
						'OldValue' => Session::get('iID')." ".Session::get('iTypeID'),
						'Date' => date('Y/m/d H:m:s')
					));

				$uDetails = DB::table('tblitemdetails')
					->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
					->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemdetails.ItemQuantity','tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemdetails.ItemTypeID')
					//->orderBy('tblitemdetails.DateTime', 'asc')
					->orderBy('tblitemdetails.itemTypeID', 'asc')
					->orderBy('tblitemdetails.ItemID', 'asc')
					->get();

			return Response::json(array('uDetails' => $uDetails));

		}
	}
	

}
