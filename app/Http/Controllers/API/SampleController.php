<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SampleController extends Controller
{
    public function sendMail()
    {
        
        $details = [
            'title'=> 'Sample Title From Mail',
            'body'=> 'This is sample content we have added for this test mail'
        ];
        Mail::to("yamen.abbas.422@gmail.com")->send(new TestMail($details)); 
        return response()->json([
            'message'=> 'Send Mail Done'
        ]);
    }
}
