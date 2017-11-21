<!DOCTYPE html>

@extends('layouts/main')

@section('title')
   Contact Us
@endsection

@section('content')
    {{-- @if (Auth::check())
    hola
    {{exit()}} --}}
        {{-- <script type="text/javascript">
            window.location = "{ url('/login') }";//here double curly bracket
        </script>
    @else  --}}
{{-- @endsection

@section('content') --}}

    <div class="container">

    @if (!empty($success))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $success }}
        </div>
    @endif

    <h2 class="move-up move-right">Contact Support @ ARH Order Portal
        <a href="{{ url('/') }}" class="btn btn-primary btn-md pull-right move-left move-up">&nbsp;&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </h2>

    {{-- <h2 class="move-up">Contact Support @ Graphics + Design</h2> --}}
    <div class="row body-background">
        <div class="row">
        <br>
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default move-down">
        <div class="panel-heading text-center">Need some help with the portal? Have a question about your order? We are here to help!<br>You can contact us by phone, fax, or email, or simply submit the support form below. <br>Phone: 813-254-9444 • Fax: 813-254-9445 • Email: support@arhorderportal.com</div>
        <div class="panel-body">

            {!! Form::open(['data-parsley-validate' => '', 'route' => 'sendContactus', 'method' => 'post']) !!}

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Builder Company #:</span>
                {{ Form::text('loc_num', $user->loc_num, ['class' => 'form-control', 'placeholder' => 'BC#', 'required' => '', 'unique' => '']) }}
            </div>

            <div class="input-group move-down">
                <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Builder Company Name:</span>
                {{ Form::text('loc_name', $user->loc_name, ['class' => 'form-control', 'placeholder' => 'Location Name', 'required' => '', 'unique' => '']) }}
            </div>

            <div class="input-group move-down">
                <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Name:</span>
                {{ Form::text('contactus_name', null, ['class' => 'form-control', 'placeholder' => 'Your Name', 'required' => '']) }}
            </div>

            <div class="input-group move-down">
                <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Email:</span>
                {{ Form::email('contactus_email', null, ['class' => 'form-control', 'placeholder' => 'Your Email', 'required' => '']) }}
            </div>

            <div class="input-group move-down">
                <span class="input-group-addon"><i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Support Subject:</span>
                <div class="checkbox-inline form-control">
                    &nbsp;
                    {{ Form::checkbox('portalSupport', 1, true) }}Portal Support
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{ Form::checkbox('productInfo') }}Product Info
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{ Form::checkbox('other') }}Other
                </div>
            </div>

            <div class="input-group move-down">
                <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Message:</span>     
                {{ Form::textarea('contactMessage', null, ['class' => 'form-control', 'placeholder' => 'Enter your message here (max 200 characters).', 'required' => '', 'maxlength' => '200', 'style' => 'min-width: 100%', 'rows' => '5']) }}
            </div>

            <br>
        {{ Form::submit('Submit your Email to Order Portal Support', ['class' => 'col-md-5 btn btn-success pull-left move-down']) }}
     {{-- <br> --}}
    {!! Form::close() !!}

    {{-- &nbsp; --}}
    <a href="/" class="col-md-5 btn btn-danger pull-right move-down" role="button"> Reject Changes and Return Home </a>

    </div>
                </div>
            </div>
        </div>
    </div>

       {{-- @endif --}}

@endsection