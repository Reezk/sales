<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_panel_setting_Request;
use App\Models\Admin;
use App\Models\Admin_panel_setting as ModelsAdmin_panel_setting;

class Admin_panel_settingsController extends Controller
{
    public function index()
    {
        $data = ModelsAdmin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        if (!empty($data)) {
            if ($data['updated_by'] > 0 && $data['updated_by'] != null) {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }
        }
        return view('admin.admin_panel_settings.index', ['data' => $data]);
    }

    public function edit()
    {
        $data = ModelsAdmin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panel_settings.edit', ['data' => $data]);
    }
    public function update(Admin_panel_setting_Request $request)
    {
        try {
            $admin_panel_setting = ModelsAdmin_panel_setting::where('com_code', auth()->user()->com_code)->first();
            $admin_panel_setting->system_name = $request->system_name;
            $admin_panel_setting->address = $request->address;
            $admin_panel_setting->phone = $request->phone;
            $admin_panel_setting->general_alert = $request->general_alert;
            $admin_panel_setting->updated_by = auth()->user()->id;
            $admin_panel_setting->updated_at = date('Y-m-d H:i:s');
            $oldphotopath = $admin_panel_setting->photo;
            if ($request->has('photo')) {
                $request->validate([
                    'photo' => 'required|mimes:png,jpg,jpeg|max:2000'
                ]);
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $admin_panel_setting->photo = $the_file_path;
                if (file_exists('assets/admin/uploads/' . $oldphotopath)) {
                    unlink('assets/admin/uploads/' . $oldphotopath);
                }
            }
            $admin_panel_setting->save();
            return redirect()->route('admin.adminPanelSetting.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.adminPanelSetting.index')->with(['error' => '  عفواً حدث خطأ ما  ' . $ex->getMessage()]);
        }
    }
}
