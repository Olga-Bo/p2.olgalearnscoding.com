

$(document).ready(function(){
        // highlight 
        var elements = $("input[type!='submit'], textarea, select");
        elements.focus(function(){
            $(this).parents('li').addClass('highlight');
        });
        elements.blur(function(){
            $(this).parents('li').removeClass('highlight');
        });
        
        $("#forgotpassword").click(function() {
            $("#password").removeClass("required");
            $("#login").submit();
            $("#password").addClass("required");
            return false;
        });
        
        $("#login").validate()
    });
