<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Contact;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::with('contact')->get(); // with ke sath func ka naam aata hai jo humne model mai banaya hai 
        // $students = Student::with('contact')->find(2);

        /* ------- AGAR STUDENTS TABLE MAI SEARCHES KRNA HAI TO WHERE KA USE HOGA ---- */
        // $students = Student::with('contact')->where('gender','F')->get();
        
        /* ------ BUT AGAR CONTACT VALI TABLE MAI SE DATA RETRIEVE KRNA HAI TO CONDITION LAGAKE TO WHERE METHOD KA USE NAHI HOGA USKE LIYE WITHWHEREHAS LAGANE HOGA */
        $students = Student::where('gender','F')->withWhereHas('contact',function($query){
            $query->where('city','pune');
        })->get();

        /* -- only student table ka record show krega but contact table ka bhi filter apply hoga uspe --- */
        $students = Student::where('gender','F')->whereHas('contact',function($query){
            $query->where('city','pune');
        })->get();
        
        // echo $students->name ."<br>";
        // echo $students->contact->email ."<br>";
        return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ek hi controller se dono table mai data insert karayenge
        $student = Student::create([
            'name' => 'john Abraham',
            'age' => 18,
            'gender' => 'M'
        ]);

        // yaha vahi func ka name aayga jo humne student model mai define kiya tha 
        $student->contact()->create([
            'email' => 'john@gmail.com',
            'phone' => '7868696786',
            'address' => 'kajipura ankpat marg',
            'city' => 'mumbai',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
