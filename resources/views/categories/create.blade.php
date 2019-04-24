@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم السيارة </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control" placeholder="من فضلك ادخل الاسم باللغة العربية"> </div>
                        @if ($errors->has('name'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>


                    {{--<div class="form-group">--}}
                        {{--<label>صورة الصنف</label>--}}
                        {{--<div class="input-group">--}}
                            {{--<span class="input-group-addon">--}}
                               {{--<i class="fa fa-envelope"></i>--}}
                            {{--</span>--}}
                            {{--<input type="file" name="photo" class="form-control" placeholder="من فضلك ادخل صورة الصنف "> </div>--}}
                        {{--@if ($errors->has('photo'))--}}
                            {{--<span class="help-block " role="alert">--}}
                                        {{--<strong class="error">{{ $errors->first('photo') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label> وصف  </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <textarea type="text" name="description" class="form-control" placeholder="اضف وصف باللغة العربية "></textarea> </div>
                        @if ($errors->has('description'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>صورة السيارة </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="file" name="img" class="form-control" >
                        </div>
                        @if ($errors->has('img'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('img') }}</strong>
                                    </span>
                        @endif
                    </div>




                <div class="form-actions">
                    <button type="submit" class="btn blue">حفظ</button>
                </div>

                </div>
            </form>
        </div>
    </div>

@endsection
