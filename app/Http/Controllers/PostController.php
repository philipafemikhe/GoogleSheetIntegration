<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  PostRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        $newList = Array();
        $jsonArray = json_encode($request->all(), true) ;
        $jsonObject = json_decode($jsonArray, true);

        foreach($jsonObject as $key => $value) {
            $append = [
            $value["firstName"],
            $value["lastName"],
            $value["age"],
            $value["location"],
           $value["email"],
        ];
        array_push($newList, $append);
        Sheets::spreadsheet('gladegooglesheet')

              ->sheetById(config('personaldata'))

              ->append([$append]);
          
        }
        return json_encode($newList);
    }


}
