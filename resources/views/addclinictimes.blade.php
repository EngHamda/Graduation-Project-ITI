


<form>











</form>











@foreach($clinicsname as $clinic)

<li>{{$clinic->name}}</li>


@endforeach



@foreach($physiciannames as $physician)

<li>{{$physician->name}}</li>
@endforeach
