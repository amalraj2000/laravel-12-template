<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Toastr;

class UserController extends BaseController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->addBaseView('user');
        $this->addBaseRoute('user');
    }

    public function index(Request $request)
    {
        $query = User::orderByDesc('created_at');
        $query->where(function ($query) use ($request) {
            if ($request->name != '') {
                $query->where('first_name', 'LIKE', '%' . $request->name . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->name . '%')
                    ->orWhereRaw("concat(first_name, ' ',last_name) like '%" . $request->name . "%'");
            }
        });
        $query->where(function ($query) use ($request) {
            if ($request->email != '') {
                $query->where('email', 'LIKE', '%' . $request->email . '%');
            }
        })
            ->where(function ($query) use ($request) {
                if ($request->mobile != '') {
                    $query->where('mobile', 'LIKE', '%' . $request->mobile . '%');
                }
            });

        $users = $query->get();
        $path = $this->getView('index');
        $para = compact('users');
        $title = 'User List';
        return $this->renderView($path, $para, $title);
    }

    public function create()
    {
        $path = $this->getView('create');
        $para = [];
        $title = 'Create User';

        return $this->renderView($path, $para, $title);
    }

    public function store(UserStoreRequest $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            // 'country' => $request->country,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
        ]);

        Toastr::success('User Created Successfully');

        return redirect()->route($this->getRoute('index'));
    }

    public function show($id)
    {
        $this->addBreadcrumb([
            'user' => route($this->getRoute('index')),
            'View' => null,
        ]);

        $userDetails = User::where('id', $id)->first();

        if (is_null($userDetails)) {
            return abort(404);
        }

        $path = $this->getView('view');
        $para = compact('userDetails');
        $title = 'User Info';

        return $this->renderView($path, $para, $title);
    }

    public function edit(User $user)
    {
        $this->addBreadcrumb([
            'user' => route($this->getRoute('index')),
            'Edit' => null,
        ]);

        $path = $this->getView('edit');
        $para = compact('user');
        $title = 'Edit User';

        return $this->renderView($path, $para, $title);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country' => $request->country,
            'mobile' => $request->mobile,
            'status' => $request->status,
        ]);


        return Response::json(['status' => true]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Response::json(['status' => true, 'success' => 'User Deleted Successfully']);
    }

    public function notification($id)
    {
        $this->addBreadcrumb([
            'user' => route($this->getRoute('index')),
            'notification' => null,
        ]);

        $userDetails = User::where('id', $id)->first();

        $path = $this->getView('notification');
        $para = compact('userDetails');
        $title = 'Notification';

        return $this->renderView($path, $para, $title);
    }
}
