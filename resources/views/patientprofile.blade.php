@extends('layouts.main')

@section('content')

    <div style="margin-top: 50px;"></div>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#basicinfo">Basic information</a></li>
    <li><a data-toggle="tab" href="#pasthistory">Past History</a></li>
    <li><a data-toggle="tab" href="#surgicalhistory">Surgical History</a></li>
    <li><a data-toggle="tab" href="#previousprescriptions">Previous Prescriptions</a></li>
    <li><a data-toggle="tab" href="#allergies">Allergies</a></li>
    <li><a data-toggle="tab" href="#accidents">Injuries & Accidents</a></li>
    <li><a data-toggle="tab" href="#needs">Special Needs</a></li>
    <li><a data-toggle="tab" href="#blood">Blood Transfusion</a></li>
    <li><a data-toggle="tab" href="#family">Family History</a></li>
    <li><a data-toggle="tab" href="#miscarriage">Miscarriages</a></li>
    <li><a data-toggle="tab" href="#prescription">Prescription</a></li>
</ul>

<div class="tab-content">
    <div id="basicinfo" class="tab-pane fade in active">
        <h3>Basic information</h3>
        <ul>
                <li>Name :{{$user->name}}</li>
                <li>Birth Date :{{$user->birth_date}}</li>
                <li>Gender :{{$user->gender}}</li>
                <li>Phone :{{$user->phone}}</li>
                <li>Building Number :{{$user->buildingnumber}}</li>
                 <li>Street :{{$user->street}}</li>
                <li>city :{{$user->city}}</li>
                 <li>Country :{{$user->country}}</li>

                <li>Weight :{{$basicinfos->patientweight}}</li>
                <li>Height :{{$basicinfos->patientheight}}</li>
                <li>Blood Group :{{$basicinfos->patientbloodgroup}} </li>
                <li>Emergency Phone :{{$basicinfos->patientemergencyphone}} </li>
                <li>Nationality :{{$basicinfos->patientnationality}} </li>
                <li>National ID :{{$basicinfos->patientnationalid}} </li>

        </ul>
    </div>
    <div id="pasthistory" class="tab-pane fade">
        <h3>Past History</h3>
        <ul>@foreach($pasthistories as $pasthistory)
           <li>Date : {{$pasthistory->pasthistorydate}}</li>
                <li>{{$pasthistory->historyinformation}}</li>
                <hr>
                @endforeach
        </ul>
    </div>
    <div id="surgicalhistory" class="tab-pane fade">
        <h3>Surgical History</h3>
        <ul>@foreach($surgicalhistories as $surgicalhistory)
                <li>Date : {{$surgicalhistory->surgicaldate}}</li>
                <li>{{$surgicalhistory->surgicalinformation}}</li>
                <hr>
            @endforeach</ul>
    </div>
    <div id="previousprescriptions" class="tab-pane fade">
        <h3>Previous Prescriptions</h3>
        <ul>@foreach($prescriptions as $prescription)
                <li>Date : {{$prescription->date}}</li>
                <li>Drug :{{$prescription->drug}}</li>
                <li>Frequency :{{$prescription->frequency}} {{$prescription->duration}}</li>
                <hr>
            @endforeach</ul>
    </div>
    <div id="allergies" class="tab-pane fade">
        <h3>Allergies</h3>
        <ul>@foreach($allergies as $allergy)
                <li>Date : {{$allergy->allergydate}}</li>
                <li>{{$allergy->allergyinformation}}</li>
                <hr>
            @endforeach</ul>
    </div>
    <div id="accidents" class="tab-pane fade">
        <h3>Injuries & Accidents</h3>
        <ul>@foreach($accidents as $accident)
                <li>Date : {{$accident->accedentdate}}</li>
                <li>{{$accident->accedentinformation}}</li>
                <hr>
            @endforeach</ul>
    </div>
    <div id="needs" class="tab-pane fade">
        <h3>Special Needs</h3>
        <ul>@foreach($specialneeds as $specialneed)

                <li>{{$specialneed->specialneedinformation}}</li>
                <hr>
            @endforeach</ul>
    </div>
    <div id="blood" class="tab-pane fade">
        <h3>Blood Transfusion</h3>
        <ul>@foreach($bloodtransfusions as $bloodtransfusion)

                <li>Date :{{$bloodtransfusion->bloodtransferdate}}</li>
                <li>{{$bloodtransfusion->bloodtransfer}}</li>
                <hr>
            @endforeach</ul>
    </div>
    <div id="family" class="tab-pane fade">
        <h3>Family History</h3>
       <ul>@foreach($familyhistories as $familyhistory)

            <li>{{$familyhistory->familyhistory}}</li>
               <hr>
            @endforeach</ul>
    </div>

    <div id="miscarriage" class="tab-pane fade">
        <h3>Miscarriages</h3>
        <ul>@foreach($miscarriages as $miscarriage)

                <li>{{$miscarriage->miscarriagedate}}</li>
                <li>{{$miscarriage->miscarriage}}</li>
                <hr>
            @endforeach</ul>
    </div>
  <div style="margin-top: 50px"></div>
    <div id="prescription" class="tab-pane fade">
        <form id="patient_profile_form" class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="copiesofp"></div>
        <div class="lineofp">
            <div class="row">
                <div class="col-md-2">
            <input  id="date" type="text" name="date" placeholder="Date" class="form-control"/>
                    </div>
                <div class="col-md-2">
            <input id="drug" type="text" name="drug" placeholder="Drug" class="form-control"/>
                    </div>

                <div class="col-md-2">


            <select name="frequency" id="freq" class="form-control">
                <option value="Once Per Week">Once Per Week</option>
                <option value="Every Three Days">Every Three Days</option>
                <option value="Every Other Day">Every Other Day</option>
                <option value="Once Daily">Once Daily</option>
                <option value="Twice Daily">Twice Daily</option>
                <option value="Three Times Per Day">Three Times Per Day</option>
                <option value="Every Two Hours">Every Two Hours</option>

            </select>
                    </div>
                <div class="col-md-2">

            <select name="duration" id="duration" class="form-control">
                <option value="Year">Year</option>
                <option value="Month">Month</option>
                <option value="Two Weeks">Two Weeks</option>
                <option value="Week">Week</option>
                <option value="Five Days">Five Days</option>
                <option value="Three Days">Three Days</option>
                <option value="Day">Day</option>
            </select>
                    </div>
               <div class="col-md-2">

            <input type="button" value="addprescription" id="addp" class="btn btn-info" />
                   </div>

        </div>
            </div>
        </form>
        <article  data-basicinfos_id="{{$basicinfos->id}}">
        <input type="submit" id="prescription_add" value="Add" class="btn btn-success">
        </article>
        <div id="successpres" style="display:none;">Added prescription</div>
</div>
    </div>
    @stop

<script>

    var token = '{{Session::token()}}';

</script>
