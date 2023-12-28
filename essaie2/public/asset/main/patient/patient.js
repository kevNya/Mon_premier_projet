//*script de vérification de l'enregistrement d'un patient

/*$("#nom").blur(function () {
    var nom = $("#nom").val();
    if (
        nom != "" &&
        /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(
            nom
        )
    ) {
        $("#nom").addClass("is-valid");
        $("#nom").removeClass("is-invalid");
        $("#error-nom").text("");
    } else {
        $("#nom").addClass("is-invalid");
        $("#nom").removeClass("is-valid");
        $("#error-nom").text("wrong type caracter!");
    }
});*/
$("#register-patient").click(function () {
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var age = $("#age").val();
    var sexe = $("#sexe").val();
    var telephone = $("#telephone").val();
    var email = $("#emailpat").val();
    var adresse = $("#adresse").val();
    var agreed = $("#agreed");

    if (
        nom != "" &&
        /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(
            nom
        )
    ) {
        $("#nom").addClass("is-valid");
        $("#nom").removeClass("is-invalid");
        $("#error-nom").text("");

        if (
            prenom != "" &&
            /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(
                prenom
            )
        ) {
            $("#prenom").addClass("is-valid");
            $("#prenom").removeClass("is-invalid");
            $("#error-prenom").text("");

            if (age >= 0 && age <= 130) {
                $("#age").addClass("is-valid");
                $("#age").removeClass("is-invalid");
                $("#error-age").text("");

                if (sexe == "f" || sexe == "h") {
                    $("#sexe").addClass("is-valid");
                    $("#sexe").removeClass("is-invalid");
                    $("#error-sexe").text("");

                    if (telephone != "" && /^[0-9]{2,9}$/.test(telephone)) {
                        $("#telephone").addClass("is-valid");
                        $("#telephone").removeClass("is-invalid");
                        $("#error-telephone").text("");

                        if (
                            email != "" &&
                            /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(
                                email
                            )
                        ) {
                            $("#emailpat").removeClass("is-invalid");
                            $("#emailpat").addClass("is-valid");
                            $("#error-emailpat").text("");

                            if (
                                adresse != "" &&
                                /^[a-zA-Z0-9._-\s]+\s[0-9]+,\s[0-9]+\s[a-z]{2,10}$/.test(
                                    adresse
                                )
                            ) {
                                $("#adresse").removeClass("is-invalid");
                                $("#adresse").addClass("is-valid");
                                $("#error-adresse").text("");

                                if (agreed.is(":checked")) {
                                    $("#agreed").removeClass("is-invalid");

                                    $("#error-agreed").text("");
                                    //var resp = emailExistjs(email);
                                    //(resp != "exist") ? alert("data ok") : $("#error-email").text( "This email already exist!" );
                                    $("#form-register-patient").submit();

                                    //alert("data ok"); //envoie du formulaire au serveur
                                    // ici on va envoyer le formulaire
                                } else {
                                    $("#agreed").addClass("is-invalid");

                                    $("#error-agreed").text(
                                        "   Please check the box"
                                    );
                                }
                            } else {
                                $("#adresse").addClass("is-invalid");
                                $("#adresse").removeClass("is-valid");
                                $("#error-adresse").text(
                                    "the adresse format is xxx xxxx 0, 0000 xxxxx"
                                );
                            }
                        } else {
                            $("#emailpat").addClass("is-invalid");
                            $("#emailpat").removeClass("is-valid");
                            $("#error-emailpat").text("wrong mail syntax");
                        }
                    } else {
                        $("#telephone").addClass("is-invalid");
                        $("#telephone").removeClass("is-valid");
                        $("#error-telephone").text(
                            "The format is 32 ***(9digits)"
                        );
                    }
                } else {
                    $("#sexe").addClass("is-invalid");
                    $("#sexe").removeClass("is-valid");
                    $("#error-sexe").text("This field is empty!");
                }
            } else {
                $("#age").addClass("is-invalid");
                $("#age").removeClass("is-valid");
                $("#error-age").text("This number is to much!");
            }
        } else {
            $("#prenom").addClass("is-invalid");
            $("#prenom").removeClass("is-valid");
            $("#error-prenom").text("empty field or wrong type caracter!");
        }
    } else {
        $("#nom").addClass("is-invalid");
        $("#nom").removeClass("is-valid");
        $("#error-nom").text("wrong type caracter!");
    }
});
//evenement pour le input de la checkbox

$("#agreed").change(function () {
    var agreede = $("#agreed");
    if (agreede.is(":checked")) {
        $("#agreed").removeClass("is-invalid");
        //$('#agreed').addClass('is-valid');
        $("#error-agreed").text("");
        //$('#good-agreed').text('All is ok');
    } else {
        $("#agreed").addClass("is-invalid");
        //$('#good-agreed').text('');
        $("#error-agreed").text("   Please check the box");
    }
});

/*$("#examen").blur(function () {
    $examen = $("#examen").val();
    if ((examen = /^[A-Z]+(?:,[A-Z]+)*$/.test(examen))) {
        $("#examen").removeClass("is-invalid");
        $("#examen").addClass("is-valid");
        $("#error-examen").text("");
    } else {
        $("#examen").addClass("is-invalid");
        $("#examen").removeClass("is-valid");
        $("#error-examen").text(
            "The format for this field is XXX,XXX,XXX(no space)"
        );
    }
});*/
