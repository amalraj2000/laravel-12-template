<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\FileDestinations;

use App\Http\Helpers\Core\FileManager;

use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;


use App\Services\Admin\HomePageService;

use App\Models\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Toastr;


class ProfileController extends BaseController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->addBaseView('profile');
        $this->addBaseRoute('profile');
    }

    public function index(Request $request)
    {
        $detail = Auth::user();
        $path = $this->getView('profile');
        $para = compact('detail');
        $title = 'Edit Profile';

        return $this->renderView($path, $para, $title);
    }

    public function viewChangePassword()
    {
        return $this->renderView($this->getView('change-password'), [], 'Change Password');
    }

    public function update(Request $request,$id)
    {
        $admin = Admin::find($id);
        $adminData = [
            'first_name' =>  $request->firstName,
            'last_name'  =>  $request->lastName,
            'gender'     =>  $request->gender,
            'mobile'     =>  $request->mobile,
//            'country_code'=>  $request->code,
            'email'      =>  $request->email,
        ];

        if ($request->hasFile('profile_image')) {
            $response = FileManager::upload(FileDestinations::PROFILE_ADMIN,'profile_image' );
            if ($response['status']) {
                $adminData['profile_image'] = $response['data']['fileName'];
            }
        }

        $admin->update($adminData);
        Toastr::success('Profile updated successfully');
        return redirect()->back();
    }

    public function updatePassword(ChangePasswordRequest $request,$id)
    {
        $admin = Admin::find($id);
        if (Hash::check($request->current_password1, $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->new_password)
            ]);
            Toastr::success('Password updated successfully');
        }
        else {
            Toastr::error('Entered current  password wrong!!');
        }
        return redirect()->back();
    }

   Public function viewRecentLogin(HomePageService $homePageService)
    {
        $adminLoginLogs = $homePageService->getRecentLogins();

        return $this->renderView($this->getView('recent-login'), compact('adminLoginLogs'), 'Recent Login');
    }
}
