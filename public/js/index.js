$(document).ready(function(){
   
    $(document).ajaxStart(function(){
       $('#divProcessing').show();
       //alert('start');
   });
   
    $(document).ajaxStop(function(){
       //alert('stop');
        $('#divProcessing').hide();
   }); 
   
});


