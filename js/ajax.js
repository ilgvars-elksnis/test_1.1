$(document).ready(function(){
    $('#button').click(function(e){
        e.preventDefault();
        var email = $('#email').val();
        $.ajax({
            type: "POST",
            url: 'submit.php',
            data : $("#form").serialize()+"&action=insert",
            success: function(){
                console.log(email);
                form.classList.add('hidden');
                congrats.classList.remove('hidden')

            }
        });
    });
});


