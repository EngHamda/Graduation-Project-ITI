assistamt home page
<a href="/auth/logout">logout</a>

<a href="/assistant/addnewpatientprofile"> addnewpatient</a>

<a href="/patient/index">show reservation </a>


<form method="POST" action="{{ url('assistant/searchpatientprofile') }}">


<input type="text" name="email"> <input type="hidden" name="_token" value="{{ csrf_token() }}">
<button type="submit" class="btn btn-primary">search by email </button>
 </form>
