<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;
use Google_Client;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

         $sheets = Sheets::spreadsheet('studied-handler-280013')

                        ->sheet('personaldata')

                        ->get();


        $header = $sheets->pull(0);


        $personalData = Sheets::collection($header, $sheets);

        $personalData = $personalData->reverse()->take(10);
        // dd($personalData);
        // return view('welcome')->with(compact('personalData'));
        return json(compact('personalData'));
    }

    public function fetchData(){
        $arrayList = Array();
        array_push($arrayList, ["firstName" => "Philip", "lastName" => "Afemikhe", "age" => 40, "location" => "Nigeria", "email" => "afemikhephilip@gmail.com"]);
       array_push($arrayList, ["firstName" => "Denis", "lastName" => "Uwaila", "age" => 40, "location" => "Ghana", "email" => "denisuwaila@gmail.com"]);

        return json_encode($arrayList);
    }

    // public function uploadRecords(Request $request){
    //     $newList = Array();
    //     $jsonArray = json_encode($request->all(), true) ;
    //     $jsonObject = json_decode($jsonArray, true);


    //     foreach($jsonObject as $key => $value) {
    //     // array_push($newList, $value["firstName"]);

    //         $append = [
    //         $value["firstName"],
    //         $value["lastName"],
    //         $value["age"],
    //         $value["location"],
    //        $value["email"],
    //         // now()->toDateTimeString(),
    //     ];
    //     // return "jhj";
    //     array_push($newList, $append);
    //     Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))

    //           ->sheetById(config('sheets.post_sheet_id'))

    //           ->append([$append]);
          
    //     }
    //     return $newList;
    // }
}
