welcome {{auth()->guard('medicalcompany')->user()->id}}
<a href="/medicalcompany/logout">logout</a>


@foreach($requests as $request)
<p>{{$request->physiciandetail->user->name}}<p>
<p>{{$request->advertisementrequstdate}}<p>

@if($request->confirmed==0)
<a href="/medicalcompany/confirmdoctorrequest/{{$request->id}}">confirmrequest</a>
@endif

@if($request->confirmed==1)
<p>confirmed already</p>
@endif


@endforeach
