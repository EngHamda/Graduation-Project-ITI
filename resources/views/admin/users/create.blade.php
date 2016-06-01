@extends('admin.layouts.master')

@section('content')


    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            <h1>{{ trans('quickadmin::admin.users-create-create_user') }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('
                        <li class="error">:message</li>
                        ')) !!}
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::open(['route' => 'users.store','files' => true,'enctype'=>'multipart/form-data','class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', trans('quickadmin::admin.users-create-name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-create-name_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', trans('quickadmin::admin.users-create-email'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-create-email_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', trans('quickadmin::admin.users-create-password'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-create-password_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Gender', null,['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Birth Date', null,['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('birth_date', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Phone', null, ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('phone',old('phone'), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            {!! Form::label('Address', null, ['class'=>'col-sm-2 control-label']) !!}

            {!! Form::label('Building no.', null, ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('buildingnumber',old('buildingnumber'), ['class'=>'form-control']) !!}
            </div>

            {!! Form::label('Street', null, ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('street',old('street'), ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="row">


            {!! Form::label('City', null, ['class'=>' col-sm-offset-2 col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('city',old('city'), ['class'=>'form-control']) !!}
            </div>




            {!! Form::label('Country', null, ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('country',old('country'), ['class'=>'form-control']) !!}
            </div>

        </div>
    </div>

    <div class="form-group">
        {!! Form::label('profile_picture', 'Profile Picture', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::file('profile_picture',$attributes=['class'=>' btn btn-default']) !!}
            {!! Form::hidden('profile_picture_w', 4096) !!}
            {!! Form::hidden('profile_picture_h', 4096) !!}

        </div>
    </div>

    <p></p>
    <div class="form-group">
        {!! Form::label('role_id', trans('quickadmin::admin.users-create-role'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('role_id', $roles, old('role_id'), ['required','class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group" id="clinic">
        {!! Form::label('clinic_id', 'Clinic', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('clinic_id', $clinics, old('clinic_id'), ['required','class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::admin.users-create-btncreate'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>




    {!! Form::close() !!}

@endsection
