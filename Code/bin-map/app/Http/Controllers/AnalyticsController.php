<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;



class AnalyticsController extends Controller
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
    public function index()
    {
        
      


$bins = DB::table('bins')->distinct()->pluck('identifier');
$chartData = [];

// Get the fullness values for each bin
foreach($bins as $bin) {
    $fullnessValues = [];
    $months = [];

    $currentMonth = Carbon::now()->month;

    // Get the fullness values for each month of the year
    for ($i = 1; $i <= 12; $i++) {
        $fullnessValue = DB::table('bins')
            ->where('identifier', $bin)
            ->whereMonth('created_at', '=', $i)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($fullnessValue) {
            $fullnessValues[] = $fullnessValue->fullness;
        } else {
            $fullnessValues[] = null;
        }

        if ($i <= $currentMonth) {
            $months[] = Carbon::createFromDate(null, $i, null)->format('F');
        } else {
            $months[] = null;
        }
    }

    // Add the data to the chart data array
    $chartData[] = [
        'label' => $bin,
        'data' => $fullnessValues,
        'months' => $months,
        'backgroundColor' => '#329600',
        'borderColor' => '#329600',
        'borderWidth' => 1,
    ];
}

return view('analytics', compact('chartData'));
}

    // public function sendEmail(Request $request)
    // {
    //     $this->validate($request, [
            
    //         'email' => 'required|email',
            
    //     ]);
       
    //     $data = [
    //         'company' => $request->input('company'),
    //         'contact_name' => $request->input('contact_name'),
    //         'email' => $request->input('email'),
    //         'phone' => $request->input('phone'),
    //         'location' => $request->input('location'),
    //         'size' => $request->input('size'),
    //         'power_supply' => $request->input('power_supply'),
    //         'material' => $request->input('material'),
    //         'waste' => $request->input('waste'),
    //         'additional_info' => $request->input('additional_info'),
    //     ];
        
    //     // Mail::send($body, $data, function ($message) use ($data) {
    //     //     $message->to('danish250ahmad@gmail.com')
    //     //         ->subject('New Contact Form Submission')
    //     //         ->from('danish250ahmad@gmail.com', $data['contact_name']);
    //     // });
    //     Mail::send('emailForm', $data, function($message) use ($data) {
    //         $message->to('danish250ahmad@gmail.com');
    //         $message->subject('Contact Form: '.$data['contact_name']);
    //         $message->from($data['email']);
    //     });
        

    //     // return redirect()->back()->with('success', 'Your message has been sent successfully.');
    // }

    public function sendEmail(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
    ]);
   
    $data = [
        'company' => $request->input('company'),
        'contact_name' => $request->input('contact_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'location' => $request->input('location'),
        'size' => $request->input('size'),
        'power_supply' => $request->input('power_supply'),
        'material' => $request->input('material'),
        'waste' => $request->input('waste'),
        'additional_info' => $request->input('additional_info'),
    ];
    
    Mail::send('emailForm', ['data' => $data], function($message) use ($data) {
        $message->to('danish250ahmad@gmail.com');
        $message->subject('Contact Form: '.$data['contact_name']);
        $message->from($data['email']);
    });
    // dd($data['email']);
    return redirect()->back()->with('success', 'Your message has been sent successfully.');
}



}
