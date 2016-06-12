@extends("layouts.main")
@section('title','Physician Patient Profile')
@section("content")
    <div id="updateMessage" style="display:none;">patient profile Updates</div>
    <div id="successMessage" style="display:none;">Email doesn't Exist</div>
    <div id="errorMessage" style="display:none;">patient profile doexn't Exist</div>

    <label> National ID: </label>
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="patientemail form-control">
        </div>
    </div>

    <form name="input" id="patient_profile_form" method="POST" action="/test"  class="form-group"  >


       <label> Past History: </label>
        <div class="copies">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>

        <div class="line">
            <div class="row">
                <div class="col-md-4">
                    <input id="pasthistory" type="text" name="content" placeholder="past history"   class="form-control" />
                    </div>
                <div class="col-md-4">
            <input id="pasthistorydate" type="text" name="date" placeholder="past history date" class="form-control"/>
                    </div>
                <div class="col-md-4">
            <input type="button" value="add past history" id="add" class="btn btn-info btn-block" />
                    </div>
        </div>
        </div>



        <label>surgicalhistory:</label>
        <div class="copiesofsurgicalhistory"></div>
        <div class="lineofsurgicalhistory">
            <div class="row">
                <div class="col-md-4">
            <input id="surgicalhistory" type="text" name="content" placeholder="surgical history" class="form-control"/>
                    </div>
                    <div class="col-md-4">
            <input id="surgicalhistorydate" type="text" name="date" placeholder="surgical history date" class="form-control"/>
                       </div>
                        <div class="col-md-4">
            <input type="button" value="add surgical" id="addsurgical" class="btn btn-info btn-block" />
                            </div>
                </div>
        </div>




        <label>Allergies:</label>
        <div class="copiesofallergies"></div>
        <div class="lineofallergies">
            <div class="row">
                <div class="col-md-4">
            <input id="allergies" type="text" name="content" placeholder="allergies" class="form-control"/>
                    </div>
                    <div class="col-md-4">
            <input id="allergiesdate" type="text" name="date" placeholder="allergies date" class="form-control"/>
                        </div>
                        <div class="col-md-4">
            <input type="button" value="add allergies" id="addallergies" class="btn btn-info btn-block" />
                            </div>
        </div>
            </div>



        <label>Accident and Injuries:</label>
        <div class="copiesofaccedent"></div>
        <div class="lineofaccedent">
            <div class="row">
                <div class="col-md-4">
            <input id="accedent" type="text" name="content" placeholder="accident" class="form-control"/>
                    </div>
                <div class="col-md-4">
            <input id="accedentdate" type="text" name="date" placeholder="accedent date" class="form-control"/>
                    </div>
                <div class="col-md-4">
            <input type="button" value="add accident" id="addaccedent" class="btn btn-info btn-block" />
                    </div>
        </div>
                    </div>




        <label>Special Needs:</label>
        <div class="copiesofspecialneeds"></div>
        <div class="lineofspecialneeds">
            <div class="row">
                <div class="col-md-8">
            <input id="specialneeds" type="text" name="content" placeholder="special needs" class="form-control"/>
                    </div>
                    <div class="col-md-4">
            <input type="button" value="special needs" id="addspecialneeds" class="btn btn-info btn-block" />
                        </div>
        </div>
            </div>





        <label>Family History:</label>
        <div class="copiesoffamilyhistory"></div>
        <div class="lineoffamilyhistory">
            <div class="row">
                <div class="col-md-8">
            <input id="familyhistory" type="text" name="content" placeholder="family history" class="form-control"/>
                    </div>
                    <div class="col-md-4">
            <input type="button" value="family history" id="addfamilyhistory" class="btn btn-info btn-block" />
                        </div>
            </div>
</div>





       <label> Blood Transfer:</label>
        <div class="copiesofbloodtransfer"></div>
        <div class="lineofbloodtransfer">
            <div class="row">
                <div class="col-md-4">
            <input id="bloodtransfer" type="text" name="content" placeholder="blood transfer" class="form-control"/>
                    </div>
                    <div class="col-md-4">
            <input id="bloodtransferdate" type="text" name="date" placeholder="blood transfer" class="form-control"/>
                        </div>
                        <div class="col-md-4">
            <input type="button" value="blood transfer" id="addbloodtransfer" class="btn btn-info btn-block" />
                            </div>
        </div>
            </div>







        <label>Miscarriage:</label>
        <div class="copiesofmis"></div>
        <div class="lineofmis">
            <div class="row">
                <div class="col-md-4">
            <input id="mis" type="text" name="content" placeholder="miscarriage" class="form-control"/>
                    </div>
                    <div class="col-md-4">
            <input id="misdate" type="text" name="date" placeholder="miscarriage date" class="form-control"/>
                        </div>
                        <div class="col-md-4">
            <input type="button" value="miscarriage" id="addmis" class="btn btn-info btn-block" />
                            </div>
        </div>
            </div>

        <div style="margin-top: 50px"></div>
        <div class="jumbotron">
            presciption

            <div class="copiesofp"></div>
            <div class="lineofp">

                <div class="row">
                <div class="col-md-2">
                <input  id="date" type="text" name="drug" placeholder="Date" class="form-control"/>
                    </div>
                    <div class="col-md-2">
                <input id="drug" type="text" name="date" placeholder="Drug" class="form-control"/>
                        </div>

                        <div class="col-md-2">
                <select name="frequency" id="freq" class="form-control">
                    <option value="one">one</option>
                    <option value="twice">twice</option>
                    <option value="three times">three times</option>

                </select>
                            </div>

                            <div class="col-md-2">

                <select name="duration" id="duration" class="form-control">
                    <option value="every year">every year</option>
                    <option value="every mounth">every mounth</option>
                    <option value="every week">every week</option>
                    <option value="every day">every day</option>
                    <option value="everyhour">everyhour</option>
                </select>
                                </div>
                                <div class="col-md-2">

                <input type="button" value="add prescription" id="addp" class="btn btn-info btn-block" />
                                    </div>

            </div>


</div>
        </div>
    </form>
    <button onclick="send()" class="btn btn-block btn-success">Submit</button>
    <div style="margin-top: 50px"></div>

@stop
<script>

    var token = '{{Session::token()}}';

</script>






