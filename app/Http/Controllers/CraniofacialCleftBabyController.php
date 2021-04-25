<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ResearchDataRequest;
use App\Models\CraniofacialCleftBaby;
use App\Models\Mother;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CraniofacialCleftBabyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('craniofacial_baby');
        // return view('craniofacial_baby', ['cleft_baby' => $cleft_baby->with(['address', 'father', 'mother', 'mother.pregnancy', 'mother.delivery', 'mother.newborn', 'speechDevelopment', 'hearingDevelopment', 'treatment', 'outcome'])->first()]);
    }

    public function craniofacial_baby_delete (Request $request,  CraniofacialCleftBaby $cleft_baby) {
        $cleft_baby->delete();
        return back();
        // return view('craniofacial_baby', ['cleft_baby' => $cleft_baby->with(['address', 'father', 'mother', 'mother.pregnancy', 'mother.delivery', 'mother.newborn', 'speechDevelopment', 'hearingDevelopment', 'treatment', 'outcome'])->first()]);
    }

    public function craniofacial_baby (Request $request) {
        $baby = CraniofacialCleftBaby::findOrFail($request->cleft_baby)->with(['address', 'father', 'mother', 'mother.pregnancy', 'mother.delivery', 'mother.newborn', 'speechDevelopment', 'hearingDevelopment', 'treatment', 'outcome'])->first();
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
        unset($contactDetails['complete']);
        $cleftBabyInput = $contactDetails;
        $user = auth()->user();
        $cleftBabyInput['created_by'] = $user->name;
        $fatherInput = $inputs['father'];
        unset($fatherInput['complete']);
        $motherInput = $inputs['mother'];
        unset($motherInput['complete']);
        $newbornInput = $inputs['newborn'];
        unset($newbornInput['complete']);
        $deliveryInput = $inputs['delivery'];
        unset($deliveryInput['complete']);
        $pregnancyInput = $inputs['pregnancy'];
        unset($pregnancyInput['complete']);
        $speechInput = $inputs['speech_development'];
        unset($speechInput['complete']);
        $hearingInput = $inputs['hearing_development'];
        unset($hearingInput['complete']);
        $treatmentInput = $inputs['treatment'];
        unset($treatmentInput['complete']);
        $outcomeInput = $inputs['outcome'];
        unset($outcomeInput['complete']);
        // $cleftBabyInput = $request->except(['outcome', 'cleftBaby.address']);
        // $addressInput = $request->only('cleftBaby.address');
        // return $user->name;

        DB::beginTransaction();
        try {
            $CleftBaby = CraniofacialCleftBaby::create($cleftBabyInput);
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
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 401);
        }

        return response()->json(['status' => 'Success', 'message' => 'Data saved successfully.']);
    }

    public function update (Request $request) {
        $babyDetails = $request->input();
        $user = auth()->user();
        // $babyDetails = $babyDetails['cleftBaby'];
        $addressInput = $babyDetails['address'];
        unset($babyDetails['address']);
        $cleftBabyInput['created_by'] = $user->name;
        $fatherInput = $babyDetails['father'];
        unset($babyDetails['father']);

        $newbornInput = $babyDetails['mother']['newborn'];
        unset($babyDetails['mother']['newborn']);
        $deliveryInput = $babyDetails['mother']['delivery'];
        unset($babyDetails['mother']['delivery']);
        $pregnancyInput = $babyDetails['mother']['pregnancy'];
        unset($babyDetails['mother']['pregnancy']);
        $motherInput = $babyDetails['mother'];
        unset($babyDetails['mother']);
        $speechInput = $babyDetails['speech_development'];
        unset($babyDetails['speech_development']);
        $hearingInput = $babyDetails['hearing_development'];
        unset($babyDetails['hearing_development']);
        $treatmentInput = $babyDetails['treatment'];
        unset($babyDetails['treatment']);
        $outcomeInput = $babyDetails['outcome'];
        unset($babyDetails['outcome']);
        $cleftBabyInput = $babyDetails;

        DB::beginTransaction();
            try {
            $CleftBaby = CraniofacialCleftBaby::findOrFail($cleftBabyInput['id']);
            $CleftBaby->update($cleftBabyInput);
            $address = $CleftBaby->address->update($addressInput);
            $father = $CleftBaby->father->update($fatherInput);
            $mother = Mother::findOrFail($motherInput['id']);
            $mother->update($motherInput);
            $pregnancy = $mother->pregnancy->update($pregnancyInput);
            $delivery = $mother->delivery->update($deliveryInput);
            $newborn = $mother->newborn->update($newbornInput);
            $speechDevelopment = $CleftBaby->speechDevelopment->update($speechInput);
            $hearingDevelopment = $CleftBaby->hearingDevelopment->update($hearingInput);
            $treatment = $CleftBaby->treatment->update($treatmentInput);
            $outcome = $CleftBaby->outcome->update($outcomeInput);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 401);
        }

        return response()->json(['status' => 'Success', 'message' => 'Data updated successfully.']);
    }
}
