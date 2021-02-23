<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ResearchDataRequest;
use App\Models\CraniofacialCleftBaby;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CraniofacialCleftBabyController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function research_form (Request $request) {
        return view('research_form');
    }

    public function craniofacial_babies (Request $request) {
        return view('craniofacial_babies');
    }

    public function craniofacial_babies_data (Request $request) {
        $data = CraniofacialCleftBaby::with('address')->get();
        return response()->json($data);
    }

    public function craniofacial_baby_show (Request $request,  CraniofacialCleftBaby $cleft_baby) {
        // return view('craniofacial_baby');
        return view('craniofacial_baby', ['cleft_baby' => $cleft_baby->with(['address', 'father', 'mother', 'mother.pregnancy', 'mother.delivery', 'mother.newborn', 'speechDevelopment', 'hearingDevelopment', 'treatment', 'outcome'])->first()]);
    }

    public function craniofacial_baby (Request $request) {
        $baby = CraniofacialCleftBaby::findOrFail($request->cleft_baby)->with(['address', 'father', 'mother', 'mother.pregnancy', 'mother.delivery', 'mother.newborn', 'speechDevelopment', 'hearingDevelopment', 'treatment', 'outcome'])->first();
        // return 'test';
        return response()->json($baby);
    }

    public function checkEmail (EmailRequest $request) {
        return response()->json(['valid' => true, 'message' => 'Success']);
        // $emailExists = CraniofacialCleftBaby::whereEmail($request->email)->exists();
        // return response()->json(['valid' => !$emailExists , 'message' => $emailExists ? 'Email already taken!' : 'Success']);
    }

    public function save (ResearchDataRequest $request) {
        $inputs = $request->input();
        $contactDetails = $inputs['cleftBaby'];
        $addressInput = $contactDetails['address'];
        unset($contactDetails['address']);
        $clefBabyInput = $contactDetails;
        $user = auth()->user();
        $clefBabyInput['created_by'] = $user->name;
        $fatherInput = $inputs['father'];
        $motherInput = $inputs['mother'];
        $newbornInput = $inputs['newborn'];
        $deliveryInput = $inputs['delivery'];
        $pregnancyInput = $inputs['pregnancy'];
        $speechInput = $inputs['speech_development'];
        $hearingInput = $inputs['hearing_development'];
        $treatmentInput = $inputs['treatment'];
        $outcomeInput = $inputs['outcome'];
        // $clefBabyInput = $request->except(['outcome', 'cleftBaby.address']);
        // $addressInput = $request->only('cleftBaby.address');
        // return $user->name;

        DB::beginTransaction();
        try {
            $CleftBaby = CraniofacialCleftBaby::create($clefBabyInput);
            $address = $CleftBaby->address()->create($addressInput);
            $father = $CleftBaby->father()->create($fatherInput);
            $mother = $CleftBaby->mother()->create($motherInput);
            $pregnancy = $mother->pregnancy()->create($pregnancyInput);
            $delivery = $mother->delivery()->create($deliveryInput);
            $newborn = $mother->newborn()->create($newbornInput);
            $speechDevelopment = $CleftBaby->speechDevelopment()->create($speechInput);
            $hearingDevelopment = $CleftBaby->hearingDevelopment()->create($hearingInput);
            $treatment = $CleftBaby->treatment()->create($treatmentInput);
            $outcome = $CleftBaby->outcome()->create($outcomeInput);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Error', 'message' => $e], 401);
        }

        return response()->json(['status' => 'Success', 'message' => 'Data saved successfully.']);
    }
}
