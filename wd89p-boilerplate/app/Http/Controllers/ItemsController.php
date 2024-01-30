<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function showInquiryForm()
    {
        return view('inquiry');
    }

    public function submitInquiryForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Save the form data to the database
        $inquiry = new Inquiry;
        $inquiry->name = $validatedData['name'];
        $inquiry->telephone = $validatedData['telephone'];
        $inquiry->email = $validatedData['email'];
        $inquiry->message = $validatedData['message'];
        $inquiry->save();

        // For simplicity, let's just return a success response.
        return response()->json(['status' => 'success']);
    }
}