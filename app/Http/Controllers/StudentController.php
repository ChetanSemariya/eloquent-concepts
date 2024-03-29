<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

/* ---- DEFINE ONE TO MANY RELATIONSHIP --- */
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::with('book')->get();
        // $students = Student::with('book')->find(2); // for fetching single record

        /* --- WE CAN ALSO WRITE LIKE THAT --- */

        // $students = Student::find(2);
        // $books = $students->book;

        /* --- UNN STUDENTS KA DATA SHOW KREGA JINHONE ABHI TAK EK BHI BOOK NAHI LI HAI --- */
        // $students = Student::doesntHave('book')->get(); // here book is relationship name 

        /* --- UNN STUDENTS KA DATA SHOW KREGA JINHONE KOI BHI BOOK LI HAI --- */
        // $students = Student::has('book')->get();

        /* --- UNN STUDENTS KA DATA SHOW KREGA JINHONE KOI BHI BOOK LI HAI with book Detail --- */
        // $students = Student::has('book')->with('book')->get();

        /* --- UNN STUDENTS KA DATA SHOW KREGA JINHONE ek se jyada book li hai  --- */
        // $students = Student::has('book', '>=', 2)
        //                     ->with('book')
        //                     ->get();

        /* --- COUNTS KO SHOW KRNE K LIYE ISS METHOD KA USE KRENGE --- */
        $students = Student::withCount('book')->get();

        return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
