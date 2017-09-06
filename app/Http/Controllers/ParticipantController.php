<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Participant;
use App\Dependant;
use App\Mail\RegistrationConfirmation;

class ParticipantController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only('attend');
    }

    public function index(){
      return view('registration.index');
    }

    public function store(Request $request){

      $this->validate($request, [
        'name' => 'required|min:5',
        'staff_id' => 'required|min:5',
        'email' => 'required|email',
      ]);

      $participant;

      DB::beginTransaction();

      $participant = Participant::create([
        'name' => request('name'),
        'staff_id' => request('staff_id'),
        'email' => request('email'),
      ]);

      foreach (request('dependant_name') as $key => $value) {
        if (isset($value)){ //check for existance of dependants
          Dependant::create([
          'name' => $value,
          'relationship' => request('dependant_relationship')[$key],
          'participant_id' => $participant->id
          ]);
        }
      };

      if($participant){ //only send email if successfully created
        DB::commit();
        $qr = action('ParticipantController@attend',$participant);

        $event = ['name'=> 'Family Day 2017!',
                  'venue' => 'TMCC',
                  'date' => '10 OCT 2017'];
        //$p = Participant::find($participant->id);
        Mail::to($participant->email)->send(new RegistrationConfirmation($participant));
      }else{
        DB::rollBack();
      }
      return view('registration.confirmation',compact('participant','qr'));
    }

    public function attend($slug){

        $participant = Participant::findBySlug($slug);
        if (!$participant){
          return redirect()->route('event_day')->with('warning','Registration not found.');
        }

        return view('registration.confirmation',compact('participant'));
    }

    public function show(Participant $participant){

      return view('registration.confirmation',compact('participant'));
    }
}
