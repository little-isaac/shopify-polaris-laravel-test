<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shopify\Objects\Shop;
use App\User;
use Redirect;
use Auth;

class LoginController extends Controller {

    
    function redirect_shopify_login(Request $request){
        return redirect($this->redirectToProvider($request)['url']);
    }
    function view_login(Request $request){
        return view('login');
    }
    function direct_login(Request $request) {
        Auth::logout();
        if ($request->has('shop')) {
            return $this->redirect_shopify_login($request);
//            return Redirect::route('login_shopify', [
//                        'shop' => $request->input('shop')
//            ]);
        } else {
            return redirect('/login');
        }
    }

    //
    function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function redirectToProvider(Request $request) {


        $shop = new Shop($request->input('shop'), null);

        $url = $shop->redirect(config('shopify_object.key'), env('SHOPIFY_SCOPE'), env('APP_URL') . config('shopify_object.callback_url'));

        return [
            "url" => $url
        ];
    }

    public function handleProviderCallback(Request $request, $provider = 'shopify') {
        try {
            $shop = new Shop($request->input('shop'), null);
            $access_token = $shop->get_access_token(config('shopify_object.key'), config('shopify_object.secret'), $request->code);
//            return $access_token;
            $shop = new Shop($request->input('shop'), $access_token);
            $user = User::where('shop_name', $request->input('shop'))->first();
            $socialite_user = null;
            if ($user) {
                
            } else {

                $socialite_user = $shop->get();
            }

            $authUser = $this->findOrCreateUser($socialite_user, $provider, $user, $access_token);
            Auth::login($authUser, true);
//        $this->createTables(Auth::user()->id);
            if ($authUser->is_paid && !$authUser->is_uninstall) {

//            Common::startCron("sync:layout_setting " . session('app_id') . " " . Auth::user()->id);
//            Common::startCron("setup:store_meta " . session('app_id') . " " . Auth::user()->id);
//            Common::startCron("sync:multilang_txt " . session('app_id') . " " . Auth::user()->id);
//            Common::startCron('create:webhooks ' . session('app_id') . ' ' . Auth::user()->id);
//            Common::startCron('sync:customers ' . session('app_id') . ' ' . Auth::user()->id);
//            Common::startCron("sync:wishlist_setting " . session('app_id') . " " . Auth::user()->id);
            }
//            if(Auth::user()->is_test_store()){
//                return "HEllo";
//            }
//            Utility::set_utilites('IS_FIRST_TIME_BILLING', 1, session('app_id'));
            return redirect('dashboard');
        } catch (\Exception $ex) {
//            throw new \Exception($ex);
            return $this->redirect_shopify_login($request);
        }
    }

    public function findOrCreateUser($user, $provider = 'shopify', $db_usr, $access_token) {
        $is_new_user = false;
        $authUser = null;
        $primary_locale = "";
        $customer_email = "";
        if ($user) {
            switch ($provider) {
                case 'shopify':
                    $email = $user->email;
                    $customer_email = (!empty($user->customer_email)) ? $user->customer_email : $user->email;
                    $shop = $user->myshopify_domain;
                    $name = $user->shop_owner;
                    $shopify_plan = $user->plan_name;
                    $store_name = $user->name;
                    $money_format = $user->money_in_emails_format;
                    $shop_token = $access_token;
                    $primary_locale = $user->primary_locale;
                    $conditions = [
                        ['shop_name', '=', $shop],
                    ];
                    break;
                default:
                    $email = $user->email;
                    $name = $user->name;
                    $shop_token = $user->id;
                    $store_name = '';
                    $customer_email = '';
                    $shop = null;
                    $shopify_plan = null;
                    $money_format = "$";
                    $store_name = '';
                    $conditions = [
                        ['shop_name', '=', $shop],
                    ];
                    break;
            }
            $authUser = User::where($conditions)->get()->first();
            if ($authUser) {
                $authUser->shopify_plan = $shopify_plan;
                $authUser->store_name = $store_name;
                $authUser->money_format = $money_format;
                $authUser->is_uninstalled = false;
                $authUser->is_paid = false;
                $authUser->shopify_token = $access_token;
                $authUser->save();
            } else {
                $authUser = new User;
                $authUser->name = $name;
                $authUser->password = '';
                $authUser->email = $email;
                $authUser->shop_name = $shop;
                $authUser->shopify_plan = $shopify_plan;
                $authUser->store_name = $store_name;
                $authUser->money_format = $money_format;
                $authUser->guid = uniqid();
                $authUser->store_name = $store_name;
                $authUser->shopify_token = $access_token;
                $authUser->token = md5($authUser->guid);
                $authUser->save();
            }
        } else {
            $is_new_user = false;
            if ($db_usr) {

                $authUser = $db_usr;
            }
        }
//        Artisan::call('create:user', [
//            'user_id' => $authUser->id
//        ]);
////        Common::startCron('sync:shop_list ' . session('app_id') . ' ' . $authUser->id);
////        Common::CreateDatabase($authUser->id);
//
//        $app = InstalledApp::where('app_id', session('app_id'))->first();
//        if ($authUser) {
//            if ($app) {
//                $app->is_uninstalled = false;
//                $app->token = $access_token;
//                if (!$app->is_paid) {
//                    $is_new_user = true;
//                }
//            } else {
//                $app = new InstalledApp();
//                $app->app_id = session('app_id');
//                $app->token = $access_token;
//                $app->is_uninstalled = false;
//            }
//            $app->save();
//        }
//        if ($user) {
//            Utility::set_primary_locale($primary_locale, session('app_id'));
//            Utility::set_customer_email($customer_email, session('app_id'));
//        }
//        $is_installation_mail_sent = Utility::get_utilites('IS_INSTALLATION_MAIL_SENT');
//        if ($is_installation_mail_sent && $is_installation_mail_sent->value == "1") {
//            
//        } else {
//            $user = Auth::user();
//            Mail::to('shopify@getflits.com')->send(new InstallationMail($app, $authUser));
//            Mail::to($authUser->email)->send(new InstallMail($app, $authUser));
//            Utility::set_utilites('IS_INSTALLATION_MAIL_SENT', 1, session('app_id'));
//        }
        return $authUser;
    }

}
