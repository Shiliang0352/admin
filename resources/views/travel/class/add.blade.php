@extends('travel.layouts.index')
@section('style')
        form {
            width: 500px;
            margin: auto;
            text-align: left;
        }

        form p {
            margin-bottom: 13px;
        }

        form label {
            width: 25%;
            display: inline-block;
        }

        form input {
            margin-left: 5px;
            padding: 8px 10px;
            width: 200px;
        }

        form .name {
            width: 80%;
            margin-left: 0;
        }

        form #addType {
            width: 100%;
            padding: 10px 0;
            color: blue;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
        }

        form .center {
            padding-top: 70px;
        }

        form select {
            width: 220px;
            height: 40px;
            border: solid #efefef 2px;
            outline: none;
        }

        form select option {
            height: 35px;
        }
@endsection

@section('toplist')
<li><a href="/travelclass">分类列表</a></li>
<li class="closeLi">
    <a class="active" >添加分类</a>
    <a class="closePage" href="/travelclass">×</a>
</li>
@endsection
@section('main')
<div class="main fl clearfloat">
    <h2>添加分类</h2>
    <form action="/travelclass" method="post">
        {{csrf_field()}}
        <p>
            <label for="name">选择资源分类：</label>
            <select name="classid" id="">
                @foreach($class as $k=>$v)
                <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
        </p>
        <p><label for="type">子类型：</label><input type="text" name="name" placeholder="请输入子类型名称"></p>

        <p class="center"><button class="blue-btn">完成添加</button></p>
    </form>
</div>
@endsection
@section('script')
    $('#class').addClass('active');
@endsection
