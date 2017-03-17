@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">修改使用者 {{ $user->name }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/user/upadte/{{ $user->id }}">
                        <input type="hidden" name="_method" value="Put">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('superuser') ? ' has-error' : '' }}">
                            <label for="superuser" class="col-md-4 control-label">superuser</label>

                            <div class="col-md-6">

                                @if ($user->superuser==1)
                                <input id="superuser" type="checkbox" class="form-control" name="superuser" value="{{ $user->superuser }}" checked>
                                @else
                                <input id="superuser" type="checkbox" class="form-control" name="superuser" value="{{ $user->superuser }}">
                                @endif

                                @if ($errors->has('superuser'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('superuser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
