<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\custormer_detail;

use Illuminate\Support\Facades\DB;

class custormerdetails extends Controller
{
    public function SaveCustormerDetails(Request $request)
    {
        $table = new custormer_detail;

        if($request->submit == "Save Custormer Details")
        {
            $this->validate($request,[
                'fname'=>'required|max:50|min:3',
                'lname'=>'required|max:50|min:2',
                'email'=>'required|max:100|min:5',
                'mobile_number'=>'required|max:10|min:10',
            ]);

            $table->first_name = $request->fname;
            $table->last_name = $request->lname;
            $table->email_address = $request->email;
            $table->mobile_number = $request->mobile_number;
            $table->product_name = $request->pname;
            $table->category = $request->pcat;
            $table->ms_key = $request->key;

            $table->save();
            return redirect()->back();
        }
    }

    public function UpdateCustormerDetails($id)
    {
        $data = custormer_detail::find($id);

        return view('updatedetail')->with('details', $data);
    }

    public function UpdateSelectedDetails(Request $request)
    {
        $data = custormer_detail::find($request->id);

        $data->first_name = $request->fname;
        $data->last_name = $request->lname;
        $data->email_address = $request->email;
        $data->mobile_number = $request->mobile_number;
        $data->product_name = $request->pname;
        $data->category = $request->pcat;
        $data->ms_key = $request->key;

        $data->save();

        $data = custormer_detail::all();
        return view('custormerdetails')->with('details',$data);
    }

    public function DeleteCustormerDetails($id)
    {
        $data = custormer_detail::find($id);

        $data->delete();
        return redirect()->back();

    }

    public function GetFilterQuery($byemail,$bymobile,$bypname,$bypcat)
    {
        $query = "SELECT * FROM custormer_details WHERE ";
        $count = 0;

        if(!empty($byemail))
        {
            if($count == 0)
            {
                $query .= "email_address = '{$byemail}'";
            }
            else
            {
                $query .= "AND email_address = '{$byemail}'";
            }

            $count++;
        }
        if(!empty($bymobile))
        {
            if($count <= 0)
            {
                $query .= "mobile_number = '{$bymobile}'";
            }
            else
            {
                $query .= " AND mobile_number = '{$bymobile}'";
            }
            
            $count++;
        }
        if(!empty($bypname))
        {
            if($count <= 0)
            {
                $query .= "product_name = '{$bypname}'";
            }
            else
            {
                $query .= " AND product_name = '{$bypname}'";
            }

            $count++;
        }
        if(!empty($bypcat))
        {
            if($count <= 0)
            {
                $query .= "category = '{$bypcat}'";
            }
            else
            {
                $query .= " AND category = '{$bypcat}'";
            }

            $count++;
        }

        return $query;
    }

    public function FilterSelectedDetails(Request $request)
    {
        $byEmail = $request->byemail;
        $byMobileNumber = $request->bymobile;
        $byProductName = $request->bypname;
        $bycategory = $request->bypcat;

        $all = DB::select($this->GetFilterQuery($byEmail,$byMobileNumber,$byProductName,$bycategory));

        return view('custormerdetails')->with('details',$all);
        //dd($this->GetFilterQuery($byEmail,$byMobileNumber,$byProductName,$bycategory));
    }
}
