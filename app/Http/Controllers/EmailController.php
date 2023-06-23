<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MarkdownMail;

class EmailController extends Controller
{
//     public function sendEmails()
// {
//     $data = [
//         'title' => 'Test Email',
//         'content' => 'This is a test email sent from Laravel.',
//     ];

//     Mail::send('email.salary_details', $data, function ($message) {
//         $message->to('hrithikbansal1122@gmail.com')
//                 ->subject('Test Email');
//     });

//     return "Email sent successfully.";
// }

    public function index()
    {
        $mailData = [
            'title' => 'Mail from SalaryManagement',
            'body' => 'This is for testing email using SMTP',
        ];
        // dd($mailData);
        \Mail::to('hrithikbansal2400@gmail.com')->send(new \App\Mail\MarkdownMail($mailData));

        dd("Email send successfully");
    }

}
