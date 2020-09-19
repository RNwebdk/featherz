@extends('emails.base-email')


@section('body')
<p>Welcome to acme</p>
<p><a href="{!! $_ENV['BASE_URL'] !!}/verify-account?token={!! $token !!}"></a></p>
@stop