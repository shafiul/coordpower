

$(document).ready(function(){
   
   $(".lang_switch_select").change(function(){
      var string = window.location.toString().split("?");      
      var query = "";
      if(string[1]){
        query = string[1].replace("lang=bangla","");
        query = string[1].replace("lang=english","");
        window.location = string[0] + "?lang="+$(this).val()+"&"+query;
      }
    
      window.location = string[0] + "?lang="+$(this).val();
   });
   
});


