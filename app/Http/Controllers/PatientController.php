<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::query()->with(['next_of_kin', 'alergies', 'conditions', 'medications',])->get();
        $items = PatientResource::collection($patients);
        return view('index', compact('items'));
    }
}
