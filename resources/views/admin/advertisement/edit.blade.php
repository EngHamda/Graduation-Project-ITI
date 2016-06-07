@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($advertisement, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin.advertisement.update', $advertisement->id))) !!}

{{--<div class="form-group">--}}
    {{--{!! Form::label('name', 'Name', array('class'=>'col-sm-2 control-label')) !!}--}}
    {{--<div class="col-sm-10">--}}
        {{--{!! Form::text('name', old('name',$advertisement->name), array('class'=>'form-control')) !!}--}}
        {{----}}
    {{--</div>--}}
{{--</div><div class="form-group">--}}
    {{--{!! Form::label('path', 'Path', array('class'=>'col-sm-2 control-label')) !!}--}}
    {{--<div class="col-sm-10">--}}
        {{--{!! Form::text('path', old('path',$advertisement->path), array('class'=>'form-control')) !!}--}}
        {{----}}
    {{--</div>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--{!! Form::label('Paying Status', 'Advertisement', ['class'=>'col-sm-2 control-label']) !!}--}}
{{--<div class="col-sm-10">--}}
    {{--{!!  Form::select('advertisement_id', array('0' => 'NotPaid', '1' => 'Paid'),old('advertisement_id'), ['required','class'=>'form-control']) !!}--}}
{{--</div>--}}
{{--</div>--}}

<div class="form-group row">
    {!! Form::label('Paying Status', 'Paying Status'
            ,array('class'=>'col-sm-3 control-label'))!!}
    <div class="col-sm-9">

            <label class="col-sm-6 ">

                {{ Form::radio('is_paid', 0) }} NotPaid<br>
                {{ Form::radio('is_paid', 1) }} Paid
            </label>

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route('admin.advertisement.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection