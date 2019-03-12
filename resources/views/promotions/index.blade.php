@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
            <tr>
                <th width="20%"> م</th>
                <th> الاسم</th>
                <th class="numeric">الكود</th>
                <th class="numeric"> عدد مرات الاستخدام</th>
                <th class="numeric"> حالة الكود</th>
                <th class="numeric"> نوعه </th>
                <th class="numeric"> القيمة </th>
                <th> تفعيل</th>
                <th> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Charges as $Charge)
                <tr>
                    <td> {{$Charge->id}} </td>
                    <td>
                         {{$Charge->name}}
                    </td>
                    <td> {{$Charge->code}} </td>
                    <td> {{$Charge->count}} </td>
                    <td>
                        {{codeStatus($Charge->status)}}
                    </td>
                    <td> {{$Charge->type}} </td>
                    <td> {{$Charge->value}} </td>
                    <td>
                        @if($Charge->status== \App\Charge::EXPIRED)
                            <form action="{{url('/adminpanel/charge/'.$Charge->id.'/activate')}}" method="post">
                                @csrf
                                <button type="submit" class="btn green"> تفعيل </button>
                            </form>
                        @else
                        <form action="{{url('/adminpanel/charge/'.$Charge->id.'/deactivate')}}" method="post">
                            @csrf
                            <button type="submit" class="btn "> الغاء التفعيل </button>
                        </form>
                        @endif

                    </td>


                    <td>
                        <form action="{{route('charge.destroy',$Charge->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn red"> حذف</button>
                        </form>

                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
