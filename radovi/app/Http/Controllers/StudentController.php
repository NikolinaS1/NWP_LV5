<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;

//StudentController koristi se za upravljanje logikom povezanom s prikazom radova na koje se student može prijaviti i mogućnošću prijave rada
//metoda show koristi za prikazivanje informacija o radovima
//metoda assignTask koristi se za odabir te otkazivanje rada
//ako je student prihvaćen, na zaslonu će mu se prikazat odgovarajuća poruka što se nalazi u student.blade.php

class StudentController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        $appliedPapers = Task::whereHas('students', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                })->get();
        
        $papers = Task::where('tip_studija', $user->tip_studija)->get();
        
        return view('student', compact('papers', 'user', 'appliedPapers'));
    }


    public function assignTask(Request $request)
    {
        $taskId = $request->input('task_id');
        $task = Task::findOrFail($taskId);
        $userId = Auth::id();

        if ($request->input('action') === 'apply') {
            if (!$task->students->contains($userId)) {
                $task->students()->attach($userId);
            }
        } elseif ($request->input('action') === 'cancel') {
            $task->students()->detach($userId);
        }

        return redirect()->back()->with('success', 'Task assignment updated successfully.');
    }
}
