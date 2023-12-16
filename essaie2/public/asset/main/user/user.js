//*script de vérification de l'enregistrement des utilisateurs
$("#firstname").blur(function () {
    var firstname = $("#firstname").val();
    if (
        firstname != "" &&
        /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(
            firstname
        )
    ) {
        $("#firstname").addClass("is-valid");
        $("#firstname").removeClass("is-invalid");
        $("#error-firstname").text("");
    } else {
        $("#firstname").addClass("is-invalid");
        $("#firstname").removeClass("is-valid");
        $("#error-firstname").text("wrong type caracter!");
    }
});

$("#register-user").click(function () {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var controlpassword = $("#controlpassword").val();
    var passwordlength = password.length;
    var agree = $("#agree");

    if (
        firstname != "" &&
        /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(
            firstname
        )
    ) {
        $("#firstname").addClass("is-valid");
        $("#firstname").removeClass("is-invalid");
        $("#id-register-firstname").text("");

        if (
            lastname != "" &&
            /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(
                lastname
            )
        ) {
            $("#lastname").addClass("is-valid");
            $("#lastname").removeClass("is-invalid");
            $("#id-register-lastname").text("");

            if (
                email != "" &&
                /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email)
            ) {
                $("#email").addClass("is-valid");
                var resp = emailExistjs(email);
                if (resp != "exist") {
                    $("#email").removeClass("is-invalid");
                    $("#email").addClass("is-valid");
                    $("#error-email").text("");
                    //alert("data ok")

                    if (password != "" && passwordlength >= 6) {
                        $("#password").addClass("is-valid");
                        $("#password").removeClass("is-invalid");
                        $("#error-password").text("");

                        if (
                            password == controlpassword &&
                            controlpassword != ""
                        ) {
                            $("#controlpassword").removeClass("is-invalid");
                            $("#controlpassword").addClass("is-valid");
                            $("#error-controlpassword").text("");

                            if (agree.is(":checked")) {
                                $("#agree").removeClass("is-invalid");

                                $("#error-agree").text("");
                                //var resp = emailExistjs(email);
                                //(resp != "exist") ? alert("data ok") : $("#error-email").text( "This email already exist!" );

                                //alert("data ok"); envoie du formulaire au serveur
                                $("#form-register").submit(); // ici on va envoyer le formulaire
                            } else {
                                $("#agree").addClass("is-invalid");

                                $("#error-agree").text(
                                    "   Please check the box"
                                );
                            }
                        } else {
                            $("#controlpassword").addClass("is-invalid");
                            $("#controlpassword").removeClass("is-valid");
                            $("#error-controlpassword").text(
                                "password and confirmation do not match"
                            );
                        }
                    } else {
                        $("#password").addClass("is-invalid");
                        $("#password").removeClass("is-valid");
                        $("#error-password").text("Short password");
                    }
                } else {
                    $("#email").addClass("is-invalid");
                    $("#email").removeClass("is-valid");
                    $("#error-email").text("This email already exist!");
                }
            } else {
                $("#email").addClass("is-invalid");
                $("#email").removeClass("is-valid");
                $("#error-email").text("wrong mail syntax");
            }
        } else {
            $("#lastname").addClass("is-invalid");
            $("#lastname").removeClass("is-valid");
            $("#id-register-lastname").text(
                "empty field or wrong type caracter!"
            );
        }
    } else {
        $("#firstname").addClass("is-invalid");
        $("#firstname").removeClass("is-valid");
        $("#id-register-firstname").text("wrong type caracter!");
    }
});
//evenement pour le input de la checkbox

$("#agree").change(function () {
    var agreee = $("#agree");
    if (agreee.is(":checked")) {
        $("#agree").removeClass("is-invalid");
        //$('#agree').addClass('is-valid');
        $("#error-agree").text("");
        //$('#good-agree').text('All is ok');
    } else {
        $("#agree").addClass("is-invalid");
        //$('#good-agree').text('');
        $("#error-agree").text("   Please check the box");
    }
});

/*function existEmailjs(email) {
    var url = $("#email").attr("url-existEmail");

    var res = "";

    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
            email: email,
        },
        success: function (result) {
            res = result.response;
        },
        async: false,
    });

    return res;
}*/

function emailExistjs(email) {
    var url = $("#email").attr("url-emailExist");
    var token = $("#email").attr("token");
    var res = "";

    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
            email: email,
        },
        success: function (result) {
            res = result.response;
        },
        async: false,
    });

    return res;
}

/*  $('#register-user') c'est la syntaxe dans jquerry pour récupérer un élément à partir de son id
    var firstname= $('#firstname').val  dans la variable firstname on récupérer l'élément firstname à partir de son id et le .val() est ce qui permet de récupérer
    ce qui ce trouve à l'intérieur à ce moment là



*/
