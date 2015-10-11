<?php

namespace Pta\Contact\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ContactController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

    public function contact()
    {
        return view('pta/contact::frontend.contact');
    }

    public function contact_process()
    {
    }
}
