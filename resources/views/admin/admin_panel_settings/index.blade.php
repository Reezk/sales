@extends('layouts.admin')

@section('title')
الضبط العام
@endsection


@section('contentheader')
الرئيسية
@endsection


@section('contentheaderlink')
<a href="{{ route('admin.adminPanelSetting.index') }}">الضبط</a>
@endsection


@section('contentheaderactive')
عرض
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (@isset($data) && !@empty($data))
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="width30">أسم الشركة</td>
                            <td>{{ $data['system_name'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">كود الشركة</td>
                            <td>{{ $data['com_code'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">حالة الشركة</td>
                            <td>@if ($data['active']==1)
                                مفعل
                                @else
                                معطل
                                @endif</td>
                        </tr>
                        <tr>
                            <td class="width30">عنوان الشركة</td>
                            <td>{{ $data['address'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">هاتف الشركة</td>
                            <td>{{ $data['phone'] }}</td>
                        </tr>

                        <tr>
                            <td class="width30">رسالة تنبيه أعلى الشاشة للشركة</td>
                            <td>{{ $data['general_alert'] }}</td>
                        </tr>
                        <tr>
                            <td class="width30">شعار الشركة</td>
                            <td>
                                <div class="image">
                                    <img class="custom_img"
                                        src="{{ asset('/assets/admin/uploads').'/'.$data['photo'] }}" alt="لوغو الشركة">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="width30">اخر تحديث الشركة</td>
                            <td>
                                @if ($data['updated_by']>0 && $data['updated_by'] != null)

                                @php
                                $dt = new DateTime($data['updated_at']);
                                $date = $dt->format('Y-m-d');
                                $time = $dt->format('h:i');
                                $newDateTime = date('A',strtotime($time));
                                $newDateTimeType = (($newDateTime == 'AM')? 'صباحاً':'مساءاُ');
                                @endphp
                                {{ $date }}
                                {{ $time }}
                                {{ $newDateTimeType }}
                                بواسطة
                                {{ $data['updated_by_admin'] }}
                                @else
                                لا يوجد تحديث
                                @endif
                            </td>

                        </tr>
                    </thead>
                </table>
                <a href="{{ route('admin.adminPanelSetting.edit') }}" class="btn btn-sm btn-success btn-block">تعديل</a>
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