<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppUserRequest;
use App\Http\Requests\UpdateAppUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AppUserRepository;
use Illuminate\Http\Request;
use Flash;

class AppUserController extends AppBaseController
{
    /** @var AppUserRepository $appUserRepository*/
    private $appUserRepository;

    public function __construct(AppUserRepository $appUserRepo)
    {
        $this->appUserRepository = $appUserRepo;
    }

    /**
     * Display a listing of the AppUser.
     */
    public function index(Request $request)
    {
        $appUsers = $this->appUserRepository->paginate(10);

        return view('app_users.index')
            ->with('appUsers', $appUsers);
    }

    /**
     * Show the form for creating a new AppUser.
     */
    public function create()
    {
        return view('app_users.create');
    }

    /**
     * Store a newly created AppUser in storage.
     */
    public function store(CreateAppUserRequest $request)
    {
        $input = $request->all();

        $appUser = $this->appUserRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/app_users.singular')]));

        return redirect(route('appUsers.index'));
    }

    /**
     * Display the specified AppUser.
     */
    public function show($id)
    {
        $appUser = $this->appUserRepository->find($id);

        if (empty($appUser)) {
            Flash::error(__('models/app_users.singular').' '.__('messages.not_found'));

            return redirect(route('appUsers.index'));
        }

        return view('app_users.show')->with('appUser', $appUser);
    }

    /**
     * Show the form for editing the specified AppUser.
     */
    public function edit($id)
    {
        $appUser = $this->appUserRepository->find($id);

        if (empty($appUser)) {
            Flash::error(__('models/app_users.singular').' '.__('messages.not_found'));

            return redirect(route('appUsers.index'));
        }

        return view('app_users.edit')->with('appUser', $appUser);
    }

    /**
     * Update the specified AppUser in storage.
     */
    public function update($id, UpdateAppUserRequest $request)
    {
        $appUser = $this->appUserRepository->find($id);

        if (empty($appUser)) {
            Flash::error(__('models/app_users.singular').' '.__('messages.not_found'));

            return redirect(route('appUsers.index'));
        }

        $appUser = $this->appUserRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/app_users.singular')]));

        return redirect(route('appUsers.index'));
    }

    /**
     * Remove the specified AppUser from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $appUser = $this->appUserRepository->find($id);

        if (empty($appUser)) {
            Flash::error(__('models/app_users.singular').' '.__('messages.not_found'));

            return redirect(route('appUsers.index'));
        }

        $this->appUserRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/app_users.singular')]));

        return redirect(route('appUsers.index'));
    }
}
