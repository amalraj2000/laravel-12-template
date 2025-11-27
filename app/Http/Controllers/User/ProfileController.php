<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\FileDestinations;

use App\Http\Helpers\Core\FileManager;
use App\Http\Helpers\Core\ImageUpload;

use App\Http\Requests\User\PasswordUpdateRequest;
use App\Http\Requests\User\ProfileImageUpdateRequest;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;


use App\Services\User\HomePageService;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Toastr;


class ProfileController extends BaseController
{

    /**
     * ProfileController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->addBaseView('profile');
        $this->addBaseRoute('profile');
    }

    /**
     * Show profile edit page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $detail = Auth::user();
        $path = $this->getView('profile');
        $para = compact('detail');
        $title = 'Edit Profile';

        return $this->renderView($path, $para, $title);
    }

    /**
     * Show form to change password
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewChangePassword()
    {
        return $this->renderView($this->getView('change-password'), [], 'Change Password');
    }

    /**
     * @param HomePageService $homePageService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    Public function viewRecentLogin(HomePageService $homePageService)
    {
        $userLoginLogs = $homePageService->getRecentLogins();
        return $this->renderView($this->getView('recent-login'), compact('userLoginLogs'), 'Recent Login');
    }

    /**
     * Update profile
     *
     * @param ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $admin = User::find($id);
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

    /**
     * Update password
     *
     * @param PasswordUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(ChangePasswordRequest $request,$id)
    {
        $admin = User::find($id);
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

    /**
     * Update profile image
     *
     * @param ProfileImageUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImage(ProfileImageUpdateRequest $request)
    {
        $response = ImageUpload::uploadBase64('profile_image', FileDestinations::PROFILE_IMAGES );
        if ($response['status']) {
            $admin = Auth::user();
            $admin->update([
                'profile_image' => $response['data']['fileName']
            ]);
            Toastr::success('Profile image updated successfully');
        } else {
            Toastr::error('Image upload error');
        }
        return redirect()->route($this->getRoute('index'));
    }

}
