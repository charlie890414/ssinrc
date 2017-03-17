@extends('layouts/app')

@section('script')
<script>
var post_id = {{ $id }};
$(function(){
    $.getJSON('/api/post/'+post_id ,function(data){
        $('#title').html(data.title);
        $('#body').html(data.text);
        $('#body').append('<hr>'+data.created_at);
    });
});
</script>
@endsection

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading" id="title"></div>

            <div class="panel-body" id="body">
            </div>
        </div>
    </div>
</div>
@endsection
