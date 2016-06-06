



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



function send() {


patientemailarray[0]=$(".patientemail").val();
patientemailassociativearray[0] = patientemailarray[0];
pasthistoryarray[0]=$(".pasthistory").val(); ; 
//var da = new Array(firstelement); 
pasthistorydatearray[0]= $(".pasthistorydate").val(); 

surgicalhistoryarray[0]=$(".surgicalhistory").val()  ;
surgicalhistorydatearray[0]=$(".surgicalhistorydate").val()   ;
//console.log(surgicalhistorydatearray[0]);
//var mydate= new Array(firstelementdate); 
//var mydate=[firstelementdate];
//mydate[0]=firstelementdate;










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










var pasthistoryjson= JSON.stringify(pasthistoryassociativearray);
var pasthistorydatejson = JSON.stringify( pasthistorydateassociativearray);
var patientemailjson=JSON.stringify(patientemailassociativearray);
var surgicalhistoryjson=JSON.stringify(surgicalhistoryassociativearray);
var surgicalhistorydatejson=JSON.stringify(surgicalhistorydateassociativearray);
//console.log(pasthistoryjson);

console.log(surgicalhistoryjson);
   










        $.ajax({
            url: '/test',
            type: 'post',
            dataType: 'json',
            success: function (data) {
             
            },
            data: {"_token":token,pasthistoryjson ,pasthistorydatejson,patientemailjson,surgicalhistoryjson,surgicalhistorydatejson}
        });
    }




$('.patient_profile_form') .on('click', '.add', function(){
        var value = value_src.val();
        var value2=value_src2.val();
        var html = '<div class="line">' +
            '<input class="accepted" type="text"    name=" name' + count +'"         value="' + value + '"  id="id'+ count +'" />' 
+'<input class="accepteddate" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="uu'+ count +'" />' +
            '<input type="button" value="Remove" class="remove" />' +
        '</div>';
        
        $(html).appendTo(container);
        value_src.val('');
 value_src2.val('');
         count++;

    }).on('click', '.remove', function(){
        $(this).parents('.line').remove();
         count--;
    });
    






$('.patient_profile_form') .on('click', '.addsurgical', function(){
        var value = value_src_surgical.val();
        var value2=value_src2_surgical.val();
        var html = '<div class="line">' +
            '<input class="accepted" type="text"    name=" sur' + count_surgical +'"         value="' + value + '"  id="surgical'+ count_surgical +'" />' 
+'<input class="accepted" type="text"    name=" name' + count +'"         value="' + value2 + '"  id="sur'+ count +'" />' +
            '<input type="button" value="Remove" class="remove" />' +
        '</div>';
        
        $(html).appendTo(containerofsurgical);
        value_src_surgical.val('');
 value_src2_surgical.val('');
         count_surgical++;
         count_surgical--;
    }).on('click', '.remove', function(){
        $(this).parents('.line').remove();
    });
    



















