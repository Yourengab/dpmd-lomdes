<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Judge;
use App\Models\ScoringTemplate;

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

    public function administrasi($id)
    {
        $template = ScoringTemplate::findOrFail($id);
        if (!in_array($template->category, ['tahap_administrasi', 'tahap_administrasi_desa', 'tahap_administrasi_kelurahan'])) {
            abort(404);
        }
        return view('judge.scoring.administrasi', compact('template'));
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
     * Show the scoring templates page with category filtering.
     */
    public function scoring(Request $request)
    {
        $category = $request->get('category');

        $query = \App\Models\ScoringTemplate::with('adminDocument')->latest();

        if (in_array($category, ['tahap_administrasi_desa', 'tahap_administrasi_kelurahan'])) {
            $map = [
                'tahap_administrasi_desa' => 'village',
                'tahap_administrasi_kelurahan' => 'district',
            ];

            $query->whereHas('adminDocument', function ($q) use ($map, $category) {
                $q->where('category', $map[$category]);
            });
        } elseif ($category) {
            $query->where('category', $category);
        }

        $scoringTemplates = $query->get();

        return view('judge.scoring', compact('scoringTemplates', 'category'));
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

    /**
     * Show Tahap Administrasi Desa scoring form with village admin documents.
     */
    public function administrasiDesaForm($id)
    {
        $template = ScoringTemplate::whereIn('category', 'tahap_administrasi')->findOrFail($id);

        if (!in_array($template->category, ['tahap_administrasi'])) {
            abort(404);
        }

        // Get all village admin documents to display in the scoring form
        $adminDocuments = \App\Models\AdminDocument::where('category', 'village')->latest()->get();

        return view('judge.scoring.administrasi', compact('template', 'adminDocuments'));
    }

    /**
     * Show Tahap Administrasi Kelurahan scoring form with district admin documents.
     */
    public function administrasiKelurahanForm($id)
    {
        $template = ScoringTemplate::whereIn('category', 'tahap_administrasi')->findOrFail($id);
        dd($template);

        if (!in_array($template->category, ['tahap_administrasi'])) {
            abort(404);
        }

        // Get all district admin documents to display in the scoring form
        $adminDocuments = \App\Models\AdminDocument::where('category', 'district')->latest()->get();


        return view('judge.scoring.administrasi', compact('template', 'adminDocuments'));
    }

    /**
     * Show Tahap Pemaparan Questions scoring form.
     */
    public function pemaparanQuestions($id)
    {
        $template = ScoringTemplate::findOrFail($id);

        if ($template->category !== 'tahap_pemaparan') {
            abort(404);
        }

        return view('judge.scoring.pemaparan-questions', compact('template'));
    }

    /**
     * Show Tahap Pemaparan Village scoring form.
     */
    public function pemaparanVillage($id)
    {
        $template = ScoringTemplate::findOrFail($id);

        if ($template->category !== 'tahap_pemaparan') {
            abort(404);
        }

        return view('judge.scoring.pemaparan-village', compact('template'));
    }

    /**
     * Show Tahap Pemaparan District scoring form.
     */
    public function pemaparanDistrict($id)
    {
        $template = ScoringTemplate::findOrFail($id);

        if ($template->category !== 'tahap_pemaparan') {
            abort(404);
        }

        return view('judge.scoring.pemaparan-district', compact('template'));
    }

    /**
     * Show Tahap Klarifikasi Lapangan scoring form.
     */
    public function klarifikasiForm($id)
    {
        $template = ScoringTemplate::findOrFail($id);

        if ($template->category !== 'tahap_klarifikasi_lapangan') {
            abort(404);
        }

        return view('judge.scoring.klarifikasi', compact('template'));
    }

    /**
     * Show Daftar Inovasi scoring form.
     */
    public function inovasiForm($id)
    {
        $template = ScoringTemplate::findOrFail($id);

        if ($template->category !== 'daftar_inovasi') {
            abort(404);
        }

        return view('judge.scoring.inovasi', compact('template'));
    }
}
