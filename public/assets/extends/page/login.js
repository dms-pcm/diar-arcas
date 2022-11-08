jQuery(document).ready(function () {
    $('#nama_user').text(localStorage.getItem("nama_user"));
});

function login() {
    AmagiLoader.show();
    $.ajax({
        url:`${urlApi}login`,
        type:'POST',
        data:{
            username: $('#username').val(), 
            password: $('#password').val()
        },
        success:function(response){
            AmagiLoader.hide();
            let res = response?.data;
            window.location = `${baseUrl}dashboard`;
            localStorage.setItem("token", res?.token?.access_token);
            localStorage.setItem("user_id", res?.user?.id);
            localStorage.setItem("role_id", res?.user?.role?.id);
            localStorage.setItem("nama_role", res?.user?.role?.name);
            localStorage.setItem("username", res?.user?.username);
            localStorage.setItem("nama_user", res?.user?.name);
        },
        error:function(xhr){
            AmagiLoader.hide();
            handleErrorLogin(xhr);
        }
    });
}

function logout() {
    AmagiLoader.show();
    $.ajax({
        url:`${urlApi}logout`,
        type:'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization","Bearer " + localStorage.getItem("token"));
        },
        success:function(response){
            AmagiLoader.hide();
            localStorage.clear();
            localStorage.setItem("token", "");
            localStorage.setItem("user_id", "");
            localStorage.setItem("role_id", "");
            localStorage.setItem("nama_role", "");
            localStorage.setItem("username", "");
            localStorage.setItem("nama_user", "");
            window.location = baseUrl;
        },
        error:function(msg, status, error){
            AmagiLoader.hide();
            localStorage.clear();
            let code= msg.responseJSON.status.code
            if(code==401){
                window.location.href=baseUrl;
            }
        }
    });
}