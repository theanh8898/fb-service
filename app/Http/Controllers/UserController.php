<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralException;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var
     */
    protected $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        if (Auth::user()->role === 1) {
            $users = User::all();

            return view('backend.user.index', ['users' => $users]);
        } else {
            return abort('403');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        if (Auth::user()->role === 1) {
            $dataPlant = Plant::all();
            $emails = User::all()->pluck('email');
            return view('admin.createUser', ['dataPlant' => $dataPlant, 'emails' => $emails]);
        } else {
            return abort('403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $created = $this->userService->create($request);

        $response = [
            'error' => false,
            'message' => __('admin.user.createSuccess'),
        ];

        if (!$created) {
            $response = [
                'error' => true,
                'message' => __('admin.user.createFail'),
            ];
        }

        session()->flash('response', $response);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show()
    {
        return view('backend.user.profile', ['user' => Auth::user()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (Auth::user()->role === 1) {
            return view('backend.user.edit', ['user' => $user]);
        } else {
            return abort('403');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $updated = $this->userService->update($request, $user);

        if (Auth::user()->role == 1) {
            return redirect()->route(EDIT_USER, ['id' => $user->id]);
        } else {
            return redirect()->route(PROFILE_USER);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user)
    {
        $deleted = $this->userService->delete($user);

        return redirect()->route(LIST_USER);
    }

    public function editPassword() {
        $user = Auth::user();
        return view('user.changePass', compact('user'));
    }

    public function changePassword(Request $request) {
        $user = Auth::user();
        $change = $this->userService->changePass($request, $user->id);

        $response = [
            'error' => false,
            'message' => __('admin.edit.changePassSuccess'),
        ];

        if (!$change) {
            $response = [
                'error' => true,
                'message' => __('admin.edit.changePassFail'),
            ];
        }

        session()->flash('response', $response);
        return response()->json($response);
    }

    public function checkPass(Request $request) {

        $user = Auth::user();
        $credentials = [
            'email' => $user->email,
            'password' => $request['oldPass']
        ];

        if (auth()->attempt($credentials)) {
            return response()->json([
                'pass' => true,
            ]);
        } else {
            return response()->json([
                'pass' => false,
            ]);
        }
    }

}
