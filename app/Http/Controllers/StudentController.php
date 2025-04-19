<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewStudentNotification;
use App\Mail\UpdatedStudentNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\Group;



class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('city')->paginate(20);
        return view('students.index', compact('students'));
    }

    public function trashed()
    {
        $students = Student::onlyTrashed()->with('city')->paginate(10);
        return view('students.trashed', compact('students'));
    }

    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('students.trashed')->with('success', 'Studentas atkurtas!');
    }

    public function forceDelete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('students.trashed')->with('success', 'Studentas visam laikui pašalintas.');
    }

    public function create()
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.create', compact('cities', 'groups'));
    }

public function store(Request $request)
{
    Log::info('Incoming request data:', $request->all());

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'address' => 'required|string',
        'phone' => 'required|string|max:20',
        'city_id' => 'required|exists:cities,id',
        'grupe_id' => 'required|exists:groups,id',
        'gim_data' => 'required|date',
    ]);

    $asmensKodas = $this->generateAsmensKodas($request->gim_data);
    $student = Student::create(array_merge($request->all(), ['asmens_kodas' => $asmensKodas]));

	Mail::to('forgamesandstuf0001@gmail.com')->send(new NewStudentNotification($student));
    return redirect()->route('students.index')->with('success', 'Studentas pridėtas!');
	
}

    public function edit(Student $student)
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.edit', compact('student', 'cities', 'groups'));
    }
	
	private function generateAsmensKodas($birthDate)
{
    $year = date('Y', strtotime($birthDate));
    $month = date('m', strtotime($birthDate));
    $day = date('d', strtotime($birthDate));
    $randomDigits = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

    return $year[2] . $year[3] . $month . $day . $randomDigits;
}


    public function update(Request $request, Student $student)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'address' => 'required|string',
        'phone' => 'required|string|max:20',
        'city_id' => 'required|exists:cities,id',
        'grupe_id' => 'required|exists:groups,id',
        'gim_data' => 'required|date',
    ]);

    $student->update($request->all());

    Mail::to('forgamesandstuf0001@gmail.com')->send(new UpdatedStudentNotification($student));

    return redirect()->route('students.index')->with('success', 'Studento duomenys atnaujinti!');
}

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Studentas buvo pažymėtas kaip ištrintas.');
    }
}