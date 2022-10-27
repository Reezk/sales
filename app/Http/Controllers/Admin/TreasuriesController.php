<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreasuriesRequest;
use App\Models\Admin;
use App\Models\Treasuries;



class TreasuriesController extends Controller
{
    /* Index */
    public function index()
    {
        $data = Treasuries::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');

                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }


        return view('admin.treasuries.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.treasuries.create');
    }

    public function store(TreasuriesRequest $request)
    {

        try {
            $com_code = auth()->user()->com_code;
            //check if not exsits
            $checkExists = Treasuries::where(['name' => $request->name, 'com_code' => $com_code])->first();
            if ($checkExists == null) {
                if ($request->is_master == 1) {
                    $checkExists_isMaster = Treasuries::where(['is_master' => 1, 'com_code' => $com_code])->first();
                    if ($checkExists_isMaster != null) {
                        return redirect()->back()
                            ->with(['error' => 'عفوا هناك خزنة رئيسية بالفعل مسجلة من قبل لايمكن ان يكون هناك اكثر من خزنة رئيسية'])
                            ->withInput();
                    }
                }


                $data['name'] = $request->name;
                $data['is_master'] = $request->is_master;
                $data['last_isal_exhcange'] = $request->last_isal_exhcange;
                $data['last_isal_collect'] = $request->last_isal_collect;
                $data['active'] = $request->active;
                $data['created_at'] = date("Y-m-d H:i:s");
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
                $data['date'] = date("Y-m-d");
                Treasuries::create($data);
                /* $newRow = new Treasuries();
                $newRow->name = $request->name;
                $newRow->is_master = $request->is_master;
                $newRow->last_isal_exhcange = $request->last_isal_exhcange;
                $newRow->last_isal_collect = $request->last_isal_collect;
                $newRow->active = $request->active;
                $newRow->added_by = auth()->user()->id;
                $newRow->com_code = $com_code;
                $newRow->save(); */

                return redirect()->route('admin.treasuries.index')->with(['success' => 'لقد تم اضافة البيانات بنجاح']);
            } else {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الخزنة مسجل من قبل'])
                    ->withInput();
            }
        } catch (\Exception $ex) {

            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }


    public function edit($id)
    {
        $data = Treasuries::select()->find($id);
        return view('admin.treasuries.edit', ['data' => $data]);
    }
    public function update(TreasuriesRequest $request, $id)
    {
    }
}
