(function ($, Drupal) {
    'use strict';
    function myfunction(){
        $("#edit-show").change(function(){
            $(this).prop("checked") ?  $("#edit-pass").prop("type", "text") : $("#edit-pass").prop("type", "password");    
        });
    }
    Drupal.behaviors.employee_registration = {
      attach: function (context, settings) {
        // once('employee_registration', 'html').forEach(function () {
        //     myFunction();
        // })
        myfunction(); 
        setTimeout(function() { 
            $(".ui-dialog").fadeOut(150);
            $(document).find(".ui-widget-overlay").fadeOut(150);
     }, 500)
      },
      detach: function(context, settings, trigger) {      
        
      }  
    };
  })(jQuery, Drupal, once);
  