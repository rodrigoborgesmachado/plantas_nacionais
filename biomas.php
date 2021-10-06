<?php
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR.utf-8');

$home='';
$biomas='active';
$plantas='';
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php
    include 'head.php';
    ?>
    <body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">
        <?php
        include 'navegacao.php';
        include 'modal.php';
        ?>
        <div class="jumbotron">	
			<div class="interna" style="background-color: #dddddd;" align="justify">
                <div id="contact" class="container-fluid bg-grey">
                    <div class="row">
                        <div class="row">
        					<div class="col-sm-12">
				        		<h2 style="text-align: center;">
                                    Biomas
                                </h2>
                                <hr>
                                <br>					
        					</div>
                        </div>
                    </div>
                    <div class="row" id="biomas">
                        
                    </div>
			    </div>
            </div>
		</div>
    </body>
</html>

<script>

PreencheBiomas();

    function PreencheBiomas(){
        var xhr = new XMLHttpRequest();

        var nomeBioma = '';
        var quantidadeVotos = 1;
        var dados = JSON.stringify({nomeBioma});
        xhr.open("POST", "http://plantasnacionais.sunsalesystem.com.br/PHP/GetBiomas.php");
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.addEventListener("load", function() {
            var erroAjax = document.querySelector("#erro-ajax");
            if (xhr.status == 200) {
                PreencheBiomasTexto(JSON.parse(xhr.responseText));
            } else {
                alert('Não foi possível buscar os biomas.');
            }
        }
        );

        xhr.send(dados);
    }

    function PreencheBiomasTexto(listaBiomas){
        document.getElementById('biomas').hidden = false;

        var texto = '';

        texto += '    <div class="row">';

        for(i = 0; i < listaBiomas.lista.length; i++){
            texto += '      <div class="col-sm-8">';
            texto += '          <input class="form-control" id="codigoBioma_' + i + '" type="hidden" value="' + listaBiomas.lista[i].Id + '">';
            texto += '          <br>';
            texto += '          <h2 style="text-align: center;"> ' + listaBiomas.lista[i].Nome + ' </h2>';
            texto += '          <br>';
            texto += '          <h4>';
            texto += '          Distribuição: ' + listaBiomas.lista[i].Distribuicao;
            texto += '          <br>';
            texto += '          Características: ' + listaBiomas.lista[i].Caracteristicas;
            texto += '          <br>';
            texto += '          Fitofisionomia: ' + listaBiomas.lista[i].Fitofisionomia;
            texto += '          <br>';
            texto += '          Observação: ' + listaBiomas.lista[i].Observacao;
            texto += '          </h4>';
            /*texto += '    ' + (getCookie('LOGADO') == '1' ?
                           `<h4 style="text-align: right;">
                                <button class="buttonInicio" onclick="AbrirModalCadastroImagem();">Adicionar Imagens</button>
                            </h4>` : '');*/
            texto += '    </div>';
        }
        texto += '    </div>';

        document.getElementById('biomas').innerHTML += texto;
    }
</script>