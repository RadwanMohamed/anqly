@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>تعديل بيانات</small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            @if(\Session::has('status'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('status') !!}</li>
                    </ul>
                </div>
            @endif

            <form role="form" action="{{route('users.update',$user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم المستخدم</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}"> </div>
                    </div>
                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}"> </div>
                    </div>
                    <div class="form-group">
                        <label> رقم المحمول </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" name="phone" class="form-control" value="{{$user->phone}}"> </div>
                    </div>

                    <div class="form-group">
                        <label>اختر نوع المستخدم </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-unlock"></i>
                            </span>
                            <select name="role" class="form-control user-type">
                                <option value="{{\App\User::DRIVER}}"  @if($user->role == \App\User::DRIVER) selected @endif> سائق  </option>
                                <option value="{{\App\User::CLIENT}}"  @if($user->role == \App\User::CLIENT) selected @endif> عميل  </option>
                                <option value="{{\App\User::ADMIN}}"  @if($user->role == \App\User::ADMIN) selected @endif> مدير موقع</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> المدينة </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-institution"></i>
                            </span>
                            <input type="text" name="city" class="form-control" value="{{$user->city}}"> </div>
                    </div>
                    </div>
                <div class="form-group">
                    <label> الرصيد  </label>
                    <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-location-arrow"></i>
                            </span>
                        <input type="text" name="balance" class="form-control{{ $errors->has('balance') ? ' is-invalid' : '' }}" value="balance">

                    </div>
                    @if ($errors->has('balance'))
                        <span class="invalid-feedback " role="alert">
                                        <strong class="error">{{ $errors->first('balance') }}</strong>
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
