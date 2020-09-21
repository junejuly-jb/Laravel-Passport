$(document).ready(function(){
    $('body').on('click', '#btnLogin', function(e){
        e.preventDefault()
        var data = $('#formLogin').serializeArray()
        console.log(data)

        $.ajax({
            url: '/api/userlogin',
            data: data,
            method: 'POST',
            success: function(response){
                window.location = '/home'
    userinfo();

            }
        })

    })

    function userinfo(){
        $.ajax({
            url: '/api/info',
            method: 'GET',
            success: function(res){
                var html = "<tr><td>" +res.user['email']+ "</td></tr>"
                $('#tbody').append(html);
            }
        })
    }
})