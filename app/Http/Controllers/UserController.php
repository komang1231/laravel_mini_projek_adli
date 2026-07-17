<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function profile()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }
    public function editProfile()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'no_hp' => 'nullable|max:20',
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('profile')
            ->with('success', 'Profile berhasil diperbarui.');
    }
    public function editPassword()
    {
        return view('profile.password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile')
            ->with('success', 'Password berhasil diubah.');
    }

    public function index(Request $request): View
    {
        $search = $request->search;
        $sort = $request->sort ?? 'asc';
        $query = User::query();

        if ($search) {
            $query->where('kode_user', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        }

        $users = $query
            ->orderBy('id', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();

        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return Redirect::route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return Redirect::route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::findOrFail($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function trash(Request $request): View
    {
        $search = $request->search;

        $query = User::onlyTrashed();

        if ($search) {
            $query->where('kode_user', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        }

        $users = $query
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('user.trash', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    public function restore($id): RedirectResponse
    {
        User::onlyTrashed()->findOrFail($id)->restore();

        return Redirect::route('users.trash')
            ->with('success', 'User berhasil dipulihkan.');
    }

    public function forceDelete($id): RedirectResponse
    {
        User::onlyTrashed()->findOrFail($id)->forceDelete();

        return Redirect::route('users.trash')
            ->with('success', 'User berhasil dihapus permanen.');
    }
}
