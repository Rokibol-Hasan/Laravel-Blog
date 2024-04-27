<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountShowController extends Controller
{
    public function allAccounts()
    {
        $allAccounts = Account::latest()->get();
        return view('admin.accounts.all_accounts', compact('allAccounts'));
        
    }

    public function deleteAccount($id)
    {
        Account::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Account deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect(route('all.accounts'))->with($notification);
    }
}
