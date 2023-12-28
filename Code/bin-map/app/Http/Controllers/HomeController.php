<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Bin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $bins = Bin::all();
        return view('home', ['bins' => $bins]);
        // return view('home');
    }
//     public function index()
// {
//     $bins = Bin::all(); // fetch all bins from the database
//     return view('home', ['bins' => $bins]); // pass the bins data to the home view
// }
    public function store(Request $request)
{
    $bin = new Bin;
    $bin->identifier = $request->identifier;
    $bin->location = $request->location;
    $bin->type = $request->type;
    $bin->size = $request->size;
    $bin->fullness = $request->fullness;
    $bin->save();

    return redirect()->back()->with('success', 'Bin saved successfully!');
}
public function deleteBin($id)
{
    $bin = Bin::find($id);

    if ($bin) {
        $bin->delete();
        return redirect()->back()->with('success', 'Bin deleted successfully!');
    } else {
        return redirect()->back()->with('error', 'Bin not found!');
    }
}
public function register()
{

    return view('auth.register');
}
}
