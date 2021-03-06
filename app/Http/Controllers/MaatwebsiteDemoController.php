<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grocery;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class MaatwebsiteDemoController extends Controller
{


  public function importExport()
  {
    return view('maatwebsitedemo.importExport');
  }


  public function downloadExcel($type)
  {
    $data = Grocery::get()->toArray();
    return Excel::create('itgroceries_example', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data) {
          $sheet->fromArray($data);
      });
    })->download($type);
  }

}




//    http://www.maatwebsite.nl/laravel-excel/docs
