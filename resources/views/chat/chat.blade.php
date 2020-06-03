<script src="js/chat.js"></script>
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
    }
    .chat-content h1,h2{
        margin: 10px
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
        <h1>Hãy gửi phản hồi của bạn</h1>
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