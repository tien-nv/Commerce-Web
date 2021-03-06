@extends('default')

@section('title','Admin Pornhub of VietNamese')
<!-- thêm thư viện -->
@section('addlib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bin\\bootstrap441\\css\\bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="bin\\jquery341\\jquery.min.js"></script>
    <script src="bin\\bootstrap441\\js\\bootstrap.min.js"></script>
    <script src="bin/crypto-js/aes.js"></script>
    <script src="bin/crypto-js/md5.js"></script>
    <script src="js/login.js"></script>
    <script type="text/javascript" src="js\\admin.js"></script>
@endsection

@section('main')
@include('admin_frontend/main')
@endsection

@section('chat')
<script src="js/chatAdmin.js"></script>
<style>
    .chat-icon {
        position: fixed;
        bottom: 20px;
        right: 0px;
        margin-right: 30px; 
        font-size: 40px;
        z-index: 999;
    }

    .chat-icon a {
        color: rgb(0, 72, 31);
    }

    .frame-chat {
        /* width: 400px;*/
        height: auto;
        max-width: 400px;
        position: fixed;
        bottom: 5px;
        background-color: #fff;
        border: 1px solid gray;
        border-top: 10px solid gray;
        transition: all 0.3s ease-in-out 0.3s;
        display: none;
        z-index: 999;
        right: 0;
        padding: 0px;
    }

    .exit-chat {
        width: 21px;
        height: 23px;
        border-radius: 50%;
        border: 2px solid black;
        position: absolute;
        top: -15px;
        left: -3px;
        background-color: black;
    }

    .exit-chat i {
        position: absolute;
        color: #fff;
        font-size: 20px;
    }
    .chat-content{
        height: 60px;
        display: flex;
        justify-content: center;
    }
    .chat-content h4{
        margin: 15px
        
    }
    .admin-mess {
        max-width: 170px;
        height: auto;
        border: 1px solid #5d5d5d;
        border-radius: 15px;
        float: left;
        margin: 1px 0px;
        background: whitesmoke;
        padding: 5px 7px;
        color: black;
        position: relative;
    }

    .user-mess {
        max-width: 170px;
        height: auto;
        border: 1px solid #5d5d5d;
        border-radius: 15px;
        float: right;
        margin: 1px 3px;
        background: rgb(168, 211, 202);
        padding: 5px 7px;
        color: black;
        position: relative;
    }

    .input-text {
        /* position: absolute; */
        width: 85%;
        padding: 5px;
        border: none;
        /* background: #f1f1f1; */
        resize: none;
        max-height: 45px;
        border-radius: 30px;
        border: 1px solid gray; 
    }
    textarea:focus{
        border: none;
    }

    .container-chat {
        overflow-y: scroll;
        height: 240px;
        padding: 0 0 10px 0;
        background-color: burlywood;
    }
    .bottom-chat{
        padding: 2px;
        display: flex;
    }
    .bottom-chat i{
        font-size: 30px;
        padding: 5px;
        margin-left: 10px;
    }
</style>
<div class="chat-icon" id="show-chat"><a href="javascript:void(0)"><i class="fa fa-comments" aria-hidden="true"></i></a></div>
<div class="col-xs-10 col-sm-6 col-md-4 col-lg-4 frame-chat" id="frame-chat">
    <div class="exit-chat">
        <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true" onclick="exitChat()"></i></a>
    </div>
    <div class="chat-content">
        <span>Người dùng ID: <h4 id="User_ID" value_chat_ID=""></h4>
        </span>
        <a href="javascript:void(0)" onclick="startGetMess()"><i class="fa fa-refresh" aria-hidden="true"></i></a>
    </div>
    <div>
        <div class="container-chat" id="message">
            
        </div>
        
    </div>
    <div class="col-lg-12 col-xs-12 col-md-12 col-xl-12 col-sm-12 bottom-chat">
    {{ csrf_field() }}
            <textarea type="text" class="input-text" name="mess-text" id="mess-text"></textarea>
            <a href="javascript:void(0)" id="send-mess"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
        </div>
</div>
@endsection