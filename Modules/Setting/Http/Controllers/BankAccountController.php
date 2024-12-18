<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Donation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankaccounts = BankAccount::orderBy('created_at','DESC')->get();
        return view('setting::banks.index', compact('bankaccounts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::banks.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/bank_accounts'), $imageName);

        }
        BankAccount::create([
        'bank_name' => $request['bank_name'],
        'bank_branch' => $request['branch_name'],
        'account_name' => $request['account_name'],
        'account_number' => $request['account_number'],
        'mobile_number'=> $request['mobile_number'],
        'status' => $request['status'],
        'account_qr' => $imageName
    ]);
       
       return redirect()->route('bank-accounts.index')->with('success','Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $bank = BankAccount::findOrfail($id);
        return view('setting::banks.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $bank = BankAccount::findOrfail($id);
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/bank_accounts'), $imageName);

        }else{
            $imageName = $bank->account_qr;
        }
        $bank->update([
        'bank_name' => $request['bank_name'],
        'bank_branch' => $request['branch_name'],
        'account_name' => $request['account_name'],
        'account_number' => $request['account_number'],
        'mobile_number'=> $request['mobile_number'],
        'status' => $request['status'],
        'account_qr' => $imageName
        ]);
        
        return redirect()->route('bank-accounts.index')->with('success','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $setting = BankAccount::findOrfail($id);
        $setting->delete();
        
        return redirect()->route('bank-accounts.index')->with('success','Removed Successfully');
    }
    public function status($id)
    {
        $setting = BankAccount::findOrfail($id);
        if($setting->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $setting->update([
           'status' => $status 
        ]);
        return redirect()->route('bank-accounts.index')->with('success', 'Status Updated Successfully');
    }
    public function donations()
    {
        $donations = Donation::orderBy('created_at','DESC')->get();
        return view('setting::banks.donation', compact('donations'));
    }
    public function Donationstatus($id)
    {
        $setting = Donation::findOrfail($id);
        if($setting->status == 'paid')
        {
            $status = 'unpaid';
        }else{
            $status = 'paid';
        }
        $setting->update([
           'status' => $status 
        ]);
        return redirect()->route('donations.index')->with('success', 'Status Updated Successfully');
    }

}
