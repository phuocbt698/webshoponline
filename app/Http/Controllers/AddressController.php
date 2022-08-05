<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function getDistrict(Request $request){
        $id_city = $request->id;
        $district = DB::table('tbl_district')->where('id_city', '=', $id_city)->get();
        return response()->json($district);
    }

    public function getWard(Request $request){
        $id_district= $request->id;
        $district = DB::table('tbl_ward')->where('id_district', '=', $id_district)->get();
        return response()->json($district);
    }
}
