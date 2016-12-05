$(document).ready(function() {

    $("#contact-form [type='submit']").click(function(e) {
        e.preventDefault();
        
        // Get input field values of the contact form
        var user_name       = $('input[name=name]').val();
        var user_email      = $('input[name=email]').val();
        var user_subject    = $('input[name=subject]').val();
          var user_message    = $('textarea[name=message]').val();
  

/*                  alert(user_email);
*/

        // Datadata to be sent to server
        post_data = {'userName':user_name, 'userEmail':user_email, 'userSubject':user_subject, 'userMessage':user_message};
       
        // Ajax post data to server
        $.post('PHPMailer/MailFunction.php', post_data, function(response){  
           
            // Load json data from server and output message    
            if(response.type == 'error') {

                output = '<div class="error-message"><p>'+response.text+'</p></div>';
                
            } else {
           
                output = '<div class="success-message"><p>'+response.text+'</p></div>';
               
                // After, all the fields are reseted
                $('#contact-form input').val('');
                $('#contact-form textarea').val('');
                
            }
           
            $("#answer").hide().html(output).fadeIn();

        }, 'json');

    });
   
    // Reset and hide all messages on .keyup()
    $("#contact-form input, #contact-form textarea").keyup(function() {
        $("#answer").fadeOut();
    });
   
});






$(document).ready(function() {

    $("#home-form [type='submit']").click(function(e) {
        e.preventDefault();
        
        // Get input field values of the contact form
        
        var user_email  = $('input[name=email1]').val();
      
       var p = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              if (p.test(user_email)) {

                 $("#homeloader").show() ;   
              
        post_data = {'userEmail':user_email};
       
        
        $.post('PHPMailer/notifyMe.php', post_data, function(response){  
   
            if(response.type == 'error') {

                output = '<div class="error-message"><p>'+response.text+'</p></div>';
                
            } else {
                           $("#homeloader").hide() ;

                              $('#home-form')[0].reset();
                              
                        $(".homeresult").html('<p class="notify-valid" style="color: #00ff5e; font-weight: 700;">Congrats! Thanks for showing interest. We will update you about the progress.</p>').fadeIn();
                                              

                                              setTimeout(function() {
                            $('#homeresult').fadeOut('fast');
                        }, 3500); 
              }



           
            $("#answer").hide().html(output).fadeIn();

        }, 'json');

   
   }else{
                                   $(".homeresult").html('<p class="notify-invalid style="color:#ff5353; font-weight:700;">Please enter a valid email address.</p>').fadeIn();
                                              
                                        
                                              setTimeout(function() {
                            $('#homeresult').fadeOut('fast');
                        }, 3500); 


   }
     


    });
    

    // Reset and hide all messages on .keyup()
    $("#contact-form input, #contact-form textarea").keyup(function() {
        $("#answer").fadeOut();
    });
   
});



$("#homeloader").hide() ;  