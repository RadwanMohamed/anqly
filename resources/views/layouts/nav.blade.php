<li class="nav-item start active open">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">التقارير</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start active open">
            <a href="{{route('reports.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> عرض  تقرير عن كمية المبيعات </span>
                <span class="selected"></span>
            </a>
        </li>


    </ul>
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">المستخدمين</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start active open">
            <a href="{{route('users.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> عرض جميع المستخدمين </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start active open">
            <a href="{{route('drivers.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> عرض جميع السائقين </span>
                <span class="selected"></span>
            </a>
        </li>   <li class="nav-item start active open">
            <a href="{{route('clients.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> عرض جميع العملاء </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start active open">
            <a href="{{route('users.create')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> اضافة مستخدم جديد </span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title"> نوع السيارة </span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start active open">
            <a href="{{route('categories.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> عرض جميع السيارات </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start active open">
            <a href="{{route('categories.create')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> اضافة سيارة جديدة </span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>


    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title"> اكواد الشحن  </span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start active open">
            <a href="{{route('charge.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> عرض جميع الاكواد </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start active open">
            <a href="{{route('charge.create')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> اضافة كود جديد </span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>
    {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
        {{--<i class="icon-home"></i>--}}
        {{--<span class="title"> الطلبات </span>--}}
        {{--<span class="selected"></span>--}}
        {{--<span class="arrow open"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li class="nav-item start active open">--}}
            {{--<a href="{{route('requests.index')}}" class="nav-link ">--}}
                {{--<i class="icon-bar-chart"></i>--}}
                {{--<span class="title"> عرض جميع الطلبات </span>--}}
                {{--<span class="selected"></span>--}}
            {{--</a>--}}
        {{--</li>--}}


    {{--</ul>--}}
    {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
        {{--<i class="icon-home"></i>--}}
        {{--<span class="title"> الفروع </span>--}}
        {{--<span class="selected"></span>--}}
        {{--<span class="arrow open"></span>--}}
    {{--</a>--}}
    {{--<ul class="sub-menu">--}}
        {{--<li class="nav-item start active open">--}}
            {{--<a href="{{route('branches.index')}}" class="nav-link ">--}}
                {{--<i class="icon-bar-chart"></i>--}}
                {{--<span class="title"> عرض جميع الفروع </span>--}}
                {{--<span class="selected"></span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item start active open">--}}
            {{--<a href="{{route('branches.create')}}" class="nav-link ">--}}
                {{--<i class="icon-bar-chart"></i>--}}
                {{--<span class="title"> اضافة فرع جديد </span>--}}
                {{--<span class="selected"></span>--}}
            {{--</a>--}}
        {{--</li>--}}

    {{--</ul>--}}
<a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title"> اعدادت الموقع </span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start active open">
            <a href="{{route('settings.index')}}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title"> تعديل </span>
                <span class="selected"></span>
            </a>
        </li>


    </ul>


</li>
