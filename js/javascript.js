$(document).ready(function ()
{
    $('#logo').change(function () {
        var fileElement = document.getElementById("logo");
        var fileExtension = "";
        if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        if (fileExtension.toLowerCase() == "png") {
            document.getElementById('img').src = window.URL.createObjectURL(this.files[0])
            $('#submitLog').html('<input type = "submit" name = "bouton" value = "Modifier logo" class = "btn btn-large btn-primary">');
            $('#submitLog').append(' <input type = "submit" name = "annuler" value = "Annuler" class = "btn btn-large btn-primary">');
            return true;
        } else {
            if (fileExtension.toLowerCase() == "jpg") {
                document.getElementById('img').src = window.URL.createObjectURL(this.files[0])
                $('#submitLog').html('<input type = "submit" name = "bouton" value = "Modifier logo" class = "btn btn-large btn-primary">');
                $('#submitLog').append(' <input type = "submit" name = "annuler" value = "Annuler" class = "btn btn-large btn-primary">');
                return true;
            } else {
                if (fileExtension.toLowerCase() == "gif") {
                    document.getElementById('img').src = window.URL.createObjectURL(this.files[0])
                    $('#submitLog').html('<input type = "submit" name = "bouton" value = "Modifier logo" class = "btn btn-large btn-primary">');
                    $('#submitLog').append(' <input type = "submit" name = "annuler" value = "Annuler" class = "btn btn-large btn-primary">');

                    return true;
                } else {
                    alert("Selectionner une image valide (.jpg, .png, .gif)");
                    return false;
                }
            }
        }
    });

    $('#Infos').click(function () {
        var nom = $("#Nom").val();
        var mail = $("#Email").val();
        var prenom = $("#Prenom").val();
        if (nom == "" || prenom == "" || mail == "")
        {
            alert("Vérifiez que tout vos champs sont remplis");
        } else {
            $("#form_information").attr("action", "includes/ChangInf.inc.php");
        }
    });

    $('#mdp').click(function () {
        var newmdp = $("#newmdp").val();
        var mdpverif = $("#mdpverif").val();
        if (newmdp == "" || mdpverif == "")
        {
            alert("Veuillez insérer un mot de passe valide");
        } else {
            if (newmdp == mdpverif) {
                $("#form_information").attr("action", "includes/ChangMdp.inc.php");
            } else {
                alert("Veuillez insérer un mot de passe valide");
            }
        }
    });

    $('#Inscription').click(function () {
        var nom = $("#Nom").val();
        var mail = $("#Email").val();
        var prenom = $("#Prenom").val();
        if (nom == "" || prenom == "" || mail == "")
        {
            alert("Vérifiez que tout vos champs sont remplis");
        } else {
            $("#form_Inscription").attr("action", "includes/Inscription.inc.php");
        }
    });

    $('#commentaire').click(function () {
        var titre = $("#titre").val();
        var commentaire = $("#commentaires").val();
        if (titre == "" || commentaire == "")
        {
            alert("Vérifiez que tout vos champs sont remplis");
        } else {
            $("#form_commentaire").attr("action", "./includes/add_commentaire.inc.php");
        }
    });
    $('#rechercher').click(function () {
        var key = $("#key").val();
        if (key == "")
        {
            alert("Vérifiez que tout vos champs sont remplis");
        } else {
            $("#form_recherche").attr("action", "http://monsuperblog.esy.es/monsite/index.php");
            $("#form_recherche").attr("method", "get");
        }
    });
});
