<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {
    public static function instance() {
        return new UserController();
    }

    function checkEmail(Request $request) {
        $data = $this->clearPostData($request->input());
        $api_response = (new APIRequestsController())->checkIfFreeEmail($data['email']);
        if($api_response->success) {
            return response()->json(['success' => true]);
        } else if(!$api_response->success) {
            return response()->json(['error' => true]);
        }
    }

    function checkCaptcha(Request $request) {
        $temp_save_captcha_session = session('captcha');
        //saving the session again, because theres bug in the captcha library

        if (captcha_check($request->input('captcha'))) {
            session(['captcha' => $temp_save_captcha_session]);;
            return response()->json(['success' => true]);
        } else {
            session(['captcha' => $temp_save_captcha_session]);
            return response()->json(['error' => true]);
        }
    }

    public function checkSession()   {
        if(!empty(session('logged_user')) && (session('logged_user')['type'] == 'dentist' || session('logged_user')['type'] == 'patient'))    {
            //LOGGED
            return true;
        }else {
            //NOT LOGGED
            return false;
        }
    }

    public function checkDentistSession()   {
        if(!empty(session('logged_user')) && session('logged_user')['type'] == 'dentist')    {
            //LOGGED
            return true;
        }else {
            //NOT LOGGED
            return false;
        }
    }

    public function checkPatientSession()   {
        if(!empty(session('logged_user')) && session('logged_user')['type'] == 'patient')    {
            //LOGGED
            return true;
        }else {
            //NOT LOGGED
            return false;
        }
    }

    protected function userLogout(Request $request) {
        $token = $this->encrypt(session('logged_user')['token'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY'));

        $request->session()->forget('logged_user');
        return redirect()->route('home')->with(['logout_token' => $token]);
    }

    protected function getCurrentUserData() {
        return response()->json(['success' => (new APIRequestsController())->getUserData(session('logged_user')['id'])]);
    }

    public function getCountryNameById($id) {
        $countries = (new APIRequestsController())->getAllCountries();
        return $countries[$id - 1]->name;
    }

    protected function checkDentistAccount(Request $request) {
        $customMessages = [
            'email.required' => 'Email address is required.',
            'password.required' => 'Password is required.',
        ];
        $this->validate($request, [
            'email' => 'required|max:100',
            'password' => 'required|max:50'
        ], $customMessages);

        $data = $request->input();

        $api_response = (new APIRequestsController())->dentistLogin($data, true);
        if($api_response['success']) {
            $approved_statuses = array('approved', 'pending', 'test');
            if($api_response['data']['self_deleted'] != NULL) {
                return response()->json(['error' => true, 'message' => 'This account has been deleted by its owner and cannot be restored.']);
            } else if(!in_array($api_response['data']['status'], $approved_statuses)) {
                return response()->json(['error' => true, 'message' => 'This account is not approved by Dentacoin team yet, please try again later.']);
            } else {
                return response()->json(['success' => true]);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Wrong username or password.']);
        }
    }

    protected function inviteYourClinic(Request $request) {
        $data = $request->input();

        var_dump($data);
        die();
    }

    protected function manageCustomCookie(Request $request) {
        if(!empty(Input::get('slug')) && !empty(Input::get('type')) && !empty(Input::get('token'))) {
            //logging
            $slug = $this->decrypt(Input::get('slug'));
            $type = $this->decrypt(Input::get('type'));
            $token = $this->decrypt(Input::get('token'));

            $user = (new APIRequestsController())->getUserData($slug);
            if($user) {
                $approved_statuses = array('approved', 'pending', 'test');
                if($user->self_deleted != NULL) {
                    return abort(404);
                } else if(!in_array($user->status, $approved_statuses)) {
                    return abort(404);
                } else {
                    $session_arr = [
                        'token' => $token,
                        'id' => $slug,
                        'type' => $type
                    ];

                    session(['logged_user' => $session_arr]);
                    return redirect()->route('home');
                }
            } else {
                return abort(404);
            }
        } else if(!empty(Input::get('logout-token'))) {
            //logging out
            $token = $this->decrypt(Input::get('logout-token'));

            if(session('logged_user')['token'] == $token) {
                $request->session()->forget('logged_user');

                return redirect()->route('home');
            }
        } else {
            return abort(404);
        }
    }

    protected function authenticateUser(Request $request) {
        $this->validate($request, [
            'token' => 'required',
            'type' => 'required|in:patient,dentist',
            'id' => 'required'
        ], [
            'token.required' => 'Token is required.',
            'type.required' => 'Type is required.',
            'id.required' => 'ID is required.'
        ]);

        $checkToken = (new APIRequestsController())->checkUserIdAndToken($request->input('id'), $request->input('token'));
        if(is_object($checkToken) && property_exists($checkToken, 'success') && $checkToken->success) {
            $session_arr = [
                'token' => $request->input('token'),
                'id' => $request->input('id'),
                'type' => $request->input('type')
            ];

            session(['logged_user' => $session_arr]);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }
}