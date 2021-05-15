<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function createPermissions()
    {
        return view('admin.permission.add');
    }

    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id'     => 0,
            'key_code'      => ''
        ]);

        foreach($request->module_childrent as $child) {
            Permission::create([
                'name' => $child,
                'display_name' => $child,
                'parent_id'     => $permission->id,
                'key_code'      => $request->module_parent . '_' . $child
            ]);
        }

        return view('admin.permission.add');
    }
}
