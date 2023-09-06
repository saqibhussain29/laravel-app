<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Monolog\Handler\IFTTTHandler;

class UserController extends Controller
{
    // Show all users
    public function UserShow()
    {

        $users = User::select('id', 'name', 'email','roll' , 'status' )->get();
        return view('UserHome', compact('users'));
    }

    // Search for users by name and/or email
    public function searches(Request $request)
    {
        $query = User::query();
    
        if ($request->ajax()){
            $search = $request->input('name'); // Assuming you're searching by name
            $users = $query
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->get();
            return response()->json(['users' => $users]);
        } else {
            $users = $query->get();
            return view('UserHome', compact('users'));
        }
    }
    
    public function DeleteUser($id)
    {
        // Find the user to be deleted
        $userToDelete = User::find($id);

        // Check if the user to be deleted is the same as the currently authenticated user
        if ($userToDelete && $userToDelete->id !== Auth::id()) {
            // Delete the user
            $userToDelete->delete();

            session()->flash('hello');
        } else {
            session()->flash('error');
        }
        return redirect('UserHome');
    }
    // ///

    // Show details of a specific user
    public function UserDetail($id)
    {
        $user = User::find($id);
        return view('user', compact('user'));
    }

    public function loginDetail($id)
    {
        $user = auth()->user();
        return view('edit', compact('user'));
    }

    public function passwordDetail($id)
    {
        $user = auth()->user();
        return view('UserPassword', compact('user'));
    }


    //Show login user details for editing  
    public function PasswordUpdates(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed'],
        ]);

        $currentUser = User::findOrFail(Auth::id());

        if (Hash::check($request->current_password, $currentUser->password)) {
            $currentUser->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect('UserHome');
        } else {

            return redirect()->back()->with('password_error', 'The current password you entered is incorrect.');
        }
    }
    public function loginUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|max:252',
    ]);

    $studentData = [
        'name' => $request->name,
        'email' => $request->email,
    ];

 
    User::where('id', $id)->update($studentData);
    session()->flash('success');
    return redirect('UserHome');
}


    public function deleteMultiple(Request $request)
{
    $selectedUserIds = $request->input('selected_records', []);
    
    // Get the ID of the currently authenticated user
    $currentUserId = auth()->user()->id;

    // Remove the current user's ID from the list of selected IDs
    $selectedUserIds = array_diff($selectedUserIds, [$currentUserId]);
    
    // Delete the selected users
    User::whereIn('id', $selectedUserIds)->delete();
    
    return redirect()->back()->with('hello', 'Selected users have been deleted.');   
}



// public function loginUpdatessssss(Request $request, $id)
// {
//     $request->validate([
//         'name' => 'required',
//         'email' => 'required|email|max:255',
//         'roll' => 'required',
//         'status'=> 'required',
//     ]);

//     $studentData = [
//         'name' => $request->name,
//         'email' => $request->email,
//         'roll' => $request->roll,
//         'status' => $request->status,

//     ];

    // Update the student's data based on their id
//     User::where('id', $id)->update($studentData);
//     session()->flash('success');
//     return redirect('UserHome');
// }

public function loginUpdates(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|max:255',
        'roll' => 'required',
        'status' => 'required',
    ]);

    $newEmail = $request->email;

    if (User::where('email', $newEmail)->where('id', '!=', $id)->exists()) {    
        return redirect()->back()->with('errord','Email address is already in use.');
    }

    $studentData = [
        'name' => $request->name,
        'email' => $newEmail, // Use the validated email here
        'roll' => $request->roll,
        'status' => $request->status,
    ];

    // Update the student's data based on their id
    User::where('id', $id)->update($studentData);
    session()->flash('success');
    return redirect('UserHome');
}


public function loginDetails($id)
{
    $user = User::find($id);
    return view('useredit', compact('user'));
}

public function status($id)
{
    $user = User::find($id);

    // Check if the current user is not the same as the user being modified
    if ($user->id !== auth()->user()->id){
        if ($user->status === 1) {
            $user->status = 0; session()->flash('active');          
        } else {
            $user->status = 1;session()->flash('inactive');
        }
            
        $user->save();
    }
    // dd($user->status);
    return redirect('UserHome');
}


}
