<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin;
use Exception;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:super-admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $admins = Admin::indexSelection();
        // return view('admin.admins.index', compact('admins'));
        return view('admin.admins.livewireIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        try {
            $role = $request->role == 1 ? 'manager' : 'employee';
            $request->role = $role;
            $admin_data = $request->except('role');
            $admin = Admin::create($admin_data);
            $assign_role = Role::where('name', $role)->get();
            $admin->assignRole($assign_role);
            if ($role == 'manager')
                return redirect()->route('admin.admins.index')->with('success', 'تم إنشاء المدير بنجاح');
            return redirect()->route('admin.admins.index')->with('success', 'تم إنشاء الموظف بنجاح');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ ما ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $admin = Admin::select('id', 'name', 'email', 'active')->find($id);
            if (!$admin) {
                return redirect()->back()->with('error', 'لم يتم ايجاد هذا المسئوول');
            }

            return view('admin.admins.edit', compact('admin'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ ما ');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        try {
            $admin = Admin::find($id);
            if (!$admin)
                return redirect()->back()->with('error', 'لم يتم ايجاد هذا المسئوول');
            $admin_data = $request->except('role');
            $admin->update($admin_data);
            $role = $request->role == 1 ? 'manager' : 'employee';
            if ($role != $admin->getRoleNames()[0]) {
                $assign_role = Role::where('name', $role)->get();
                $admin->removeRole($admin->getRoleNames()[0]);
                $admin->assignRole($assign_role);
            }
            return redirect()->route('admin.admins.index')->with('success', 'تم تعديل الموظف بنجاح');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ ما ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $admin = Admin::find($id);
            if (!$admin)
                return redirect()->back()->with('error', 'لم يتم ايجاد هذا المسئوول');
            $admin->delete();
            return redirect()->route('admin.admins.index')->with('success', 'تم تعديل الموظف بنجاح');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ ما ');
        }
    }
}
