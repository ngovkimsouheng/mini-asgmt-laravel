<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        // $classes = SchoolClass::withCount(['students', 'subjects'])->get();
        $classes = SchoolClass::withCount(['students', 'subjects'])
            ->paginate(5);

        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
        ]);

        SchoolClass::create($validated);

        return redirect()->route('classes.index')
            ->with('success', 'School class created successfully.');
    }

    public function show(SchoolClass $class)
    {
        $class->load('students', 'subjects');

        $allSubjects = Subject::all();

        return view('classes.show', compact('class', 'allSubjects'));
    }

    public function edit(SchoolClass $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
        ]);

        $class->update($validated);

        return redirect()->route('classes.index')
            ->with('success', 'School class updated successfully.');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('classes.index')
            ->with('success', 'School class deleted successfully.');
    }
}
