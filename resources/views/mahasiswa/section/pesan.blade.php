@extends('mahasiswa.home')
@section('main')
<style type="text/css" media="screen">
.chat {
  margin: 0;
  padding: 0;
  list-style: none;
}
.panel .slidedown .glyphicon,
.chat .glyphicon {
  margin-right: 5px;
}
.chat-panel .panel-body {
  height: 450px;
  background-color: #dfdfdf;
  overflow-y: scroll;
}
.msg_a {

       margin-top: 10px;

       margin-right: 20px;

       min-height: 20px;

       padding: 15px;

       background: red;

       margin-left: 20px;

       position: relative;

       border-radius: 5px;

       }



       .msg_a:before {

       content: "";

       position: absolute;

       width: 0px;

       height: 0px;

       top: 7px;

       left: -30px;

       border: 15px solid;

       border-color: transparent red transparent transparent;

       }



       .msg_b {

       margin-top: 10px;

       width: auto;

       margin-right: 20px;

       min-height: 20px;

       padding: 15px;

       background: #ffff99;

       margin-left: 20px;

       position: relative;

       border-radius: 5px;

       color: black;

       }



       .msg_b:before {

       content: "";

       position: absolute;

       width: 0px;

       height: 0px;

       top: 7px;

       right: -30px;

       border: 15px solid;

       border-color: transparent transparent transparent green;

       }
       .msg_input {

       border-color: transparent;

       border-top: 1px solid silver;

       width: 100%;

       box-sizing: border-box;

       -webkit-box-sizing: border-box;

       -moz-box-sizing: border-box;

       }
</style>

<div class="w3-col m12">
<div class="container-fluid">
<div class="chat-panel panel panel-success w3-blue w3-padding w3-round">
  <div class="panel-heading">
        <i class="fa fa-comments fa-fw"></i> Chat 
<div class="panel-body" id="panel-body ">
<br>
</div>
<div class="panel-footer" style="background-color:#dfdfdf">
<form method="post" action="{{url('/homemahasiswa/pesan')}}">
  {{csrf_field()}}
<textarea rows="1" name="isi" class="msg_input" placeholder="Press Enter to send Message" ></textarea>
<input type="hidden" name="id_user" value="{{$id_user1}}">
<div align="right">
  <button type="submit" id="btn" class="w3-button w3-round-xlarge w3-indigo">kirim</button>
</div>
   </form>
</div>
</div>
</div>
</div>
@endsection