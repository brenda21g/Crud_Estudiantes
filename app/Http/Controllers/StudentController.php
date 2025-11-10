<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Career;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('career')->latest()->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $careers = Career::all();
        return view('students.create', compact('careers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'career_id' => 'required|exists:careers,id',
            'semester' => 'required|integer|min:1|max:12',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'career_id' => $request->career_id,
            'semester' => $request->semester,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante registrado correctamente.');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $careers = Career::all();
        return view('students.edit', compact('student', 'careers'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $student->id,
            'career_id' => 'required|exists:careers,id',
            'semester' => 'required|integer|min:1|max:12',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'career_id' => $request->career_id,
            'semester' => $request->semester,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
    }
    public function show($id)
    {
        $student = Student::with('career')->findOrFail($id);
        return view('students.show', compact('student'));
    }
}
