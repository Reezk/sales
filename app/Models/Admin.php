<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name', 'email', 'username', 'password', 'created_at', 'updated_at', 'added_by', 'updated_by', 'com_code'
    ];
    function make_new_admin()
    {
    }
}
 /*  $admin = new Admin();
        $admin->name = 'admin';
        $admin->email = 'asd@sds.com';
        $admin->username = 'admin';
        $admin->password = bcrypt('admin');
        $admin->com_code = 1;
        $admin->save(); */

        
        /* $admin = new Admin();
        $admin->name = 'admin1';
        $admin->email = 'asd11@sds.com';
        $admin->username = 'admin1';
        $admin->password = bcrypt('admin1');
        $admin->com_code = 2;
        $admin->save(); */