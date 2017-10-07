<?php

namespace Christhompsontldr\LaraboardAdmin\Http\Controllers;

use App\Http\Controllers\Controller;

class LaraboardAdminController extends Controller
{
    public function dashboard()
    {
        return view(config('laraboard-admin.view.hintpath') . '::dashboard');
    }
}