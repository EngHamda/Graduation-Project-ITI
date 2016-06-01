welcome {{auth()->guard('medicalcompany')->user()->name}}
<a href="/medicalcompany/logout">logout</a>

<div>
@foreach($requests as $request)
<p>{{$request->user->name}}<p>
<p>{{$request->advertisementrequstdate}}<p>

@if($request->isconfirmed==0)
<a href="/medicalcompany/confirmdoctorrequest/{{$request->id}}">confirmrequest</a>
@endif

@if($request->isconfirmed==1)
<p>confirmed already</p>
@endif


@endforeach
<div>

<div>

upload advertisement



<br>
<form method="POST" action="{{ url('/medicalcompany/storead') }}" enctype="multipart/form-data">

<input type="file" name="path">
<br>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<br>
<input type="hidden" name="medicalcompany_id" value="{{auth()->guard('medicalcompany')->user()->id}}"  >

 name:<input type="text" name="name" >

<button type="submit" class="btn btn-primary"> submit</button>
 </form>










<div>
