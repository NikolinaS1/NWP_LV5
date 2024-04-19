<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//TeacherController upravlja radnjama vezanim uz radove (profesor)
//metoda addPaper obrađuje zahtjev za dodavanje novog rada
//show metoda prikazuje sve radove koji su trenutno dostupni
//showAppliedStudents prikazuje sve studente koji su se prijavili za određeni rad
//assignStudent metoda dodjeljuje studenta određenom radu

class TeacherController extends Controller
{
    public function addPaper(Request $request)
    {
        $request->validate([
            'naziv_rada' => 'required|string',
            'naziv_rada_en' => 'required|string',
            'zadatak_rada' => 'required|string',
            'tip_studija' => 'required|string',
            ], [
            'required' => __('messages.required_field'),
        ]);

        $task = new Task();
        $task->naziv_rada = $request->naziv_rada;
        $task->naziv_rada_en = $request->naziv_rada_en;
        $task->zadatak_rada = $request->zadatak_rada;
        $task->tip_studija = $request->tip_studija;
        $task->teacher_id = Auth::id(); 

        $task->save();

        return redirect()->route('teacher')->with('success', 'Paper added successfully!');
    }

    public function show()
    {
        $papers = Task::all();
        return view('teacher', compact('papers'));
    }

    public function showAppliedStudents($paper_id)
    {
        $paper = Task::findOrFail($paper_id);
        $appliedStudents = $paper->students;

        return view('prijave', compact('paper', 'appliedStudents'));
    }

    public function assignStudent(Request $request, $paper_id)
    {
        $paper = Task::findOrFail($paper_id);
        
        if ($paper->teacher_id !== Auth::id()) {
            return back()->with('error', 'You are not authorized to set student for this paper.');
        }
        
        $student_id = $request->input('student_id');
        $student = User::findOrFail($student_id);
        
        if ($paper->student_id !== null) {
            $paper->student_id = $student_id;
            $paper->save();
            
            return redirect()->route('teacher')->with('success', 'Student successfully assigned for the paper.');
        }
        
        if (!$paper->students->contains($student)) {
            return back()->with('error', 'Selected student did not apply for this paper.');
        }
        
        $paper->student_id = $student_id;
        $paper->save();
        
        return redirect()->route('teacher')->with('success', 'Student successfully assigned for the paper.');
    }
}
