<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Twilio\Rest\Client;

class WhatsappPdfController extends Controller
{
    public function userlist()
    {
        $users = User::all();
        // return $users;
        return view('whatsapp.userlist', compact('users'));
    }

    public function User($id)
    {
        $user = User::find($id);

        return view('whatsapp.user', compact('user'));
    }

    public function sendPdf(Request $request)
    {
        $ids = $request->ids;

        $users = User::whereIn('id', $ids)->get();

        if (!$users) {
            return redirect()->back()->with('error', 'User Not Found!');
        }


        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio_number = env('TWILIO_NUMBER');


        $twilio = new Client($sid, $token);

        foreach ($users as $user) {
            $pdfFile = $user->empId . '-' . $user->month . '.pdf';
            $pdfPath  = public_path('pdf/' . $pdfFile);

            // $pdf = PDF::loadView('whatsapp/user', compact('user'))->save($invoicePath);  

            $mediaUrl = "https://topseedtech.com/goodwillonlinestores/public/pdf/$pdfFile";

            if (file_exists($pdfPath)) {
                $message = $twilio->messages->create(
                    "whatsapp:+91" . $user->mobile, // to
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Your October month Salary Slip-{$user->empId}.pdf",
                        'mediaUrl' => [$mediaUrl]
                    )
                );
            } else {
                return redirect()->back()->with('error', 'PDF generation failed');
            }
        }
        return redirect()->back()->with('success', 'PDF sent successfully');
    }


    public function usersDelete(Request $request)
    {
        $ids = $request->ids;

        $users = User::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Users Deleted Successfully!');
    }


    public function dashboard()
    {
        return view('whatsapp.dashboard');
    }
}