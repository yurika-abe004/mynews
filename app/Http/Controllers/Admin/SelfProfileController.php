<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class SelfProfileController extends Controller
{
    //以下を追加
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(ProfileRequest $request)
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(ProfileRequest $request)
    {
        return redirect('admin/profile/edit');
    }
}