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
      
  

                /*  alert(user_email);*/


        // Datadata to be sent to server
        post_data = {'userEmail':user_email};
       
        // Ajax post data to server
        $.post('PHPMailer/notifyMe.php', post_data, function(response){  
           
            // Load json data from server and output message    
            if(response.type == 'error') {

                output = '<div class="error-message"><p>'+response.text+'</p></div>';
                
            } else {
                     
                        $(".homeresult").html('<p class="notify-valid" style="color: #08791c;">Congrats! You are in list.<br>We will inform you as soon as we finish.</p>').fadeIn();
                      

                      setTimeout(function() {
    $('#homeresult').fadeOut('fast');
}, 3500); 
            }
           
            $("#answer").hide().html(output).fadeIn();

        }, 'json');

    });
   
    // Reset and hide all messages on .keyup()
    $("#contact-form input, #contact-form textarea").keyup(function() {
        $("#answer").fadeOut();
    });
   
});