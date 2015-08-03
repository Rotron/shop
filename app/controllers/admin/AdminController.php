<?php

class AdminController extends Controller {

    protected $action;
    protected $name;
    protected $table;
    public function __construct()
    {
        $this->beforeFilter(function(){
            if (Auth::guest()) {
                return Redirect::to('admin/login');
            } else {
                $user = User::find(Auth::user()->id);
                if (!$user->hasRole("Admin")) {
                    Auth::logout();
                    return Redirect::to('admin/login');
                }
            }
        },['except' => ['login','postLogin']]);

        $partAction = explode('@', Route::currentRouteAction());
        $partRoute = explode('/', Request::path());
        $this->action = isset($partAction[1]) ? $partAction[1] : '';
        $this->name = isset($partRoute[1]) ? $partRoute[1] : '';
        $this->table = $this->name . 's';
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( !is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

}
