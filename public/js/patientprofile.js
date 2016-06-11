
$(document).ready(function(){

    $(function() {
        $( "#pasthistorydate" ).datepicker();
        $( "#surgicalhistorydate" ).datepicker();
        $( "#allergiesdate" ).datepicker();
        $( "#accedentdate" ).datepicker();
       $( "#bloodtransferdate" ).datepicker();
       $( "#misdate" ).datepicker();
 $( "#date" ).datepicker();
       
    });});

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






value_src_p = $('#drug');

var value_src2_p = $('#date');
 
var drug= {};
var freq={};
var date={};
var duration={};
var count_p=1;




















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

drug[0]= $("#drug").val() ;
duration[0]=$("#duration").val()   ;
freq[0]=$("#freq").val()   ;
date[0]= $("#date").val()  ;


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

//alert(count_accedent);
for(var eee=1;eee<count_accedent;eee++)
{



var valueofaccedent= $('#accedent' + eee).val() ;

var valueofaccedentdate=$('#acc' + eee).val() ;
accedentassociativearray[eee]=valueofaccedent;
accedentdateassociativearray[eee]=valueofaccedentdate

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










for(var y=1;y<count_p;y++)
{

var valueofdrug= $('#drug' + y).val() ;

var valueofdate= $('#date' + y).val() ;
var valueoffreq=$('#freq' + y).val() ;
var valueofduration=$('#duration' + y).val() ;
date[y]=valueofdate;
drug[y]=valueofdrug;
freq[y]=valueoffreq;
duration[y]=valueofduration;

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
var drugjson =JSON.stringify(drug);
var freqjson =JSON.stringify(freq);
var datejson =JSON.stringify(date);
var durationjson =JSON.stringify(duration);
//console.log(drugjson);
console.log(drugjson);
//console.log(accedentdatejson);
//console.log(datejson);
//console.log(durationjson);

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
    "pasthistoryjson":pasthistoryjson,
    " pasthistorydatejson":pasthistorydatejson,
    "patientemailjson":patientemailjson,
    "surgicalhistoryjson":surgicalhistoryjson,
    "surgicalhistorydatejson":surgicalhistorydatejson,
    "allergiesjson":allergiesjson,
    "allergiesdatejson":allergiesdatejson,
    "accedentjson":accedentjson,
    "accedentdatejson":accedentdatejson,
    "specialneedsjson":specialneedsjson ,
     "familyhistoryjson":familyhistoryjson ,
     "bloodtransferjson":bloodtransferjson ,
      "bloodtransferdatejson":bloodtransferdatejson ,
       "misjson":misjson ,
        "misdatejson":misdatejson,
"drugjson":drugjson,
"freqjson":freqjson,
"datejson":datejson,
"durationjson":durationjson,

      }
        });
    }








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

            //success: function (data) {   if(data.success) 

//var data =data.success;

  //    window.location.replace("/showprescription/"+data); 




//},

            data:{"_token":token,patientemailjson}});



}

















$('#patient_profile_form') .on('click', '#add', function(){

        var value = value_src.val();
        var value2=value_src2.val();
        var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="id'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="uu'+ count +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(container);
        
        $(document).ready(function(){

    $(function() {
        $("#uu"+count).datepicker();
      });
  });
        value_src.val('');
 value_src2.val('');
         count++;

    })
.on('click', '#remove', function(){
        $(this).parents('#line').remove();
        // count--
    });
 

$('#patient_profile_form') .on('click', '#addsurgical', function(){
        var value = value_src_surgical.val();
        var value2=value_src2_surgical.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count_surgical +'"         value="' + value + '"  id="surgical'+ count_surgical +'" />' 
+'<input class="form-control" type="text"    name=" name' + count_surgical +'"         value="' + value2 + '"  id="sur'+ count_surgical +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        

        $(html).appendTo(containerofsurgical);
           
        
$(document).ready(function(){

    $(function() {
        $("#sur"+count_surgical).datepicker();
      });
  });


        value_src_surgical.val('');
 value_src2_surgical.val('');
         count_surgical++;
         

         
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
        //count_surgical--;
    });
    

$('#patient_profile_form') .on('click', '#addallergies', function(){
        var value = value_src_allergies.val();
        var value2=value_src2_allergies.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count_allergies +'"         value="' + value + '"  id="allergies'+ count_allergies +'" />' 
+'<input class="form-control" type="text"    name=" name' + count_allergies +'"         value="' + value2 + '"  id="all'+ count_allergies +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofallergies);
$(document).ready(function(){

    $(function() {
        $("#all"+count_allergies).datepicker();
      });
  });

        value_src_allergies.val('');
 value_src2_allergies.val('');
         count_allergies++;
        


    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
        
    });
    
$('#patient_profile_form') .on('click', '#addaccedent', function(){

        var value = value_src_accedent.val();
        var value2=value_src2_accedent.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count_accedent +'"         value="' + value + '"  id="accedent'+ count_accedent +'" />' 
+'<input class="form-control" type="text"    name=" name' + count_accedent +'"         value="' + value2 + '"  id="acc'+ count_accedent +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofaccedent);

$(document).ready(function(){

    $(function() {
        $("#acc"+count_accedent).datepicker();
      });
  });

        value_src_accedent.val('');
 value_src2_accedent.val('');
         count_accedent++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
        
    });
    

$('#patient_profile_form') .on('click', '#addspecialneeds', function(){

        var value = value_src_specialneeds.val();
     
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="specialneeds'+ count_specialneeds +'" />' 
 +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofspecialneeds);
        value_src_specialneeds.val('');

         count_specialneeds++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         //count_specialneeds--;
    });
    

$('#patient_profile_form') .on('click', '#addfamilyhistory', function(){

     
  var value = value_src_familyhistory.val();
     
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count_familyhistory +'"         value="' + value + '"  id="familyhistory'+ count +'" />' 
 +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containeroffamilyhistory);
        value_src_familyhistory.val('');

         count_familyhistory++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         //count_familyhistory--;
    });
    
$('#patient_profile_form') .on('click', '#addbloodtransfer', function(){

        var value = value_src_bloodtransfer.val();
        var value2=value_src2_bloodtransfer.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="bloodtransfer'+ count_bloodtransfer +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="blood'+ count_bloodtransfer +'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofbloodtransfer);
        $(document).ready(function(){

    $(function() {
        $("#blood"+count_bloodtransfer).datepicker();
      });
  });
        value_src_bloodtransfer.val('');
 value_src2_bloodtransfer.val('');
         count_bloodtransfer++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         //count_bloodtransfer--;
    });
    
$('#patient_profile_form') .on('click', '#addmis', function(){

        var value = $('#mis').val();
        var value2=value_src2_mis.val();
     var html = '<div id="line">' +
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="misc'+ count_mis+'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="mis'+ count_mis+'" />' +
            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo(containerofmis);

 
$(document).ready(function(){

    $(function() {
        $("#mis"+count_mis).datepicker();
      });
  });


        value_src_mis.val('');
 value_src2_mis.val('');
         count_mis++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
         //count_mis--;
    });
    









$('#patient_profile_form') .on('click', '#addp', function(){


        var value = $('#drug').val();
        var value2=$('#date').val();
     var html = '<div id="line">' +
        
'<input class="form-control" type="text"    name=" name' + count_p+'"         value="' + value2+ '"  id="date'+ count_p +'" />' +'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value+ '"  id="drug'+ count_p +'" />' +'<select id="freq'+count_p+'">' + '<option value="one">' + 'one' + '</option>' +

'<option value="twice">' + 'twice ' + '</option>' +
'<option value="three times">' + 'three times' + '</option>' +



'</select>' + '<select id="duration'+count_p+'"">' +  '<option value="everyday">'+ 'every day'+'</option>'+ '<option value="everymonth">'+ 'every month' +'</option>'  +'</select>' +







            '<input type="button" value="Remove" id="remove" class="btn btn-default" />' +
        '</div>'+'<br>';
        
        $(html).appendTo($('.copiesofp'));

$(document).ready(function(){

    $(function() {
        $("#date"+count_p).datepicker();
      });
  });






        value_src_p.val('');
 value_src2_p.val('');
         count_p++;
        
    }).on('click', '#remove', function(){
        $(this).parents('#line').remove();
      
    });
    






























