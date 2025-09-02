<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Judge;

class JudgeController extends Controller
{
    /**
     * Display a listing of judges.
     */
    public function index()
    {
        $judges = Judge::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.judges.index', compact('judges'));
    }

    /**
     * Show the form for creating a new judge.
     */
    public function create()
    {
        return view('admin.judges.create');
    }

    /**
     * Store a newly created judge in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'nullable|string|max:150',
            'indicator_assigned' => 'nullable|string|max:100',
            'username' => 'required|string|max:100|unique:judges',
            'password' => 'required|string|min:6',
        ]);

        Judge::create([
            'name' => $request->name,
            'position' => $request->position,
            'indicator_assigned' => $request->indicator_assigned,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.judges.index')->with('success', 'Judge created successfully.');
    }

    /**
     * Display the specified judge.
     */
    public function show(Judge $judge)
    {
        return view('admin.judges.show', compact('judge'));
    }

    /**
     * Show the form for editing the specified judge.
     */
    public function edit(Judge $judge)
    {
        return view('admin.judges.edit', compact('judge'));
    }

    /**
     * Update the specified judge in storage.
     */
    public function update(Request $request, Judge $judge)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'nullable|string|max:150',
            'indicator_assigned' => 'nullable|string|max:100',
            'username' => 'required|string|max:100|unique:judges,username,' . $judge->id,
            'password' => 'nullable|string|min:6',
        ]);

        $updateData = [
            'name' => $request->name,
            'position' => $request->position,
            'indicator_assigned' => $request->indicator_assigned,
            'username' => $request->username,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $judge->update($updateData);

        return redirect()->route('admin.judges.index')->with('success', 'Judge updated successfully.');
    }

    /**
     * Remove the specified judge from storage.
     */
    public function destroy(Judge $judge)
    {
        $judge->delete();
        return redirect()->route('admin.judges.index')->with('success', 'Judge deleted successfully.');
    }

    /**
     * Show the judge login form.
     */
    public function showLoginForm()
    {
        return view('judge.login');
    }

    /**
     * Handle judge login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('judge')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/judge/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    /**
     * Show the judge dashboard.
     */
    public function dashboard()
    {
        return view('judge.dashboard');
    }

    /**
     * Handle judge logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('judge')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/judge/login');
    }
}
