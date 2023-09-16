<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'count_incoming_mail' => IncomingMail::count(),
            'count_outgoing_mail' => OutgoingMail::count()
        ];

        return view('dashboard/index', $data);
    }
}
