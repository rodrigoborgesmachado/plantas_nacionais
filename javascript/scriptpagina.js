function Topo(){
	parent.scroll(0,0);
}

$(document).ready(function () {
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#ClinicaJonasGabriela']").on('click', function (event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    $(window).scroll(function () {
        $(".slideanim").each(function () {
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });
})

function BuscaLista(){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://filmes.sunsalesystem.com.br/PHP/GetFilmes.php", false);
    xhr.send(null);

    if(xhr.status === 200){
        return JSON.parse(xhr.responseText);
    }
    else{
        return null;
    }
}

function BuscaPlantas(bioma, codigoPlanta, nomePlanta){
    var xhr = new XMLHttpRequest();

    var quantidadeVotos = 1;
    var dados = JSON.stringify({bioma, codigoPlanta, nomePlanta});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/GetPlantas.php");
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        var erroAjax = document.querySelector("#erro-ajax");
        if (xhr.status == 200) {
            //sucesso!
        } else {
            alert('Não foi possível buscar as plantas.');
            //erro!
        }
    }
    );

    xhr.send(dados);
    
    if(xhr.status === 200){
        return JSON.parse(xhr.responseText);
    }
    else{
        return null;
    }
}

function InserePlanta(bioma, nomeCientifico, nomePopular, habitate, folha, flor, fruto, familia, tribo, usuario){
    var xhr = new XMLHttpRequest();

    var dados = JSON.stringify({bioma, nomeCientifico, nomePopular, habitate, folha, flor, fruto, familia, tribo, usuario});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/InserePlanta.php", false);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(dados);

    if (xhr.status == 200) {
        return JSON.parse(xhr.responseText);
    } else {
        alert('Não foi possível inserir a planta.');
        //erro!
        return null;
    }
}

function BuscaBiomas(){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://plantasnacionais.sunsalesystem.com.br/PHP/GetBiomas.php", false);
    xhr.send(null);

    if(xhr.status === 200){
        return JSON.parse(xhr.responseText);
    }
    else{
        alert('Não foi possível buscar os biomas.');
        return null;
    }
}

function InsereBioma(nome, distribuicao, caracteristicas, fitofisionomia, observacao, usuario){
    var xhr = new XMLHttpRequest();

    var dados = JSON.stringify({nome, distribuicao, caracteristicas, fitofisionomia, observacao, usuario});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/InsereBioma.php");
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        user = JSON.parse(xhr.responseText);
        if (user.Sucesso == true) {
            alert(nome + " incluído com sucesso!");
            document.location.reload();
        } else {
            alert('Não foi possível inserir o bioma.');
            LogarNovamente();
        }
    }
    );

    xhr.send(dados);
}

function RealizaLogin(login, password){
    var url = "http://plantasnacionais.sunsalesystem.com.br/PHP/ValidaUsuario.php?login=" + login + "&pass=" + password;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        user = JSON.parse(xhr.responseText);
        if (user.Sucesso == true) {
            document.cookie = 'USUARIO=' + user.Nome;
            document.cookie = 'LOGADO=1';

            document.location.reload();
        } else {
            alert('Login não realizado! Login ou senha incorretos');
            return null;
        }
    }
    );

    xhr.send();
}

function RealizaDeslog(){
    document.cookie = 'LOGADO=0';
    document.location.reload();
}

function LogarNovamente(){
    RealizaDeslog();
    document.location.reload();
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}