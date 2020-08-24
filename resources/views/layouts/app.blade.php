<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .mail-box {
            border-collapse: collapse;
            border-spacing: 0;
            display: table;
            table-layout: fixed;
            width: 100%;
        }
        .mail-box aside {
            display: table-cell;
            float: none;
            height: 100%;
            padding: 0;
            vertical-align: top;
        }
        .mail-box .sm-side {
            background: none repeat scroll 0 0 #e5e8ef;
            border-radius: 4px 0 0 4px;
            width: 25%;
        }
        .mail-box .lg-side {
            background: none repeat scroll 0 0 #fff;
            border-radius: 0 4px 4px 0;
            width: 75%;
        }
        .mail-box .sm-side .user-head {
            background: none repeat scroll 0 0 #00a8b3;
            border-radius: 4px 0 0;
            color: #fff;
            min-height: 80px;
            padding: 10px;
        }
        .user-head .inbox-avatar {
            float: left;
            width: 65px;
        }
        .user-head .inbox-avatar img {
            border-radius: 4px;
        }
        .user-head .user-name {
            display: inline-block;
            margin: 0 0 0 10px;
        }
        .user-head .user-name h5 {
            font-size: 14px;
            font-weight: 300;
            margin-bottom: 0;
            margin-top: 15px;
        }
        .user-head .user-name h5 a {
            color: #fff;
        }
        .user-head .user-name span a {
            color: #87e2e7;
            font-size: 12px;
        }
        a.mail-dropdown {
            background: none repeat scroll 0 0 #80d3d9;
            border-radius: 2px;
            color: #01a7b3;
            font-size: 10px;
            margin-top: 20px;
            padding: 3px 5px;
        }
        .inbox-body {
            padding: 20px;
        }
        .btn-compose {
            background: none repeat scroll 0 0 #ff6c60;
            color: #fff;
            padding: 12px 0;
            text-align: center;
            width: 100%;
        }
        .btn-compose:hover {
            background: none repeat scroll 0 0 #f5675c;
            color: #fff;
        }
        ul.inbox-nav {
            display: inline-block;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .inbox-divider {
            border-bottom: 1px solid #d5d8df;
        }
        ul.inbox-nav li {
            display: inline-block;
            line-height: 45px;
            width: 100%;
        }
        ul.inbox-nav li a {
            color: #6a6a6a;
            display: inline-block;
            line-height: 45px;
            padding: 0 20px;
            width: 100%;
        }
        ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {
            background: none repeat scroll 0 0 #d5d7de;
            color: #6a6a6a;
        }
        ul.inbox-nav li a i {
            color: #6a6a6a;
            font-size: 16px;
            padding-right: 10px;
        }
        ul.inbox-nav li a span.label {
            margin-top: 13px;
        }
        ul.labels-info li h4 {
            color: #5c5c5e;
            font-size: 13px;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 5px;
            text-transform: uppercase;
        }
        ul.labels-info li {
            margin: 0;
        }
        ul.labels-info li a {
            border-radius: 0;
            color: #6a6a6a;
        }
        ul.labels-info li a:hover, ul.labels-info li a:focus {
            background: none repeat scroll 0 0 #d5d7de;
            color: #6a6a6a;
        }
        ul.labels-info li a i {
            padding-right: 10px;
        }
        .nav.nav-pills.nav-stacked.labels-info p {
            color: #9d9f9e;
            font-size: 11px;
            margin-bottom: 0;
            padding: 0 22px;
        }
        .inbox-head {
            background: none repeat scroll 0 0 #41cac0;
            border-radius: 0 4px 0 0;
            color: #fff;
            min-height: 80px;
            padding: 20px;
        }
        .inbox-head h3 {
            display: inline-block;
            font-weight: 300;
            margin: 0;
            padding-top: 6px;
        }
        .inbox-head .sr-input {
            border: medium none;
            border-radius: 4px 0 0 4px;
            box-shadow: none;
            color: #8a8a8a;
            float: left;
            height: 40px;
            padding: 0 10px;
        }
        .inbox-head .sr-btn {
            background: none repeat scroll 0 0 #00a6b2;
            border: medium none;
            border-radius: 0 4px 4px 0;
            color: #fff;
            height: 40px;
            padding: 0 20px;
        }
        .table-inbox {
            border: 1px solid #d3d3d3;
            margin-bottom: 0;
        }
        .table-inbox tr td {
            padding: 12px !important;
        }
        .table-inbox tr td:hover {
            cursor: pointer;
        }
        .table-inbox tr td .fa-star.inbox-started, .table-inbox tr td .fa-star:hover {
            color: #f78a09;
        }
        .table-inbox tr td .fa-star {
            color: #d5d5d5;
        }
        .table-inbox tr.unread td {
            background: none repeat scroll 0 0 #f7f7f7;
            font-weight: 600;
        }
        ul.inbox-pagination {
            float: right;
        }
        ul.inbox-pagination li {
            float: left;
        }
        .mail-option {
            display: inline-block;
            margin-bottom: 10px;
            width: 100%;
        }
        .mail-option .chk-all, .mail-option .btn-group {
            margin-right: 5px;
        }
        .mail-option .chk-all, .mail-option .btn-group a.btn {
            background: none repeat scroll 0 0 #fcfcfc;
            border: 1px solid #e7e7e7;
            border-radius: 3px !important;
            color: #afafaf;
            display: inline-block;
            padding: 5px 10px;
        }
        .inbox-pagination a.np-btn {
            background: none repeat scroll 0 0 #fcfcfc;
            border: 1px solid #e7e7e7;
            border-radius: 3px !important;
            color: #afafaf;
            display: inline-block;
            padding: 5px 15px;
        }
        .mail-option .chk-all input[type="checkbox"] {
            margin-top: 0;
        }
        .mail-option .btn-group a.all {
            border: medium none;
            padding: 0;
        }
        .inbox-pagination a.np-btn {
            margin-left: 5px;
        }
        .inbox-pagination li span {
            display: inline-block;
            margin-right: 5px;
            margin-top: 7px;
        }
        .fileinput-button {
            background: none repeat scroll 0 0 #eeeeee;
            border: 1px solid #e6e6e6;
        }
        .inbox-body .modal .modal-body input, .inbox-body .modal .modal-body textarea {
            border: 1px solid #e6e6e6;
            box-shadow: none;
        }
        .btn-send, .btn-send:hover {
            background: none repeat scroll 0 0 #00a8b3;
            color: #fff;
        }
        .btn-send:hover {
            background: none repeat scroll 0 0 #009da7;
        }
        .modal-header h4.modal-title {
            font-family: "Open Sans",sans-serif;
            font-weight: 300;
        }
        .modal-body label {
            font-family: "Open Sans",sans-serif;
            font-weight: 400;
        }
        .heading-inbox h4 {
            border-bottom: 1px solid #ddd;
            color: #444;
            font-size: 18px;
            margin-top: 20px;
            padding-bottom: 10px;
        }
        .sender-info {
            margin-bottom: 20px;
        }
        .sender-info img {
            height: 30px;
            width: 30px;
        }
        .sender-dropdown {
            background: none repeat scroll 0 0 #eaeaea;
            color: #777;
            font-size: 10px;
            padding: 0 3px;
        }
        .view-mail a {
            color: #ff6c60;
        }
        .attachment-mail {
            margin-top: 30px;
        }
        .attachment-mail ul {
            display: inline-block;
            margin-bottom: 30px;
            width: 100%;
        }
        .attachment-mail ul li {
            float: left;
            margin-bottom: 10px;
            margin-right: 10px;
            width: 150px;
        }
        .attachment-mail ul li img {
            width: 100%;
        }
        .attachment-mail ul li span {
            float: right;
        }
        .attachment-mail .file-name {
            float: left;
        }
        .attachment-mail .links {
            display: inline-block;
            width: 100%;
        }

        .fileinput-button {
            float: left;
            margin-right: 4px;
            overflow: hidden;
            position: relative;
        }
        .fileinput-button input {
            cursor: pointer;
            direction: ltr;
            font-size: 23px;
            margin: 0;
            opacity: 0;
            position: absolute;
            right: 0;
            top: 0;
            transform: translate(-300px, 0px) scale(4);
        }
        .fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {
            margin-bottom: 5px;
        }
        .files .progress {
            width: 200px;
        }
        .fileupload-processing .fileupload-loading {
            display: block;
        }
        * html .fileinput-button {
            line-height: 24px;
            margin: 1px -3px 0 0;
        }
        * + html .fileinput-button {
            margin: 1px 0 0;
            padding: 2px 15px;
        }
        @media (max-width: 767px) {
            .files .btn span {
                display: none;
            }
            .files .preview * {
                width: 40px;
            }
            .files .name * {
                display: inline-block;
                width: 80px;
                word-wrap: break-word;
            }
            .files .progress {
                width: 20px;
            }
            .files .delete {
                width: 60px;
            }
        }
        ul {
            list-style-type: none;
            padding: 0px;
            margin: 0px;
        }
        .chatperson{
            display: block;
            border-bottom: 1px solid #eee;
            width: 100%;
            display: flex;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            margin-bottom: 15px;
            padding: 4px;
        }
        .chatperson:hover{
            text-decoration: none;
            border-bottom: 1px solid orange;
        }
        .namechat {
            display: inline-block;
            vertical-align: middle;
        }
        .chatperson .chatimg img{
            width: 40px;
            height: 40px;
            background-image: url('http://i.imgur.com/JqEuJ6t.png');
        }
        .chatperson .pname{
            font-size: 18px;
            padding-left: 5px;
        }
        .chatperson .lastmsg{
            font-size: 12px;
            padding-left: 5px;
            color: #ccc;
        }


        .col-md-2, .col-md-10{
            padding:0;
        }
        .panel{
            margin-bottom: 0px;
        }
        .chat-window{
            bottom:0;
            position:fixed;
            float:right;
            margin-left:10px;
        }
        .chat-window > div > .panel{
            border-radius: 5px 5px 0 0;
        }
        .icon_minim{
            padding:2px 10px;
        }
        .msg_container_base{
            background: #e5e5e5;
            margin: 0;
            padding: 0 10px 10px;
            max-height:300px;
            overflow-x:hidden;
        }
        .top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }
        .msg_receive{
            padding-left:0;
            margin-left:0;
        }
        .msg_sent{
            padding-bottom:20px !important;
            margin-right:0;
        }
        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width:100%;
        }
        .messages > p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
        }
        .messages > time {
            font-size: 11px;
            color: #ccc;
        }
        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }
        img {
            display: block;
            width: 100%;
        }
        .avatar {
            position: relative;
        }
        .base_receive > .avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }

        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
        }
        .base_sent > .avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
        }

        .msg_sent > time{
            float: right;
        }



        .msg_container_base::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar
        {
            width: 12px;
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar-thumb
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }

        .btn-group.dropup{
            position:fixed;
            left:0px;
            bottom:0;
        }

    </style>
</head>
<body>
    <div id="app">

        <div class="container">
            <div class="mail-box">
                <aside class="sm-side">
                    <div class="user-head">
                        <a class="inbox-avatar" href="javascript:;">
                            <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                        </a>
                        <div class="user-name">
                            <h5><a href="#">{{auth()->user()->name}}</a></h5>
                            <span><a href="#">{{auth()->user()->email}}</a></span>
                        </div>
                        <a class="mail-dropdown pull-right" href="javascript:;">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                    <div class="inbox-body">
                        <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                            Compose
                        </a>
                        <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Compose</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">To</label>
                                                <div class="col-lg-10">
                                                    <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Cc / Bcc</label>
                                                <div class="col-lg-10">
                                                    <input type="text" placeholder="" id="cc" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Subject</label>
                                                <div class="col-lg-10">
                                                    <input type="text" placeholder="" id="inputPassword1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Message</label>
                                                <div class="col-lg-10">
                                                    <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>
                                                    <button class="btn btn-send" type="submit">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                    <ul class="inbox-nav inbox-divider">
                        <li class="active">
                            <router-link to="/chatBox" >
                                <i class="fa fa-plus"></i> Add Room <span class="label label-danger pull-right">2</span>
                            </router-link>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-user"></i> My Rooms <span class="label label-danger pull-right">2</span></a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-users"></i> All Rooms <span class="label label-danger pull-right">2</span></a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-stacked labels-info ">
                        <li> <h4>Buddy online</h4> </li>
                        <li> <a href="#"> <i class=" fa fa-circle text-success"></i>Alireza Zare <p>I do not think</p></a>  </li>
                        <li> <a href="#"> <i class=" fa fa-circle text-danger"></i>Dark Coders<p>Busy with coding</p></a> </li>
                        <li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Mentaalist <p>I out of control</p></a>
                        </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>H3s4m<p>I am not here</p></a>
                        </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Dead man<p>I do not think</p></a>
                        </li>
                    </ul>

                    <div class="inbox-body text-center">
                        <div class="btn-group">
                            <a class="btn mini btn-primary" href="javascript:;">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn mini btn-success" href="javascript:;">
                                <i class="fa fa-phone"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn mini btn-info" href="javascript:;">
                                <i class="fa fa-cog"></i>
                            </a>
                        </div>
                    </div>

                </aside>
                <aside class="lg-side">
                    <div class="inbox-head">
                        <h3>Inbox</h3>
                        <form action="#" class="pull-right position">
                            <div class="input-append">
                                <input type="text" class="sr-input" placeholder="Search Mail">
                                <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="inbox-body">
                        <router-view></router-view>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</body>
</html>
