<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use DataTables;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
   public function index(){

     return view('admin.index');
   }

   public function user(){

     $participants = Participant::paginate(2);
     return view('admin.user',compact('participants'));
   }

   /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function payment(){

     return view('admin.payment');
   }

   public function attendance(){

     return view('admin.attendance');
   }

   /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function payment_ajax()
   {
     $p = Participant::select(['id', 'name', 'email', 'created_at', 'updated_at']);

      return Datatables::of($p)
          ->addColumn('action', function ($p) {
              return '<a href="#edit-'.$p->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
          })
          ->removeColumn('id')
          ->make(true);
   }
}
