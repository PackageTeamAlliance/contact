<?php

namespace Pta\Contact\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Pta\Contact\Http\Requests\ContactFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Pta\Contact\Repositories\ContactRepositoryInterface;

class ContactController extends Controller
{
    use DispatchesJobs, ValidatesRequests;
    
    private $contact;

    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }

    public function contact()
    {
        return view('pta/contact::frontend.contact');
    }

    public function contact_process(ContactFormRequest $request)
    {
        $this->contact->store(null, $request->all());

        return back()->withFlashSuccess('Your message has been successfully sent');
    }
}