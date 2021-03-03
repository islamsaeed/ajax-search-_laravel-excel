@extends('admin.layouts.master')
@section('title')
رفع ملف
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('Admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('Admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('Admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('Admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('Admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('Admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('Admin/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">رفع ملف اكسل </h4>
        </div>
    </div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')

@if (session()->has('Added_Succesfully'))
<script>
    window.onload = function() {
        notif({
            msg: "تم الحفظ بنجاح"
            , type: "success"
        });
    }
</script>
@endif

@if (session()->has('Delete_Succesfully'))
<script>
    window.onload = function() {
        notif({
            msg: "تم الحذف بنجاح"
            , type: "success"
        });
    }
</script>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
















<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">

                <div class="row">
                    {{-- strat Button Create --}}
                    <div class="col-4">
                        <a class="modal-effect btn btn-outline-primary mr-1 mb-1" data-effect="effect-scale"
                            data-toggle="modal" href="#add_section">اضافه</a>

                        @include('admin.cvs.create')
                    </div>
                    {{-- End Button Create --}}



                    <a class="modal-effect btn btn-warning mr-1 mb-1" href='#delete' data-toggle="modal"
                        data-effect="effect-scale" href="{{ route('alldelete') }}">حذف </a>
                    @include('admin.cvs.delete_all')
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap text-center">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th>الاسم</th>
                                <th>رقم الهويه</th>
                                <th>رقم الجوال</th>
                                <th>المهنه</th>
                                <th>تاريخ النزول</th>
                                <th>الرد</th>
                                <th>بدايه التصريح</th>
                                <th>نهايه التصريح</th>
                                <th>الملاحظات </th>
                                <th> الاجرائات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            @endphp
                            @foreach ($data as $row)
                            @php
                            $i++;
                            @endphp

                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->name}}</td>
                                <td>{{ $row->social_number}}</td>
                                <td>{{ $row->phone}}</td>
                                <td>{{ $row->job}}</td>
                                <td>{{ $row->going_date}}</td>
                                <td>{{ $row->response}}</td>
                                <td>{{ $row->start_permit}}</td>
                                <td>{{ $row->end_permit}}</td>
                                <td>{{ $row->notes}}</td>
                                <td>الاجرائات</td>





                                <td>
                                    <button class="dropdown-item " data-toggle="modal"
                                        data-target="#delete_section{{ $row->id }}"><i
                                            class="text-danger fas fa-trash-alt"></i>
                                        &nbsp;&nbsp;حذف</button>

                                </td>

                                @include('admin.cvs.delete')
                                @include('admin.cvs.edit')
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('Admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('Admin/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('Admin/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('Admin/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
