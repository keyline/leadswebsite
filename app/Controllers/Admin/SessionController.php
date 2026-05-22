<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class SessionController extends BaseController
{
    public function clearFlash()
    {
        $session = session();

        if ($session->has('success_message')) {
            $session->remove('success_message');
            $session->remove('error_message');
        }

        return $this->response->setJSON([
            'status' => 'cleared',
            'message' => 'Flash messages cleared'
        ]);
    }
}
