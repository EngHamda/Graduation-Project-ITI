@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            <h1>{{ trans('quickadmin::admin.users-edit-edit_user') }}</h1>

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

    {!! Form::open(['route' => ['users.update', $user->id], 'class' => 'form-horizontal','files' => true,'method' => 'PATCH']) !!}

    <div class="form-group">
        {!! Form::label('name', trans('quickadmin::admin.users-edit-name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name', $user->name), ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-edit-name_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', trans('quickadmin::admin.users-edit-email'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('email', old('email', $user->email), ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-edit-email_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', trans('quickadmin::admin.users-edit-password'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-edit-password_placeholder')]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Gender', null,['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'),old('gender',$user->gender), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Birth Date', null,['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('birth_date', old('birth_date',$user->birth_date), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Phone', null, ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('phone',old('phone',$user->phone), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            {!! Form::label('Address', null, ['class'=>'col-sm-2 control-label']) !!}

            {!! Form::label('Building no.', null, ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('buildingnumber',old('buildingnumber',$user->buildingnumber), ['class'=>'form-control']) !!}
            </div>

            {!! Form::label('Street', null, ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('street',old('street',$user->street), ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="row">

            {!! Form::label('City', null, ['class'=>' col-sm-offset-2 col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('city',old('city',$user->city), ['class'=>'form-control']) !!}
            </div>

            {!! Form::label('Governorate', null, ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::text('country',old('country',$user->country), ['class'=>'form-control']) !!}
            </div>

        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Profile Picture', null, ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!!Form::file('profile_picture', ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('role_id', trans('quickadmin::admin.users-edit-role'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('role_id', $roles, old('role_id', $user->role_id), ['class'=>'form-control']) !!}
        </div>
    </div>

    @if($user->role_id==4)

    <div class="form-group" id="clinic">
        {!! Form::label('clinic_id', 'Clinic', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('clinic_id', $clinics, old('clinic_id',$physician->clinic_id), ['required','class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group" id="physpeciality">
        {!! Form::label('speciality_id', 'Speciality', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('speciality_id', $specialities, old('speciality_id',$physician->speciality_id), ['required','class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group" id="phytitle">
        {!! Form::label('title', null, ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('title',old('title',$physician->title), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group" id="phycertificates">
        {!! Form::label('certification', null, ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('certification',old('certification',$physician->certification), ['class'=>'form-control']) !!}
        </div>
    </div>



    @elseif($user->role_id==3)
        <div class="form-group" id="clinic">
            {!! Form::label('clinic_id', 'Clinic', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('clinic_id', $clinics, old('clinic_id',$assistant->clinic_id), ['required','class'=>'form-control']) !!}
            </div>
        </div>
    @endif
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::admin.users-edit-btnupdate'), ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection

