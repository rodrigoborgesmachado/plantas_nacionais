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

function InserePlanta(bioma, nomeCientifico, nomePopular, habitate, folha, flor, fruto, familia, tribo, usuario, Chave){
    var xhr = new XMLHttpRequest();

    var quantidadeVotos = 1;
    var dados = JSON.stringify({bioma, nomeCientifico, nomePopular, habitate, folha, flor, fruto, familia, tribo, usuario, Chave});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/InserePlanta.php");
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        var erroAjax = document.querySelector("#erro-ajax");
        if (xhr.status == 200) {
            //sucesso!
        } else {
            alert('Não foi possível inserir a planta.');
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

function BuscaBiomas(nomeBioma){
    var xhr = new XMLHttpRequest();

    var quantidadeVotos = 1;
    var dados = JSON.stringify({nomeBioma});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/GetBiomas.php");
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        var erroAjax = document.querySelector("#erro-ajax");
        if (xhr.status == 200) {
            //sucesso!
        } else {
            alert('Não foi possível buscar os biomas.');
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

function InsereBioma(nome, distribuicao, caracteristicas, fitofisionomia, observacao, usuario, Chave){
    var xhr = new XMLHttpRequest();

    var dados = JSON.stringify({nome, distribuicao, caracteristicas, fitofisionomia, observacao, usuario, Chave});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/InsereBioma.php");
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        user = JSON.parse(xhr.responseText);
        if (user.Result == "True") {
            alert(nome + " incluído com sucesso!");
            document.cookie = 'CHAVE=' + user.Chave;
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
    var xhr = new XMLHttpRequest();

    var quantidadeVotos = 1;
    var dados = JSON.stringify({login, password});
    xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/ValidaUsuario.php");
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.addEventListener("load", function() {
        user = JSON.parse(xhr.responseText);
        if (user.Result == 'True') {
            chave = JSON.parse(user.Chave);
            document.cookie = 'CHAVE=' + chave.CHAVE;
            document.cookie = 'USUARIO=' + user.Usuario;
            document.cookie = 'LOGADO=1';

            document.location.reload();
        } else {
            alert('Login não realizado! Login ou senha incorretos');
            return null;
        }
    }
    );

    xhr.send(dados);
}

function RealizaDeslog(){
    document.cookie = 'LOGADO=0';
    document.cookie = 'CHAVE=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    document.location.reload();
}

function LogarNovamente(){
    RealizaDeslog();
    document.location.reload();
}