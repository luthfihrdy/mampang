@extends('layouts.app')

@section('content')

<style>
html,
body,
div,
span,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
code,
del,
dfn,
em,
img,
q,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
dialog,
figure,
footer,
header,
hgroup,
nav,
section {
    margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline;
    text-decoration: none;
    list-style: none;
}
.anim04c {
    -webkit-transition: all .4s cubic-bezier(.5, .35, .15, 1.4);
    transition: all .4s cubic-bezier(.5, .35, .15, 1.4);
}

html,
body {
    overflow-x: hidden;
    overflow-y: auto;
}
/*-----*/

.outer {
    position: relative;
    top: 50%;
    z-index: 1;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
}
/*-----*/

.signboard {
    width: 100px;
    height: 100px;
    margin: auto;
    color: #7265e3;
    border-radius: 10px;
}
/*-----*/

.front {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 3;
    background: #7265e3;
    text-align: center;
}
.right {
    position: absolute;
    right: : 0;
    z-index: 2;
    -webkit-transform: rotate(-10deg) translate(7px, 8px);
    -moz-transform: rotate(-10deg) translate(7px, 8px);
    -ms-transform: rotate(-10deg) translate(7px, 8px);
    -o-transform: rotate(-10deg) translate(7px, 8px);
    transform: rotate(-10deg) translate(7px, 8px);
}
.left {
    position: absolute;
    left: 0;
    z-index: 1;
    -webkit-transform: rotate(5deg) translate(-4px, 4px);
    -moz-transform: rotate(5deg) translate(-4px, 4px);
    -ms-transform: rotate(5deg) translate(-4px, 4px);
    -o-transform: rotate(5deg) translate(-4px, 4px);
    transform: rotate(5deg) translate(-4px, 4px);
}
/*-----*/

.outer:hover .inner {
    -webkit-transform: rotate(0) translate(0);
    -moz-transform: rotate(0) translate(0);
    -ms-transform: rotate(0) translate(0);
    -o-transform: rotate(0) translate(0);
    transform: rotate(0) translate(0);
}
/*-----*/

.designer a:hover:after {
    color: #2ecc71;
}

body:hover .info,
body:hover .designer {
    opacity: 1;
}

.outer:active .inner {
    -webkit-transform: rotate(0) translate(0) scale(0.9);
    -moz-transform: rotate(0) translate(0) scale(0.9);
    -ms-transform: rotate(0) translate(0) scale(0.9);
    -o-transform: rotate(0) translate(0) scale(0.9);
    transform: rotate(0) translate(0) scale(0.9);
}
.outer:active .front .date {
    -webkit-transform: scale(2);
}
.outer:active .front .day,
.outer:active .front .month {
    visibility: hidden;
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
}
.outer:active .right {
    -webkit-transform: rotate(-5deg) translateX(80px) scale(0.9);
    -moz-transform: rotate(-5deg) translateX(80px) scale(0.9);
    -ms-transform: rotate(-5deg) translateX(80px) scale(0.9);
    -o-transform: rotate(-5deg) translateX(80px) scale(0.9);
    transform: rotate(-5deg) translateX(80px) scale(0.9);
}
.outer:active .left {
    -webkit-transform: rotate(5deg) translateX(-80px) scale(0.9);
    -moz-transform: rotate(5deg) translateX(-80px) scale(0.9);
    -ms-transform: rotate(5deg) translateX(-80px) scale(0.9);
    -o-transform: rotate(5deg) translateX(-80px) scale(0.9);
    transform: rotate(5deg) translateX(-80px) scale(0.9);
}
/*-----*/

.outer:active .calendarMain {
    -webkit-transform: scale(1.8);
    opacity: 0;
    visibility: hidden;
}
.outer:active .clock {
    -webkit-transform: scale(1.4);
    opacity: 1;
    visibility: visible;
}
.outer:active .calendarNormal {
    bottom: -30px;
    opacity: 1;
    visibility: visible;
}
.outer:active .year {
    top: -30px;
    opacity: 1;
    visibility: visible;
    letter-spacing: 3px;
}
/*-----*/

.calendarMain {
    width: 100%;
    height: 100%;
    position: absolute;
    opacity: 1;
}
.month,
.day {
    font-size: 10px;
    line-height: 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 3px;
}
.date {
    font-size: 40px;
    line-height: 40px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 3px;
}
/*-----*/

.clock {
    width: 100%;
    height: 100%;
    position: absolute;
    font-size: 40px;
    line-height: 100px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-align: center;
    opacity: 0;
    visibility: hidden;
}
/*-----*/

.year {
    width: 100%;
    position: absolute;
    top: 0;
    font-size: 14px;
    line-height: 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0;
    text-align: center;
    opacity: 0;
    visibility: hidden;
    color: #ffff;
}

.calendarNormal {
    width: 100%;
    position: absolute;
    bottom: 0;
    font-size: 14px;
    line-height: 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-align: center;
    opacity: 0;
    visibility: hidden;
}
.date2 {
    color: #ffff;
}
.day2 {
    color: #ffff;
}
.month2 {
    color: #ffff;
}
/* -- usable codes end -- */

/* -- unusable codes (text, logo, etc.) -- */

.info {
    width: 100%;
    height: 25%;
    position: absolute;
    top: 15%;
    text-align: center;
    opacity: 0;
}
.info li {
    width: 100%;
}
.click,
.yeaa {
    font-size: 14px;
    line-height: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    bottom: 0;
    opacity: 1;
}
.dribbble {
    position: absolute;
    top: -60px;
    font-size: 14px;
    opacity: 0;
}
em {
    color: #ed4988;
}
.designer {
    width: 100%;
    height: 50%;
    position: absolute;
    bottom: 0;
    text-align: center;
    opacity: 0;
}
.designer li {
    width: 100%;
    position: absolute;
    bottom: 30%;
}
.designer a {
    width: 30px;
    height: 30px;
    display: block;
    position: relative;
    border-radius: 100%;
    margin: auto;
}
.designer a:after {
    content: "see designs";
    position: absolute;
    top: 0;
    left: 40px;
    font-size: 14px;
    line-height: 33px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    white-space: nowrap;
}

.designer img {
    display: block;
    border-radius: 100%;
}
::selection {
    background: transparent;
}
::-moz-selection {
    background: transparent;
}

</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card bg-info rounded">
              <div class="row card-body" style="max-height: 50vh;">
                 <div class="col-sm-6">
                    <h5 class="card-title"></h5>
                    <br/>
                    <p class="card-text"><h2>Good Day,   
                    {{-- Ambil nama depan --}}
                    @php
                    $name = Auth::user()->name;
                    $name = explode(" ", $name);
                    @endphp {{ $name[0] }} </h2></p>
                    <p class="card-text">Have a nice day!</p>
                    <br/>
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                  <div class="info anim04c">
                    <li class="dribbble anim04c">
                    </li>
                </div>
                    <!-- main codes start -->
                    <div class="signboard outer">
                        <div class="signboard front inner anim04c" style="color: #ffff;">
                            <li class="year anim04c">
                                <span></span>
                            </li>
                            <ul class="calendarMain anim04c">
                                <li class="month anim04c">
                                    <span></span>
                                </li>
                                <li class="date anim04c">
                                    <span></span>
                                </li>
                                <li class="day anim04c">
                                    <span></span>
                                </li>
                            </ul>
                            <li class="clock minute anim04c">
                                <span></span>
                            </li>
                            <li class="calendarNormal date2 anim04c">
                                <span></span>
                            </li>
                        </div>
                        <div class="signboard left inner anim04c" style="background: #ffff;">
                            <li class="clock hour anim04c">
                                <span></span>
                            </li>
                            <li class="calendarNormal day2 anim04c">
                                <span></span>
                            </li>
                        </div>
                        <div class="signboard right inner anim04c" style="background: #ffff;">
                            <li class="clock second anim04c">
                                <span></span>
                            </li>
                            <li class="calendarNormal month2 anim04c">
                                <span></span>
                            </li>
                        </div>
                    </div>
                    <!-- main codes end -->
                  </div>
              </div>
          </div>
        </div>
      </div><!-- end row -->

      <!--row -->
      {{-- <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card bg-info rounded h-100">
            <div class="row card-body">
              <div class="col-6 col-sm-6">
                <h5 class="card-title">
                  <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_0bmj3a09.json"  background="transparent"  speed="1"  style="width: 130px; height: 130px;"  loop  autoplay></lottie-player>
                </h5>
              </div>
              <div class="col-6 col-sm-6">
                <h2 class="py-3">Birthday Today!</h2>
              </div>
            </div>
            <div class="card-body">
              None.
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-info rounded h-100">
            <div class="row card-body">
              <div class="col-6 col-sm-6">
                <h5 class="card-title">
                  <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_x9h8ar8l.json"  background="transparent"  speed="1"  style="width: 130px; height: 130px;"  loop autoplay></lottie-player>
                </h5>
              </div>
              <div class="col-6 col-sm-6">
                <h2 class="py-3">Cuti</h2>
              </div>
            </div>
            <div class="card-body">
              None.
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-info rounded h-100">
            <div class="row card-body">
              <div class="col-6 col-sm-6">
                <h5 class="card-title">
                  <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_ljneldhs.json"  background="transparent"  speed="1"  style="width: 150px; height: 150px;"  loop  autoplay></lottie-player>
                </h5>
              </div>
              <div class="col-6 col-sm-6">
                <h2 class="py-3">Sakit / Ijin</h2>
              </div>
            </div>
            <div class="card-body">
              None.
            </div>
          </div>
        </div>
      </div><!--end row--> --}}
      {{-- skp
      <div class="row">
        <div class="col-sm-12">
          <div class="card bg-info rounded">
              <div class="row card-body ">
                 <div class="col-sm-4">
                    <h5 class="card-title"></h5>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_nm1huacl.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                  </div>
                  <div class="col-sm-4">
                    <p class="card-text"><h3>STR </p>
                  </div>
                  <div class="col-sm-4">
                    <p class="card-text"><h3>SIP </p>
                  </div>
              </div>
          </div>
        </div>
      </div> --}}
      {{-- end row --}}
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Logged in as Pegawai') }}
                </div>
            </div>
            <!-- /.card -->
        </div>
      </div>
      <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
$(document).ready(function () {

var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= [ "Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday" ];

var newDate = new Date();
newDate.setDate(newDate.getDate());
	
setInterval( function() {
	var hours = new Date().getHours();
	$(".hour").html(( hours < 10 ? "0" : "" ) + hours);
    var seconds = new Date().getSeconds();
	$(".second").html(( seconds < 10 ? "0" : "" ) + seconds);
    var minutes = new Date().getMinutes();
	$(".minute").html(( minutes < 10 ? "0" : "" ) + minutes);
    
    $(".month span,.month2 span").text(monthNames[newDate.getMonth()]);
    $(".date span,.date2 span").text(newDate.getDate());
    $(".day span,.day2 span").text(dayNames[newDate.getDay()]);
    $(".year span").html(newDate.getFullYear());
}, 1000);	



$(".outer").on({
    mousedown:function(){
        $(".dribbble").css("opacity","1");
    },
    mouseup:function(){
        $(".dribbble").css("opacity","0");
    }
});



});
</script>

@endsection
