<?php

namespace App\Http\Controllers;

class APIRequestsController extends Controller {
    public function dentistLogin($data, $dontCountLogin = false) {
        $postData = array(
            'platform' => 'dentists',
            'type' => 'dentist',
            'email' => $data['email'],
            'password' => $data['password'],
            'client_ip' => $this->getClientIp()
        );

        if($dontCountLogin) {
            $postData['dont_count_login'] = true;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/login',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $postData
        ));

        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function dentistRegister($data, $files) {
        $post_fields_arr = array(
            'platform' => 'dentists',
            'title' => trim($data['dentist-title']),
            'name' => trim($data['latin-name']),
            'email' => $data['email'],
            'password' => $data['password'],
            'password-repeat' => $data['repeat-password'],
            'country_code' => $data['country-code'],
            'address' => $data['address'],
            'avatar' => curl_file_create($data['image-path'], 'image/png', $data['image-name']),
            'phone' => $data['phone'],
            'website' => $data['website'],
            'specialisations' => json_encode($data['specializations']),
            'client_ip' => $this->getClientIp()
        );

        if(!empty($data['alternative-name'])) {
            $post_fields_arr['name_alternative'] = trim($data['alternative-name']);
        }

        if(!empty($data['inviter'])) {
            $post_fields_arr['invited_by'] = trim($data['inviter']);
        }

        switch($data['user-type']) {
            case 'dentist':
                $post_fields_arr['type'] = 'dentist';
                break;
            case 'clinic':
                $post_fields_arr['type'] = 'clinic';
                break;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/register',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $post_fields_arr
        ));

        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function getAllCountries() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/countries/',
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);
        if(!empty($resp))   {
            return $resp->data;
        }else {
            return false;
        }
    }

    public function getAllEnums() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/enums/',
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);
        if(!empty($resp))   {
            return $resp->data;
        }else {
            return false;
        }
    }

    public function getAllClinicsByName($name = null) {
        $post_fields_arr = array(
            'type' => 'all-dentists',
            'items_per_page' => 2000,
            'status' => 'approved'
        );

        if(!empty($name)) {
            $post_fields_arr['name'] = $name;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/users/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $post_fields_arr
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp->data;
        }else {

            return response()->json(['error' => 'API not working at this moment. Try again later.']);
        }
    }

    public function getPatientsByEmail($email) {
        $post_fields_arr = array(
            'type' => 'dentist',
            'email' => $email,
            'is_approved' => true
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/users/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $post_fields_arr
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp->data;
        }else {

            return response()->json(['error' => 'API not working at this moment. Try again later.']);
        }
    }

    public function getUserData($id, $logging = false) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/user/?id='.urlencode($this->encrypt($id, getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY'))),
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            if($logging) {
                return $resp;
            } else {
                return $resp->data;
            }
        }else {
            return false;
        }
    }

    public function checkIfUserExist($email) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/check-email/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => array(
                'email' => $email
            )
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function generatePasswordRecoveryToken($email) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/recoverToken/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => array(
                'email' => $this->encrypt($email, getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY'))
            )
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function recoverPassword($data) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/recoverPassword/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => array(
                'recoverToken' => $data['token'],
                'password' => $this->encrypt($data['password'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY'))
            )
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function checkIfFreeEmail($email) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/check-email',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => array(
                'email' => $email
            )
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function updateUserData($data) {
        if(isset($data['specialisations'])) {
            $data['specialisations'] = json_encode($data['specialisations']);
        }

        $header = array();
        $header[] = 'Accept: */*';
        $header[] = 'Authorization: Bearer ' . session('logged_user')['token'];
        $header[] = 'Cache-Control: no-cache';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/user/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $header
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    protected function getGasEstimationFromEthgasstation()  {
        //API connection
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://ethgasstation.info/json/ethgasAPI.json',
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);
        if(!empty($resp))   {
            return $resp->safeLow;
        }
    }

    public function getDCNBalance() {
        $header = array();
        $header[] = 'Accept: */*';
        $header[] = 'Authorization: Bearer ' . session('logged_user')['token'];
        $header[] = 'Cache-Control: no-cache';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/balance',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => $header
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function getDCNTransactions() {
        $header = array();
        $header[] = 'Accept: */*';
        $header[] = 'Authorization: Bearer ' . session('logged_user')['token'];
        $header[] = 'Cache-Control: no-cache';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/transcations/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => $header
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function updateAnonymousUserData($data) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_URL => 'https://api.dentacoin.com/api/user-anonymous/',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => $data
        ));

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if(!empty($resp))   {
            return $resp;
        }else {
            return false;
        }
    }

    public function getCurrentDcnRateByCoingecko()  {
        //API connection
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://api.coingecko.com/api/v3/coins/dentacoin",
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $resp = json_decode(curl_exec($curl));
        curl_close($curl);
        if(!empty($resp))   {
            if(!empty($resp->market_data->current_price))  {
                return array(
                    'USD' => $resp->market_data->current_price->usd,
                    'EUR' => $resp->market_data->current_price->eur,
                    'GBP' => $resp->market_data->current_price->gbp,
                    'RUB' => $resp->market_data->current_price->rub,
                    'INR' => $resp->market_data->current_price->inr,
                    'CNY' => $resp->market_data->current_price->cny,
                    'JPY' => $resp->market_data->current_price->jpy
                );
            }else {
                return 0;
            }
        }
    }

    public function getCountry($client_ip)  {
        try {
            return mb_strtolower(trim(@file_get_contents('https://ipinfo.io/' . $client_ip . '/country')));
        } catch(Exception $e) {
            return false;
        }
    }
}