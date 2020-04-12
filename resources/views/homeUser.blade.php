@extends('template')
@section('title','Pornhub of VietNamese')
@section('loginOrNot')
<div class="headerBar-right">
    <a href="#loginForm" class="headerBar-login">Welcome {{$userName }}</a>
    <a href="#"><button class="btn btn-primary searchColor">Đăng bán</button></a>
</div>
</div>
</div>
<div class="headerBar-nav">
    <div class="pageWidth">
        <div class="headerBar-navInner">
            <div class="dropdown Popup">
                <span class="dropbtn">Danh mục sản phẩm</span>
                <ul type="none" class="dropdown-content">
                    <li id="li1"><a href="#">Link 1</a>
                        <ul type="none" class="dropright-content">
                            <li><a href="#">Link 1.1</a></li>
                            <li><a href="#">Link 1.2</a></li>
                            <li><a href="#">Link 1.3</a></li>
                        </ul>
                    </li>
                    <li id="li2"><a href="#">Link 2</a>
                        <ul type="none" class="dropright-content">
                            <li><a href="#">Link 2.1</a></li>
                            <li><a href="#">Link 2.2</a></li>
                            <li><a href="#">Link 2.3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        @endsection