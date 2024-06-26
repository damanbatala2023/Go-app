<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class CrudController extends Controller
{
    public function getRecordForm()
    {
        $users = User::all();
        return view('crud.record', compact('users'));
    }

    public function getEditForm($id)
    {
        $users = User::where('id', $id)->first();
        return view('crud.edit', compact('users'));
    }

    public function postEditForm($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $users = User::find($id);
        $users->update($request->only('name', 'email'));


        return redirect()->route('crud.record')->withSuccess('Updated successfully');
    }

    public function getDelete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return back()->withSuccess('Deleted successfully');
    }

    public function getRoleForm()
    {
        $users = User::all();
        return view('crud.role', compact('users'));
    }

    public function getEditRole($id)
    {
        $user = User::findOrFail($id);

        return view('crud.edit-role', compact('user'));
    }


    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->usertype = $request->input('usertype');
        $user->save();

        return redirect()->route('crud.role')->with('success', 'Role updated successfully');
    }
}
