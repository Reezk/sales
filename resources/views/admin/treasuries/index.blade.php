@extends('layouts.admin')

@section('title')
الضبط العام
@endsection


@section('contentheader')
الخزن
@endsection


@section('contentheaderlink')
<a href="{{ route('admin.treasuries.index') }}">الخزن</a>
@endsection


@section('contentheaderactive')
عرض
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">بيانات الخزن</h3>
                <a class="btn btn-sm btn-success" href="{{ route('admin.treasuries.create') }}">إضافة جديد</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (@isset($data) && !@empty($data))
                @php
                $i = 1;
                @endphp
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="costum_thead">
                        <th>تسلسل</th>
                        <th>أسم الخزنة</th>
                        <th>هل رئيسية</th>
                        <th>اخر ايصال صرف</th>
                        <th>اخر ايصال تحصيل</th>
                        <th>حالة التفعيل</th>
                        <td></td>
                        {{-- <th>تاريخ الاضافة</th>
                        <th>تاريخ التحديث</th> --}}
                    </thead>
                    <tbody>
                        @foreach ($data as $info)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$info->name}}</td>
                            <td>@if ($info->is_master==1)رئيسية @else فرعية @endif</td>
                            <td>{{$info->its_isal_exchange}}</td>
                            <td>{{$info->its_isal_collect}}</td>
                            <td>@if ($info->active==1) مفعل @else معطل @endif</td>

                            {{-- <td>

                                @php
                                $dt = new DateTime($info->created_at);
                                $date = $dt->format('Y-m-d');
                                $time = $dt->format('h:i');
                                $newDateTime = date('A',strtotime($time));
                                $newDateTimeType = (($newDateTime == 'AM')? 'صباحاً':'مساءاُ');
                                @endphp
                                {{ $date }}<br>
                                {{ $time }}
                                {{ $newDateTimeType }}<br>
                                بواسطة
                                {{ $data['added_by_name'] }}

                            </td>
                            <td>
                                @if ($info['updated_by']>0 && $info['updated_by'] != null)

                                @php
                                $dt = new DateTime($info['updated_at']);
                                $date = $dt->format('Y-m-d');
                                $time = $dt->format('h:i');
                                $newDateTime = date('A',strtotime($time));
                                $newDateTimeType = (($newDateTime == 'AM')? 'صباحاً':'مساءاُ');
                                @endphp
                                {{ $date }}<br>
                                {{ $time }}
                                {{ $newDateTimeType }}<br>
                                بواسطة
                                {{ $info['updated_by_admin'] }}
                                @else
                                لا يوجد تحديث
                                @endif
                            </td> --}}
                            <td>
                                <a type="submit" href="{{ route('admin.treasuries.edit',$info->id) }}"
                                    class="btn btn-primary">تعديل</a>
                                <button data-id="{{ $info->id }}" type="submit" class="btn btn-info">المزيد</button>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table><br>
                {{-- {{ $data->links()}} --}}
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