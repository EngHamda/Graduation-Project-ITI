



var pasthistoryarray=[];
var pasthistorydatearray=[];
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

var  surgicalhistoryarray=[];
var  surgicalhistorydatearray=[];
var surgicalhistoryassociativearray= {};
var surgicalhistorydateassociativearray={};




var containerofallergies = $('.copiesofallergies'),
  value_src_allergies = $('#allergies');
var count_allergies=1;

var value_src2_allergies= $('#allergiesdate');

var  allergiesarray=[];
var  allergiesdatearray=[];
var allergiesassociativearray= {};
var allergiesdateassociativearray={};




var containerofaccedent = $('.copiesofaccedent'),
  value_src_accedent = $('#accedent');
var count_accedent=1;

var value_src2_accedent= $('#accedentdate');

var  accedentarray=[];
var  accedentdatearray=[];
var accedentassociativearray= {};
var accedentdateassociativearray={};



var containerofspecialneeds = $('.copiesofspecialneeds'),
  value_src_specialneeds = $('#specialneeds');
var count_specialneeds=1;



var  specialneedsarray=[];

var specialneedsassociativearray= {};






var containeroffamilyhistory = $('.copiesoffamilyhistory'),
  value_src_familyhistory = $('#familyhistory');
var count_familyhistory=1;



var  familyhistoryarray=[];

var familyhistoryassociativearray= {};




var containerofbloodtransfer = $('.copiesofbloodtransfer'),
  value_src_bloodtransfer = $('#bloodtransfer');
var count_bloodtransfer=1;

var value_src2_bloodtransfer= $('#bloodtransferdate');

var  bloodtransferarray=[];
var  bloodtransferdatearray=[];
var bloodtransferassociativearray= {};
var bloodtransferdateassociativearray={};



var containerofmis = $('.copiesofmis'),
  value_src_mis = $('#mis');
var count_mis=1;

var value_src2_mis= $('#misdate');

var misarray=[];
var  misdatearray=[];
var misassociativearray= {};
var misdateassociativearray={};











function send() {


patientemailarray[0]=$(".patientemail").val();
patientemailassociativearray[0] = patientemailarray[0];
pasthistoryarray[0]=$("#pasthistory").val(); ; 
//var da = new Array(firstelement); 
pasthistorydatearray[0]= $("#pasthistorydate").val(); 

surgicalhistoryarray[0]=$("#surgicalhistory").val()  ;
surgicalhistorydatearray[0]=$("#surgicalhistorydate").val()   ;
//console.log(surgicalhistorydatearray[0]);
//var mydate= new Array(firstelementdate); 
//var mydate=[firstelementdate];
//mydate[0]=firstelementdate;
allergiesarray[0]=$("#allergies").val()  ;
allergiesdatearray[0]=$("#allergiesdate").val()   ;


accedentarray[0]=$("#accedent").val()  ;
accedentdatearray[0]=$("#accedentdate").val()   ;

specialneedsarray[0]=$("#specialneeds").val()  ;

familyhistoryarray[0]=$("#familyhistory").val()  ;


bloodtransferarray[0]=$("#bloodtransfer").val()  ;
bloodtransferdatearray[0]=$("#bloodtransferdate").val()   ;

misarray[0]=$("#mis").val()  ;
misdatearray[0]=$("#misdate").val()   ;



for(var i=1;i<count;i++)
{



var valueofpasthistory= $('#id' + i).val() ;
var valueofpasthistorydate=$('#uu' + i).val() ;
pasthistoryarray.push(valueofpasthistory);
pasthistorydatearray.push(valueofpasthistorydate);

}


for(var c=0 ; c<count;c++)
{

pasthistoryassociativearray[c] = pasthistoryarray[c];
}



for(var d=0 ; d<count; d++)
{

 pasthistorydateassociativearray[d] = pasthistorydatearray[d];
}

/////////////////////////////////

for(var e=1;e<count_surgical;e++)
{



var valueofsurgicalhistory= $('#surgical' + e).val() ;
var valueofsurgicalhistorydate=$('#sur' + e).val() ;
surgicalhistoryarray.push(valueofsurgicalhistory);
surgicalhistorydatearray.push(valueofsurgicalhistorydate);

}


for(var f=0 ; f<count_surgical;f++)
{

surgicalhistoryassociativearray[f] = surgicalhistoryarray[f];
}




for(var j=0 ; j<count_surgical; j++)
{

 surgicalhistorydateassociativearray[j] = surgicalhistorydatearray[j];
}



////////////////////////////////



//alert(count_allergies);






for(var ee=1;ee<count_allergies;ee++)
{



var valueofallergies= $('#allergies' + ee).val() ;

var valueofallergiesdate=$('#all' + ee).val() ;
allergiesarray.push(valueofallergies);
allergiesdatearray.push(valueofallergiesdate);

}


for(var ff=0 ; ff<count_allergies;ff++)
{

allergiesassociativearray[ff] = allergiesarray[ff];
}




for(var jj=0 ; jj<count_allergies; jj++)
{

 allergiesdateassociativearray[jj] = allergiesdatearray[jj];
}



////////////////////////////////////////////////////////////////////





for(var eee=1;eee<count_accedent;eee++)
{



var valueofaccedent= $('#accedent' + eee).val() ;

var valueofaccedentdate=$('#acc' + eee).val() ;
accedentarray.push(valueofaccedent);
accedentdatearray.push(valueofaccedentdate);

}


for(var fff=0 ; fff<count_accedent;fff++)
{

accedentassociativearray[fff] = accedentarray[fff];
}




for(var jjj=0 ; jjj<count_accedent; jjj++)
{

 accedentdateassociativearray[jjj] = accedentdatearray[jjj];
}
///////////////////////////////////////////////////////////////////////////////////////////////


for(var z=1;z<count_specialneeds;z++)
{



var valueofspecialneeds= $('#specialneeds' + z).val() ;

specialneedsarray.push(valueofspecialneeds);


}


for(var q=0 ;q<count_specialneeds;q++)
{

specialneedsassociativearray[q] = specialneedsarray[q];
}

/////////////////////////////////




for(var zz=1;zz<count_familyhistory;zz++)
{



var valueoffamilyhistory= $('#familyhistory' + z).val() ;

familyhistoryarray.push(valueoffamilyhistory);


}


for(var q=0 ;q<count_familyhistory;q++)
{

familyhistoryassociativearray[q] = familyhistoryarray[q];
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



for(var y=1;y<count_bloodtransfer;y++)
{



var valueofbloodtransfer= $('#bloodtransfer' + y).val() ;

var valueofbloodtransferdate=$('#blood' + y).val() ;
bloodtransferarray.push(valueofbloodtransfer);
bloodtransferdatearray.push(valueofbloodtransferdate);

}


for(var l=0 ; l<count_bloodtransfer;l++)
{

bloodtransferassociativearray[l] = bloodtransferarray[l];
}




for(var k=0 ;k<count_bloodtransfer; k++)
{

bloodtransferdateassociativearray[k] = bloodtransferdatearray[k];
}


////////////////////////////////////////////////////////////////////////////////////////




for(var y=1;y<count_mis;y++)
{



var valueofmis= $('#misc' + y).val() ;

var valueofmisdate=$('#mis' + y).val() ;
misarray.push(valueofmis);
misdatearray.push(valueofmisdate);

}


for(var l=0 ; l<count_mis;l++)
{

misassociativearray[l] = misarray[l];
}




for(var k=0 ;k<count_mis; k++)
{

misdateassociativearray[k] =misdatearray[k];
}




















///////////////////////////////////////////////////
var pasthistoryjson= JSON.stringify(pasthistoryassociativearray);
var pasthistorydatejson = JSON.stringify( pasthistorydateassociativearray);
var patientemailjson=JSON.stringify(patientemailassociativearray);
var surgicalhistoryjson=JSON.stringify(surgicalhistoryassociativearray);
var surgicalhistorydatejson=JSON.stringify(surgicalhistorydateassociativearray);
//console.log(pasthistoryjson);
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




console.log(misjson);
console.log(misdatejson);










        $.ajax({
            url: '/test',
            type: 'post',
            dataType: 'json',
            success: function (data) {
             
            },
            data: {"_token":token,pasthistoryjson ,pasthistorydatejson,patientemailjson,surgicalhistoryjson,surgicalhistorydatejson,allergiesjson,allergiesdatejson,accedentjson,accedentdatejson,
specialneedsjson,familyhistoryjson,bloodtransferjson,bloodtransferdatejson,misjson,misdatejson}
        });
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
            '<input class="form-control" type="text"    name=" name' + count +'"         value="' + value + '"  id="id'+ count +'" />' 
+'<input class="form-control" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="uu'+ count +'" />' +
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
alert("hii")
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
alert("hii")
        var value = value_src_mis.val();
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
    



























