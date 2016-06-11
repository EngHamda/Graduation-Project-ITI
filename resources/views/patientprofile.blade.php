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
    <li><a data-toggle="tab" href="#birth">Births</a></li>
    <li><a data-toggle="tab" href="#congenital">Congenital Difficulties</a></li>
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
                @endforeach
        </ul>
    </div>
    <div id="surgicalhistory" class="tab-pane fade">
        <h3>Surgical History</h3>
        <ul>@foreach($surgicalhistories as $surgicalhistory)
                <li>Date : {{$surgicalhistory->surgicaldate}}</li>
                <li>{{$surgicalhistory->surgicalinformation}}</li>
            @endforeach</ul>
    </div>
    <div id="previousprescriptions" class="tab-pane fade">
        <h3>Previous Prescriptions</h3>
        <ul>@foreach($prescriptions as $prescription)
                <li>Date : {{$prescription->date}}</li>
                <li>{{$prescription->drug}}</li>
                <li>{{$prescription->frequency}}</li>
                <li>{{$prescription->duration}}</li>
            @endforeach</ul>
    </div>
    <div id="allergies" class="tab-pane fade">
        <h3>Allergies</h3>
        <ul>@foreach($allergies as $allergy)
                <li>Date : {{$allergy->allergydate}}</li>
                <li>{{$allergy->allergyinformation}}</li>
            @endforeach</ul>
    </div>
    <div id="accidents" class="tab-pane fade">
        <h3>Injuries & Accidents</h3>
        <ul>@foreach($accidents as $accident)
                <li>Date : {{$accident->accedentdate}}</li>
                <li>{{$accident->accedentinformation}}</li>
            @endforeach</ul>
    </div>
    <div id="needs" class="tab-pane fade">
        <h3>Special Needs</h3>
        <ul>@foreach($specialneeds as $specialneed)

                <li>{{$specialneed->specialneedinformation}}</li>
            @endforeach</ul>
    </div>
    <div id="blood" class="tab-pane fade">
        <h3>Blood Transfusion</h3>
        <ul>@foreach($bloodtransfusions as $bloodtransfusion)

                <li>Date :{{$bloodtransfusion->bloodtransferdate}}</li>
                <li>{{$bloodtransfusion->bloodtransfer}}</li>
            @endforeach</ul>
    </div>
    <div id="family" class="tab-pane fade">
        <h3>Family History</h3>
       <ul>@foreach($familyhistories as $familyhistory)

            <li>{{$familyhistory->familyhistory}}</li>
            @endforeach</ul>
    </div>

    <div id="miscarriage" class="tab-pane fade">
        <h3>Miscarriages</h3>
        <ul>@foreach($miscarriages as $miscarriage)

                <li>{{$miscarriage->miscarriagedate}}</li>
                <li>{{$miscarriage->miscarriage}}</li>
            @endforeach</ul>
    </div>
    <div id="birth" class="tab-pane fade">
        <h3>Births</h3>
        <p>Some content in menu 2.</p>
    </div>
    <div id="congenital" class="tab-pane fade">
        <h3>Congenital Difficulties</h3>
        <p>Some content in menu 2.</p>
    </div>
</div>
    @stop