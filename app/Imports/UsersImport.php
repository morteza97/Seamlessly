<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /*$user = User::where('email',$row[14])->get();

        if ($user) {
            $user->LastName = $row[2];
            $user->FirstName = $row[3];
            $user->FatherName = $row[4];
            $user->BirthPlace = $row[8];

            $user->save();

            return User::where('email', $row[14])
                ->update(['FirstName' => $row[3], 'LastName' => $row[2], 'FatherName' => $row[4], 'BirthPlace' => $row[8] ]);
        }*/
        return new User([
            'username' => $row[3],
            'password' => Hash::make('123456'),
            'gender_id' => 1,
            'marital_status_id' => 1,
            'public_conscription_status_id' => 1,
            'FirstName' => $row[3],
            'LastName' => $row[2],
            'FatherName' => $row[4],
            'BirthPlace' => $row[8],
            'email' => $row[14]
        ]);

    }
}
