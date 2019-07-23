<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-编辑资源</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>

        /* form */
        form {
            padding-top: 20px;
        }

        form label {
            width: 110px;
            display: inline-block;
            text-align: center;
            font-size: 18px;
            color: #7D7D7D;
        }

        form input {
            width: 220px;
            height: 40px;
            padding: 0 5px;
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

        form textarea {
            width: 900px;
            height: 150px;
            outline: none;
            resize: none;
            vertical-align: top;
            padding: 5px;
        }

        form .upimgspan {
            display: inline-block;
            width: 150px;
            height: 150px;
            border: solid #ededed 2px;
            background: url('./images/TravelRepository/upimg.png') no-repeat 50%;
        }

        form input[type='file'] {
            opacity: 0;
            width: 150px;
            height: 150px;
            cursor: pointer;
        }

        form p {
            margin-top: 10px;
            margin-left: 110px;
            font-size: 13px;
            color: #7D7D7D;
        }

        form p span {
            font-size: 13px;
            color: #F98F15;
        }

        form .submitbox {
            text-align: center;
        }

        form input[type='submit'] {
            width: 139px;
            height: 42px;
            background: rgba(23, 169, 255, 1);
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            font-size: 18px;
        }

        /* 上传图片 */
        .upimgbox {
            width: 84%;
            position: relative;
            display: inline-block;
            vertical-align: top;
        }

        .upimgbox div {
            width: 110px;
            height: 110px;
            margin-right: 10px;
            display: inline-block;
        }

        #upimgperbox0,
        #upimgperbox1,
        #upimgperbox2,
        #upimgperbox3 {
            width: 100% !important;
            position: absolute;
            top: 0;
            left: 125px;
        }

        .uploadImgBtn {
            border: solid #ededed 2px;
            width: 110px;
            height: 110px;
            cursor: pointer;
            position: relative;
            background: url("/images/TravelRepository/upimg.png") no-repeat 50%;
            -webkit-background-size: 50px;
            background-size: 50px;
        }

        .uploadImgBtn .uploadImg {
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        /* //这是一个用做回显的盒子的样式 */
        .pic {
            width: 100px;
            height: 100px;
        }

        .pic img {
            width: 100%;
            height: 100%;
        }
 

        /* 上传图片 */
    </style>
</head>

<body class="clearfloat">
    <div class="nav fl">
        <div class="logo">
            <h1>懒游星球</h1>
            <span>A端管理系统</span>
        </div>
        <ul class="">
            <li class="clearfloat"><a  href="/">首页</a></li>
            <li class="clearfloat"><a class="active" href="/resource">行程资源库</a></li>
            <li class="clearfloat"><a href="">商品行程</a></li>
            <li class="clearfloat"><a href="">订单列表</a></li>
            <li class="clearfloat"><a href="">分类管理</a></li>
            <li class="clearfloat"><a href="">用户管理</a></li>
        </ul>
    </div>
    <div class="content fl">
        <div class="header clearfloat">
            <ul class="fl clearfloat">
                <li><a href="/resource">资源库</a></li>
                <li><a class="active">编辑资源</a></li>
            </ul>
            <div class="user fr">
                <img class="user-avatar" src="/images/avatar.jpg" alt="user avatar">
                <span class="user-name">用户名</span>
                <span>【退出】</span>
            </div>
        </div>
        <div class="main fl clearfloat">
            <h2>资源类型</h2>
            <div class="table-list clearfloat">
                <ul class="clearfloat fl">
                    <li class="iconChange iconBg">
                        <img src="/images/TravelRepository/icon/{{$res->classinfo->icon}}">{{$res->classinfo->name}}
                    </li>
                </ul>
            </div>
            <form action="">
                <label for="JDname">景点名称</label><input type="text" name="JDname" id="JDname" value="{{$res->name}}">
                <label for="JDposition">景点位置</label><input type="text" name='position' id="JDposition"
                    value="{{$res->site}}">
                <label for="JDtype">景点类型</label>
                <select name="" id="JDtype">
                    @foreach($res->lxinfo as $k=>$v)
                        <option @if($v->id == $res->lxid)selected @endif value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
                <br><br>
                <label for="JDdetail">景点描述</label><textarea name="JDdetail" id="JDdetail" >{{$res->des}}</textarea>
                <br><br>


                <label for="file">上传图片</label>
                <div class="upimgbox upimgbox0">
                    <div class="uploadImgBtn" id="uploadImgBtn0">
                        <input class="uploadImg" type="file" name="imgs[]" multiple id="file">
                    </div>
                    <!-- 更改 per img -->
                    <div id="upimgperbox0">
                        @if($res->imgs)
                            <div class="pic">
                            @foreach($res->imgs as $k=>$v)
                                    <img src="{{$v}}">
                            @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- 更改 per img -->
                </div>
                <br><br>

                <label for="price">参考价格</label><input type="number" name="price" id="price" value="{{$res->price}}">
                <br>
                <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
                <br><br>
                <div class="submitbox">
                    <input type="submit" name="submit" id="submit">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/public.js"></script>
<script>
    // 上传图片
    // 参考：https://blog.csdn.net/weixin_42225141/article/details/80343812
    // 景点
    var parent0 = document.getElementsByClassName("upimgbox0")[0];
    var child0 = document.getElementById("upimgperbox0");
    $("#uploadImgBtn0").click(perImg(parent0, child0));



    function perImg(parent, child) {
        // 参数： parent child
        /*
        1、先获取input标签
        2、给input标签绑定change事件
        3、把图片回显
         */
        var $input = $("#file");
        // console.log($input)
        //            2、给input标签绑定change事件
        $input.on("change", function () {
            /*将子元素从父元素中删除*/
            if (child.children.length !== 0) {
                // parent.removeChild(child);
                child.innerHTML = ''
            }
            // console.log(this)
            //补充说明：因为我们给input标签设置multiple属性，因此一次可以上传多个文件
            //获取选择图片的个数
            var files = this.files;
            var length = files.length;
            if (length > 6) {
                alert('上传图片最多6张');
                return false;
            }
            // console.log("选择了" + length + "张图片");
            //3、回显
            $.each(files, function (key, value) {
                //每次都只会遍历一个图片数据
                var div = document.createElement("div"),
                    img = document.createElement("img");
                // upimgbox = document.getElementById('upimgperbox0')
                div.className = "pic";

                var fr = new FileReader();
                fr.onload = function () {
                    img.src = this.result;
                    div.appendChild(img);
                    child.appendChild(div);
                }
                fr.readAsDataURL(value);
            });



        })
        //4、我们把当前input标签的id属性remove
        $input.removeAttr("id");
    }
</script>

</html>