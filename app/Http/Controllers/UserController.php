<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users  = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone_number', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('backend.users.index', [
            'users'  => $users,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * @param Request $request
     */
    public function publicFolderStore(Request $request)
    {
        if (!file_exists(public_path('uploads'))) {
            mkdir(public_path('uploads'), 0777, true);
        }

        $validatedData = $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'dob'          => 'required|date',
            'email'        => 'required|string|email|max:255|unique:users',
            'user_type'    => 'required|string|max:100',
            'password'     => 'required|string|min:8|confirmed',
            'user_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('user_picture')) {
            $fileName = time() . '.' . $request->user_picture->extension();
            $request->user_picture->move(public_path('uploads'), $fileName);
            $validatedData['user_picture'] = $fileName;
        }

        User::create([
            'name'         => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'dob'          => $validatedData['dob'],
            'email'        => $validatedData['email'],
            'user_type'    => $validatedData['user_type'],
            'password'     => bcrypt($validatedData['password']),
            'user_picture' => $validatedData['user_picture'] ?? null,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'dob'          => 'required|date',
            'email'        => 'required|string|email|max:255|unique:users',
            'user_type'    => 'required|string|max:100',
            'password'     => 'required|string|min:8|confirmed',
            'user_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('user_picture')) {
            $fileName                      = time() . '.' . $request->user_picture->extension();
            $path                          = $request->user_picture->storeAs('uploads', $fileName, 'public');
            $validatedData['user_picture'] = $path;
        }

        User::create([
            'name'         => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'dob'          => $validatedData['dob'],
            'email'        => $validatedData['email'],
            'user_type'    => $validatedData['user_type'],
            'password'     => bcrypt($validatedData['password']),
            'user_picture' => $validatedData['user_picture'] ?? null,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * @param User $user
     */
    public function show(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * @param User $user
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'dob'          => 'nullable|date',
            'email'        => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'user_type'    => 'nullable|string|max:100',
            'password'     => 'nullable|string|min:8|confirmed',
            'user_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('user_picture')) {
            if ($user->user_picture && Storage::disk('public')->exists($user->user_picture)) {
                Storage::disk('public')->delete($user->user_picture);
            }

            $filePath                      = $request->file('user_picture')->store('uploads', 'public');
            $validatedData['user_picture'] = $filePath;
        }

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * @param User $user
     */
    public function destroy(User $user)
    {
        if ($user->user_picture && Storage::disk('public')->exists($user->user_picture)) {
            Storage::disk('public')->delete($user->user_picture);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
