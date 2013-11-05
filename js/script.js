var elements;

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



        // validate signup form on keyup and submit
    $("#signupForm").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        }
    });
    
    });