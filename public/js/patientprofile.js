var patientemailarray=[];
var pasthistoryassociativearray = {};
var pasthistorydateassociativearray = {};
var patientemailassociativearray= {};
var container = $('.copies'),
  value_src = $('#pasthistory');
var count=1;
var value_src2 = $('#pasthistorydate');
var containerofsurgical = $('.copiesofsurgicalhistory'),
  value_src_surgical = $('#surgicalhistory');
var count_surgical=1;
var value_src2_surgical = $('#surgicalhistorydate');
var surgicalhistoryassociativearray= {};
var surgicalhistorydateassociativearray={};
var containerofallergies = $('.copiesofallergies'),
  value_src_allergies = $('#allergies');
var count_allergies=1;
var value_src2_allergies= $('#allergiesdate');
var allergiesassociativearray= {};
var allergiesdateassociativearray={};
var containerofaccedent = $('.copiesofaccedent'),
  value_src_accedent = $('#accedent');
var count_accedent=1;
var value_src2_accedent= $('#accedentdate');
var accedentassociativearray= {};
var accedentdateassociativearray={};
var containerofspecialneeds = $('.copiesofspecialneeds'),
  value_src_specialneeds = $('#specialneeds');
var count_specialneeds=1;
var specialneedsassociativearray= {};
var containeroffamilyhistory = $('.copiesoffamilyhistory'),
  value_src_familyhistory = $('#familyhistory');
var count_familyhistory=1;
var familyhistoryassociativearray= {};
var containerofbloodtransfer = $('.copiesofbloodtransfer'),
  value_src_bloodtransfer = $('#bloodtransfer');
var count_bloodtransfer=1;
var value_src2_bloodtransfer= $('#bloodtransferdate');
var bloodtransferassociativearray= {};
var bloodtransferdateassociativearray={};

var containerofmis = $('.copiesofmis'),
  value_src_mis = $('#mis');
var count_mis=1;
var value_src2_mis= $('#misdate');
var misassociativearray= {};
var misdateassociativearray={};



var containerofbirth = $('.copiesofbirth'),
  value_src_birth = $('#birth');
var count_birth=1;
var value_src2_birth=$('#birthdate') ;
var birthassociativearray= {};
var birthdateassociativearray={};












$("#check").change(function() {
    if(this.checked) {
      alert("hi");
    }
});




















function send() {


patientemailarray[0]=$(".patientemail").val();
patientemailassociativearray[0] = patientemailarray[0];
pasthistoryassociativearray[0]=$("#pasthistory").val();
pasthistorydateassociativearray[0]=$("#pasthistorydate").val();
surgicalhistoryassociativearray[0]=$("#surgicalhistory").val()  ;
surgicalhistorydateassociativearray[0]=$("#surgicalhistorydate").val()   ;
allergiesassociativearray[0]=$("#allergies").val()  ;
allergiesdateassociativearray[0]=$("#allergiesdate").val()   ;

accedentassociativearray[0]=$("#accedent").val()  ;
accedentdateassociativearray[0]=$("#accedentdate").val()   ;
specialneedsassociativearray[0]=$("#specialneeds").val()  ;
familyhistoryassociativearray[0]=$("#familyhistory").val()  ;

bloodtransferassociativearray[0]=$("#bloodtransfer").val()  ;
bloodtransferdateassociativearray[0]=$("#bloodtransferdate").val()   ;
misassociativearray[0]=$("#mis").val()  ;
misdateassociativearray[0]=$("#misdate").val()   ;
birthassociativearray[0]=$("#birth").val()  ;
birthdateassociativearray[0]=$("#birthdate").val()   ;
for(var i=1;i<count;i++)
{
var valueofpasthistory= $('#id' + i).val() ;
var valueofpasthistorydate=$('#uu' + i).val() ;
pasthistoryassociativearray[i]=valueofpasthistory;
pasthistorydateassociativearray[i]=valueofpasthistorydate;
}



for(var e=1;e<count_surgical;e++)
{
var valueofsurgicalhistory= $('#surgical' + e).val() ;
var valueofsurgicalhistorydate=$('#sur' + e).val() ;
surgicalhistoryassociativearray[e]=valueofsurgicalhistory;
surgicalhistorydateassociativearray[e]=valueofsurgicalhistorydate;
}


for(var ee=1;ee<count_allergies;ee++)
{

var valueofallergies= $('#allergies' + ee).val() ;
var valueofallergiesdate=$('#all' + ee).val() ;
allergiesassociativearray[ee]=valueofallergies;
allergiesdateassociativearray[ee]=valueofallergiesdate

}


for(var eee=1;eee<count_accedent;eee++)
{



var valueofaccedent= $('#accedent' + eee).val() ;

var valueofaccedentdate=$('#acc' + eee).val() ;
accedentassociativearray[ee]=valueofaccedent;
accedentdateassociativearray[ee]=valueofaccedentdate

}



for(var z=1;z<count_specialneeds;z++)
{


var valueofspecialneeds= $('#specialneeds' + z).val() ;

specialneedsassociativearray[z]=valueofspecialneeds;


}



for(var zz=1;zz<count_familyhistory;zz++)
{



var valueoffamilyhistory= $('#familyhistory' + z).val() ;

familyhistoryassociativearray[zz]=valueoffamilyhistory;


}

for(var y=1;y<count_bloodtransfer;y++)
{

var valueofbloodtransfer= $('#bloodtransfer' + y).val() ;

var valueofbloodtransferdate=$('#blood' + y).val() ;
bloodtransferassociativearray[y]=valueofbloodtransfer;
bloodtransferdateassociativearray[y]=valueofbloodtransferdate;

}



for(var y=1;y<count_mis;y++)
{

var valueofmis= $('#misc' + y).val() ;

var valueofmisdate=$('#mis' + y).val() ;
misassociativearray[y]=valueofmis
misdateassociativearray[y]=valueofmisdate

}






for(var y=1;y<count_birth;y++)
{

var valueofmis= $('#birth' + y).val() ;

var valueofmisdate=$('#bir' + y).val() ;
birthassociativearray[y]=valueofbirth
birthdateassociativearray[y]=valueofbirthdate

}










///////////////////////////////////////////////////////////
var pasthistoryjson= JSON.stringify(pasthistoryassociativearray);
var pasthistorydatejson = JSON.stringify( pasthistorydateassociativearray);
var patientemailjson=JSON.stringify(patientemailassociativearray);
var surgicalhistoryjson=JSON.stringify(surgicalhistoryassociativearray);
var surgicalhistorydatejson=JSON.stringify(surgicalhistorydateassociativearray);
var allergiesjson=JSON.stringify(allergiesassociativearray);
var allergiesdatejson=JSON.stringify(allergiesdateassociativearray);
var accedentjson=JSON.stringify(accedentassociativearray);
var accedentdatejson=JSON.stringify(accedentdateassociativearray);
var specialneedsjson=JSON.stringify(specialneedsassociativearray);
var familyhistoryjson=JSON.stringify(familyhistoryassociativearray);
var bloodtransferjson=JSON.stringify(bloodtransferassociativearray);
var bloodtransferdatejson=JSON.stringify(bloodtransferdateassociativearray);
var misjson=JSON.stringify(misassociativearray);
var misdatejson=JSON.stringify(misdateassociativearray);
        $.ajax({
            url: '/test',
            type: 'post',
            dataType: 'json',
            success: function (data) {



   if (data.success == 2){
    $("#updateMessage").show();
}


           if (data.success == 1){
    $("#successMessage").show();
}


   if (data.success == 0){
    $("#errorMessage").show();
}







            },
data: {"_token":token, 
    "pastpasthistorydatejson":pasthistorydatejson,
    "patientemailjson":patientemailjson,
    "surgicalhistoryjson":surgicalhistoryjson,
    "surgicalhistorydatejson":surgicalhistorydatejson,
    "allergiesjson":allergiesjson,
    "allergiesdatejson":allergiesdatejson,
    "accedentjson":accedentjson,
    "accedentdatejson":accedentdatejson,
    "specialneedsjson":specialneedsjson ,
     "familyhistory":familyhistoryjson ,
     "bloodtransferjson":bloodtransferjson ,
      "bloodtransferdatejson":bloodtransferdatejson ,
       "misjson":misjson ,
        "misdatejson":misdatejson }
        });
    }







/*
function sendemail()
{

patientemailarray[0]=$(".patientemail").val();
patientemailassociativearray[0] = patientemailarray[0];
pasthistoryassociativearray[0]=$("#pasthistory").val();
var patientemailjson=JSON.stringify(patientemailassociativearray);
$.ajax({
            url: '/sendemail',
            type: 'post',
            dataType: 'json',

            success: function (data) {window.location.replace("/showprescription/"+data);},

            data:{"_token":token,patientemailjson}});



}
*/
















$('#patient_profile_form') .on('click', '#add', function(){
        var value = value_src.val();
        var value2=value_src2.val();
        var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="id'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="uu'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(container);
        value_src.val('');
 value_src2.val('');
         count++;

    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count--
    });
    

$('#patient_profile_form') .on('click', '#addsurgical', function(){
        var value = value_src_surgical.val();
        var value2=value_src2_surgical.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="surgical'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="sur'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofsurgical);
        value_src_surgical.val('');
 value_src2_surgical.val('');
         count_surgical++;
         
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
        count_surgical--;
    });
    

$('#patient_profile_form') .on('click', '#addallergies', function(){
        var value = value_src_allergies.val();
        var value2=value_src2_allergies.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="allergies'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="all'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofallergies);
        value_src_allergies.val('');
 value_src2_allergies.val('');
         count_allergies++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_allergies--;
    });
    
$('#patient_profile_form') .on('click', '#addaccedent', function(){

        var value = value_src_accedent.val();
        var value2=value_src2_accedent.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="accedent'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="acc'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofaccedent);
        value_src_accedent.val('');
 value_src2_accedent.val('');
         count_accedent++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_accedent--;
    });
    

$('#patient_profile_form') .on('click', '#addspecialneeds', function(){

        var value = value_src_specialneeds.val();
     
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="specialneeds'+ count +'" />' 
 +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofspecialneeds);
        value_src_specialneeds.val('');

         count_specialneeds++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_specialneeds--;
    });
    

$('#patient_profile_form') .on('click', '#addfamilyhistory', function(){

     
  var value = value_src_familyhistory.val();
     
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="familyhistory'+ count +'" />' 
 +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containeroffamilyhistory);
        value_src_familyhistory.val('');

         count_familyhistory++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_familyhistory--;
    });
    
$('#patient_profile_form') .on('click', '#addbloodtransfer', function(){

        var value = value_src_bloodtransfer.val();
        var value2=value_src2_bloodtransfer.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="bloodtransfer'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="blood'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofbloodtransfer);
        value_src_bloodtransfer.val('');
 value_src2_bloodtransfer.val('');
         count_bloodtransfer++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_bloodtransfer--;
    });
    
$('#patient_profile_form') .on('click', '#addmis', function(){

        var value = $('#mis').val();
        var value2=value_src2_mis.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="misc'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="mis'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofmis);
        value_src_mis.val('');
 value_src2_mis.val('');
         count_mis++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_mis--;
    });
    



$('#patient_profile_form') .on('click', '#addbirth', function(){

        var value = $('#birth').val();
        var value2=$('#birthdate').val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="birth'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="bi'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo($('.copiesofbirth'));
        value_src_birth.val('');
 value_src2_birth.val('');
         count_birth++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         count_birth--;
    });
    









