<?php

namespace Modules\User\Http\Controllers;

use Modules\User\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index() {
        abort_if(Gate::denies('access_user_management'), 403);
        $users = User::latest()->get();

        return view('user::users.index',compact("users"));
    }


    public function create() {
        abort_if(Gate::denies('access_user_management'), 403);

        return view('user::users.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('access_user_management'), 403);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255|confirmed'
        ]);

        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/users'), $imageName);

        }
        $role_id = Role::where('name',$request->role)->first();
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'image'    => $imageName,
            'role_id'    => $role_id->id,
            'status' => $request->status
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Created Successfully');
    }


    public function edit(User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        return view('user::users.edit', compact('user'));
    }


    public function update(Request $request, User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        if($request->password){
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|max:255|unique:users,email,'.$user->id,
                'password' => 'string|min:8|max:255|confirmed'
            ]);
        }
        else{
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|max:255|unique:users,email,'.$user->id,
            ]);
        }

        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/users'), $imageName);

        }
        else{
            $imageName = $user->image;
        }
        $role_id = Role::where('name',$request->role)->first();
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageName,
            'role_id' => $role_id->id,
            'status' => $request->status
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'Updated Successfully');
    }


    public function destroy(User $user) {
        abort_if(Gate::denies('access_user_management'), 403);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Removed Successfully');
    }

    public function status($id)
    { 
        abort_if(Gate::denies('access_user_management'), 403);
        $user = User::findOrfail($id);
        if($user->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $user->update([
           'status' => $status 
        ]);
        return redirect()->route('users.index')->with('success', 'Status Updated Successfully');
    }
}
