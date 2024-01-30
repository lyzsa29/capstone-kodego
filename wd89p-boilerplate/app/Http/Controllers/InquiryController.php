<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
   /**
     * Show all users
     * SELECT * FROM USERS
     * @return INQUIRIES
     */
    public function index()
    {
        return response()->json(["data" => Inquiry::all()]);
    }


     /**
     * Insert into users values('','')
     *
     * @param Request $request
     * @return void
     * <input type='text' name='name' />
     * $_POST['name'] = $request->name
     */
    public function store(Request $request)
        {
            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->number = $request->number;
            $inquiry->email = $request->email;
            $inquiry->message = $request->message;
    
            $inquiry->save();
    
            return response()->json(["data" => $inquiry, "message" => "Sent successfuly"]);
         }
   
        
   /**
     * SELECT * FROM USERS WHERE ID = ?
     *
     * @param [type] $id
     * @return void
     */
   public function show($id)
   {
       return response()->json(["data" => Inquiry::findOrFail($id)]);
   }
}