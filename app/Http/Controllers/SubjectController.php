<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('class')->get();

        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        Subject::create([
            'subject_name' => $request->subject_name,
            'class_id' => $class->id,
        ]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'subject_name' => 'required|string|max:255',
    //         'class_id' => 'required|exists:school_classes,id',
    //     ]);

    //     Subject::create([
    //         'subject_name' => $request->subject_name,
    //         'class_id' => $request->class_id,
    //     ]);

    //     return redirect()->route('subjects.index')
    //         ->with('success', 'Subject created successfully');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class_id' => 'required|exists:school_classes,id',
        ]);

        Subject::create([
            'subject_name' => $request->subject_name,
            'class_id' => $request->class_id, // ✅ REQUIRED
        ]);

        return redirect()->back()->with('success', 'Subject created successfully');
    }

    public function show(Subject $subject)
    {
        $subject->load('class');

        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $classes = SchoolClass::all();

        return view('subjects.edit', compact('subject', 'classes'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);

        $subject->update([
            'subject_name' => $request->subject_name,
        ]);

        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
}
