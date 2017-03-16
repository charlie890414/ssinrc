@extends('layouts/app')

@section('script')
<script>
$(function(){
    $.getJSON('/api/post',function(data){
        for(var index in data){
            var obj = data[index];
            $('tbody').append('<tr><td>' + obj.id + '</td><td><a href="/post/'+ obj.id +'">' + obj.title + '</a></td></tr>');
        }
    });
});
</script>
@endsection


@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>文章列表</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                </tr>
            </thead>
            <tbody id='tbody'>

            </tbody>
        </table>
    </div>
</div>
@endsection
