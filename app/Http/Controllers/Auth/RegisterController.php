<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'comp_name' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     dd($data);
    //     // return User::create([
    //     //     'name' => $data['name'],
    //     //     'email' => $data['email'],
    //     //     'password' => Hash::make($data['password']),
    //     // ]);

    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->comp_name = $request->company_name;
    //     $user->occupation = $request->occupation;
    //     $user->phone = $request->mobile_number;
    //     $user->city = $request->city;
    //     $user->save();

    //     // QR Code will store URL
    //     $qrCodeValue = url('/user-details/' . $user->id);

    //     $fileName = 'qr_' . $user->id . '.svg';

    //     $folder = public_path('users_qr_images');
    //     if (!file_exists($folder)) {
    //         mkdir($folder, 0777, true);
    //     }

    //     $svgQr = QrCode::format('svg')->size(300)->generate($qrCodeValue);
    //     file_put_contents($folder . '/' . $fileName, $svgQr);

    //     $user->qr_code = $qrCodeValue;
    //     $user->qr_image = $fileName;
    //     $user->save();

    //     return redirect()->route('success')
    //         ->with('success', 'Registration successful!')
    //         ->with('user_id', $user->id);
    // }

    protected function create(array $data)
    {
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'comp_name' => $data['comp_name'],
            'occupation' => $data['occupation'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            //'password' => Hash::make('12345678'), // just example
        ]);
    }


    public function downloadIdCard($id)
    {
        $user = User::findOrFail($id);

        $pdf = Pdf::loadView('admin.user.id-card', compact('user'))
            ->setPaper('a6', 'portrait');

        return $pdf->download('id-card-' . $user->name . '.pdf');
    }



    protected function registered(Request $request, $user)
    {
        \Illuminate\Support\Facades\Auth::logout(); // logout user after registration

        $qrUrl = url('/user-details/' . $user->id);
        $fileName = 'qr_' . $user->id . '.svg';
        $folder = public_path('users_qr_images');

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $svgQr = QrCode::format('svg')->size(300)->generate($qrUrl);
        file_put_contents($folder . '/' . $fileName, $svgQr);

        $user->qr_code = $qrUrl;
        $user->qr_image = $fileName;
        $user->save();

        return redirect()->route('success')
            ->with('success', 'Registration successful!')
            ->with('user_id', $user->id);
    }




    public function success()
    {
        return view('auth.success');
    }
}
