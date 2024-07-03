<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('activeRegion')->get();
        return view('admin.AccountManager.ShowAccount', compact('users'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('admin.AccountManager.CreateAccount', compact('regions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'active_region_id' => 'nullable|exists:regions,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $imagePath;
        $user->active_region_id = $request->input('active_region_id', 2);
        $user->save();

        return redirect()->route('AccountManager.ShowAccount')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $regions = Region::all();
        return view('admin.AccountManager.EditAccount', compact('user', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'active_region_id' => 'nullable|exists:regions,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->active_region_id = $request->active_region_id;
    
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $user->image = $imagePath;
        }
    
        $user->save();
        return redirect()->route('AccountManager.ShowAccount')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('AccountManager.ShowAccount')->with('success', 'User deleted successfully.');
    }

    public function showProfile($id)
    {
        $user = User::with('activeRegion')->findOrFail($id);
        return view('admin.AccountManager.ShowProfile', compact('user'));
    }

    public function Approve($id)
    {
        $user = User::findOrFail($id);
        // Thay đổi active_region_id thành 1 khi duyệt
        $user->active_region_id = 1;
        $user->save();

        return redirect()->route('AccountManager.ShowAccount')->with('success', 'Duyệt tài khoản thành công.');
    }
}
