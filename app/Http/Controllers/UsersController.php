<?php

namespace App\Http\Controllers;

use App\Common\UserData;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Entities\User;
use App\Repositories\UserRepository;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\DataTransferObject\DataTransferObject;

class UsersController extends Controller
{

    public function __construct(private UserRepository $userRepository){}

    public function index()
    {
        return Inertia::render('Users/Index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'users' => new UserCollection(
                Auth::user()->account->users()
                    ->orderByName()
                    ->filter(Request::only('search', 'role', 'trashed'))
                    ->paginate()
                    ->appends(Request::all())
            ),
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(UserStoreRequest $request)
    {
        Auth::user()->account->users()->create(
            $request->validated()
        );

        return Redirect::route('users')->with('success', 'User created.');
    }

    public function edit(int $userId)
    {
        return Inertia::render('Users/Edit', [
            'user' => $this->userRepository->findOneBy(['id' => $userId]),
        ]);
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(int $userId, UserUpdateRequest $request)
    {
        $data = $request->validated();

        $userData = new UserData(['id' => $userId, $request->validated()]);

        $this->userRepository->update($userData);

        /*
            $user->update(
                $request->validated()
            );
        */

        return Redirect::back()->with('success', 'User updated.');
    }

    public function destroy(User $user, UserDeleteRequest $request)
    {
        $user->delete();
        return Redirect::back()->with('success', 'User deleted.');
    }

    public function restore(User $user)
    {
        $user->restore();
        return Redirect::back()->with('success', 'User restored.');
    }
}
