<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService extends BaseService
{
    /**
     * @param $data
     * @return bool
     */
    public function create($data)
    {

        DB::beginTransaction();
        try {
            $userData = [
                'name' => $data['name_user'],
                'email' => $data['email_user'],
                'password' => Hash::make($data['password_user']),
                'role' => ($data['role_user'] === ROLE_ADMIN) ? 1 : (($data['role_user'] === ROLE_DEV) ? 2 : 3),
                'created_at' => Carbon::now(),
                'image' => ''
            ];

            $arrayPlant = json_decode($data['plant_user']);

            $user = User::create($userData);
            $attachData = [];

            foreach ($arrayPlant as $plant) {
                $attachData[$plant] = [
                    'user_id' => $user->id,
                    'actionModel' => in_array($plant, explode(',', $data['actionModel_user'])),
                ];
            }
            $user->plants()->attach($attachData);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * @param $request
     * @param $user
     * @return bool
     * @throws GeneralException
     */
    public function update($request, $user)
    {
        DB::beginTransaction();
        try {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
//                'role' => ($data['role'] === ROLE_ADMIN) ? 1 : (($data['role'] === ROLE_DEV) ? 2 : 3),
                'updated_at' => Carbon::now()
            ];

            if ($request->type != 'profile') {
                $userData['amount'] = $request->amount;
            }

            if ($request->new_password != null) {
                $userData['password'] = Hash::make($request->new_password);
            }

            $user->update($userData);

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the product.'));
        }
    }

    public function changePass($data, $id) {

        DB::beginTransaction();
        try {
            $imageUser = $data['imageUser'];

            $date = date("Y-m-d H:i:s", time());

            $nameImageUser = "";
            if (gettype($imageUser) !== "NULL" && gettype($imageUser) !== "string") {
                $nameImageUser = '('.$date.')'.$imageUser->getClientOriginalName();

                Storage::disk('public')->put($nameImageUser, file_get_contents($imageUser->getRealPath()));
            } else {
                $nameImageUser = $data['imageUser'];
            }

            if ($imageUser === "ファイルのパス") {
                $nameImageUser = '';
            }
            $userPasswordUpdate = [
                'name' => $data['nameUser'],
                'image' => $nameImageUser,
            ];

            if ($data['newPassword'] !== null) {
                $userPasswordUpdate['password'] = Hash::make($data['newPassword']);
            }

            $change = User::where('id', $id)->update($userPasswordUpdate);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function delete($user)
    {
        if (User::findOrFail($user)->delete()) {
            return true;
        }
    }
}
