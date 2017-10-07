<?php

namespace Christhompsontldr\LaraboardAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Christhompsontldr\Laraman\Traits\LaramanController;

class UserController extends Controller
{
    use LaramanController;

    public function __construct()
    {
        $this->columns = [
            [
                'field' => 'id',
            ],
            [
                'field' => 'name',
            ],
            [
                'field' => 'email',
            ],
        ];
    }
}