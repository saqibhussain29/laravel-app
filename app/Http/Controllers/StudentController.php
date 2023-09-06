<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
 
  public function create()
  {

    return view('Studentform');
  }
  public function studentvalid(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'name' => 'required',
      'father_name' => 'required',
      'mother_name' => 'required',
      'class' => 'required',
      'address' => 'required',
      'school' => 'required',
      'contact' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    $studentData = [
      'name' => $request->name,
      'father_name' => $request->father_name,
      'mother_name' => $request->mother_name,
      'class' => $request->class,
      'address' => $request->address,
      'school' => $request->school,
      'contact' => $request->contact,

    ];
    if ($request->hasFile('image')) {

      $imagePath = $request->file('image')->store('images');
      $studentData['image'] = $imagePath;
    }

    // dd($studentData);
    student::create($studentData);
    session()->flash('enter');
    return redirect('home');
  }
  // public function showData()
  // {
  //   $students = Student::all();
    

 
  //   return view('home', compact('students'));
  // }
  /// /////    working on search Bar ////////
  public function search(Request $request)
  {
      $query = Student::query();
  
      if ($request->ajax()) {
          $search = $request->input('name'); // Assuming you're searching by name
          $students = $query
              ->where('name', 'LIKE', '%' . $search . '%')
              ->orWhere('father_name', 'LIKE', '%' . $search . '%')
              // ->orWhere('class', 'LIKE', '%' . $search . '%')
              ->get();
          return response()->json(['students' => $students]);
      } else {
          // Handle non-AJAX requests
          $students = $query->get();
          return view('home', compact('students'));
      }
  }
  

      public function remove($id)
  {
    $student = Student::find($id);

    if ($student) {
      // Delete the image from the folder
      if ($student->image && Storage::exists($student->image)) {
        Storage::delete($student->image);
      }

      // Delete the student record
      $student->delete();
      session()->flash('error');
      return redirect('home');
    }
    // return redirect('home');
  }
  public function detail($id)
  {
    $student = Student::find($id);
    return view('detail', compact('student'));
  }




  public function update($id)
  {
    $student = Student::find($id);
    return view('show', compact('student'));
  }

  public function edit(Request $request, $id)
  {
    $request->validate([
      'name' => 'required',
      'father_name' => 'required',
      'mother_name' => 'required',
      'class' => 'required',
      'address' => 'required',
      'school' => 'required',
      'contact' => 'required',
      // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Change 'required' to 'nullable'
    ]);

    $studentData = [
      'name' => $request->name,
      'father_name' => $request->father_name,
      'mother_name' => $request->mother_name,
      'class' => $request->class,
      'address' => $request->address,
      'school' => $request->school,
      'contact' => $request->contact,
      
    ];

    $student = Student::find($id);
    $currentImagePath = $student->image;

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($currentImagePath) {
            Storage::delete($currentImagePath);
        }

        // Store and update the new image path
        $imagePath = $request->file('image')->store('images');
        $studentData['image'] = $imagePath;
    }

    // Update the student's data based on their id
    Student::where('id', $id)->update($studentData);
    session()->flash('success');

    return redirect('home');
}


 
}
