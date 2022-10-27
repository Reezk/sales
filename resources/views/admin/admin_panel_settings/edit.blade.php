@extends('layouts.admin')

@section('title')
تعديل الضبط العام
@endsection


@section('contentheader')
الرئيسية
@endsection


@section('contentheaderlink')
<a href="{{ route('admin.adminPanelSetting.index') }}">الضبط</a>
@endsection


@section('contentheaderactive')
تعديل
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">تعديل بيانات الضبط العام</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (@isset($data) && !@empty($data))
                <form action="{{ route('admin.adminPanelSetting.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">أسم الشركة</label>
                        <input name="system_name" id="system_name" class="form-control"
                            value="{{ $data['system_name'] }}" placeholder="أدخل أسم الشركة"
                            oninvalid="setCoustomValidity('من فضلك أدخل هذا الحقل')"
                            onchange="try{setCoustomValidity('')}">
                        @error('system_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">عنوان الشركة</label>
                        <input name="address" id="address" class="form-control" value="{{ $data['address'] }}"
                            placeholder="أدخل عنوان الشركة" oninvalid="setCoustomValidity('من فضلك أدخل هذا الحقل')"
                            onchange="try{setCoustomValidity('')}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">هاتف الشركة</label>
                        <input name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}"
                            placeholder="أدخل هاتف الشركة" oninvalid="setCoustomValidity('من فضلك أدخل هذا الحقل')"
                            onchange="try{setCoustomValidity('')}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> رسالة تنبيه أعلى الشاشة للشركة</label>
                        <input name="general_alert" id="general_alert" class="form-control"
                            value="{{ $data['general_alert'] }}" placeholder=" أدخل رسالة تنبيه أعلى الشاشة للشركة"
                            oninvalid="setCoustomValidity('من فضلك أدخل هذا الحقل')"
                            onchange="try{setCoustomValidity('')}">

                    </div>
                    <div class="form-group">
                        <label for="">شعار الشركة</label>
                        <div class="image">
                            <img class="custom_img" src="{{ asset('/assets/admin/uploads').'/'.$data['photo'] }}"
                                alt="لوغو الشركة">
                            <button type="button" class="btn btn-sm btn-secondary " id="update_image">تغيير
                                الصورة</button>
                            <button type="button" class="btn btn-sm btn-danger " style="display: none"
                                id="cancel_update_image">الغاء </button>
                        </div>
                    </div>
                    <div id="oldimage"></div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-sm btn-primary btn-block">حفظ التعديلات</button>
                    </div>
                </form>
                @else
                <div class="alert alert-danger">
                    عفوا لا يوجد بيانات لعرضها
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection