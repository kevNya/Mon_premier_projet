@extends('welcome')

@section('title', 'About')
@section('content')
    <h1>Manage users</h1>

@endsection
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

            alert("data ok"); //envoie du formulaire au serveur
            $("#form-registerss").submit(); // ici on va envoyer le formulaire
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
