<?php

namespace App\Http\Controllers;

use App\Models\SatuanPolda;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        $data['roles'] = Role::all();
        $data['poldas'] = SatuanPolda::all();
        return view('content.user.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $role = Role::find($request->role);
            $user = User::create([
                'name' => $request->name,
                'username' => strtolower($request->username),
                'password' => bcrypt($request->password)
            ]);
            $user->assignRole($role);
            if ($role->name == 'polda') {
                $user->polda_id = $request->polda;
            } elseif ($role->name == 'polres') {
                $user->polda_id = $request->polda;
                $user->polres_id = $request->polres;
            }
            $user->save();

            return redirect()->back()->with('success', 'Success Create User');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Failed Create User');
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        $role = Role::where('name', $user->getRoleNames()[0])->first();

        return response()->json([
            'data' => $user,
            'role' => $role
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->password) $user->password = bcrypt($request->password);
        $role = Role::find($request->role);
        // dd($role);
        $user->syncRoles($role);
        if ($role->name == 'polda') {
            $user->polda_id = $request->polda;
        } elseif ($role->name == 'polres') {
            $user->polda_id = $request->polda;
            $user->polres_id = $request->polres;
        }
        $user->save();

        return redirect()->back()->with('success', 'Success Edit User');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) $user->delete();
        else return redirect()->back()->with('error', 'Data not Found!');
        return redirect()->back()->with('success', 'Success!');
    }
}
