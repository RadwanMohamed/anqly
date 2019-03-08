@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم المستخدم</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="من فضلك ادخل اسم المستخدم">
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="من فضلك ادخل البريد الالكتروني ">

                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block" role="alert">
                    <strong class="error">{{ $errors->first('email') }}</strong>
                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> رقم المحمول </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="من فضلك ادخل رقم المحمول ">

                        </div>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                        <strong class="error">{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> كلمة المرور </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="من فضلك ادخل كلمة المرور ">

                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong class="error">{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>تاكيد كلمة المرور </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="من فضلك  اعد ادخال كلمة المرور ">
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>اختر نوع المستخدم </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-unlock"></i>
                            </span>
                            <select name="role" class="form-control user-type">
                                <option value="{{\App\User::DRIVER}}"> سائق  </option>
                                <option value="{{\App\User::CLIENT}}"> عميل  </option>
                                <option value="{{\App\User::ADMIN}}"> مدير موقع</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> المدينة </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-institution"></i>
                            </span>
                            <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="من فضلك ادخل المدينة الخاصة بك ">

                        </div>
                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                        <strong class="error">{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </div>
                <div class="form-group">
                        <label> الرصيد  </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-location-arrow"></i>
                            </span>
                            <input type="text" name="balance" class="form-control{{ $errors->has('balance') ? ' is-invalid' : '' }}" placeholder="من فضلك ادخل الرصيد الابتدائي ">

                        </div>
                    @if ($errors->has('balance'))
                        <span class="invalid-feedback " role="alert">
                                        <strong class="error">{{ $errors->first('balance') }}</strong>
                                    </span>
                    @endif

                </div>
                {{--<div class="form-group car-class">--}}
                        {{--<label> فئة السيارة  </label>--}}
                        {{--<div class="input-group">--}}
                            {{--<span class="input-group-addon">--}}
                               {{--<i class="fa fa-location-arrow"></i>--}}
                            {{--</span>--}}
                            {{--<select name="category_id" class="form-control">--}}
                                {{--<option value="0">test  </option>--}}

                            {{--@foreach($categories as $key=>$category)--}}
                                {{--<option value="{{$key}}"> {{$category[$key]}}  </option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--@if ($errors->has('category_id'))--}}
                        {{--<span class="invalid-feedback " role="alert">--}}
                                        {{--<strong class="error">{{ $errors->first('category_id') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}

                {{--</div>--}}


                <div class="form-actions">
                    <button type="submit" class="btn blue">حفظ</button>
                </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script>

        var car = $('.car-class').html();
        $('.user-type').change(function(){
            var value = $('.user-type').val();
            if(value != "{{\App\User::DRIVER}}" )
            {
             $('.car-class').html(' ');
            }else{
                $('.car-class').html(car);
            }

        });
    </script>
@endsection
