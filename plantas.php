<?php
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR.utf-8');

$home='';
$biomas='';
$plantas='active';
$referencias='';
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
                                    Plantas
                                </h2>
                                <hr>
                                <br>					
        					</div>
                        </div>
                    </div>
                    <div class="row" id="plantas">
                        
                    </div>
			    </div>
            </div>
		</div>
    </body>
</html>


<script>
var paginacao = 1;
PreenchePlantas();

    function volta(){
        paginacao--;
        PreenchePlantas();
        $('html,body').scrollTop(0);
    }
    
    function avanca(){
        paginacao++;
        PreenchePlantas();
        $('html,body').scrollTop(0);
    }

    function PreenchePlantas(){
        var xhr = new XMLHttpRequest();

        var nomeBioma = '';
        var quantidadeVotos = 1;
        xhr.open("GET", "http://plantasnacionais.sunsalesystem.com.br/PHP/GetPlantas.php", false);

        xhr.send();
        if (xhr.status == 200) {
            PreenchePlantaTexto(JSON.parse(xhr.responseText), paginacao);
        } else {
            alert('Não foi possível buscar os biomas.');
        }
    }

    function PreenchePlantaTexto(listaPlantas, paginacao){
        document.getElementById('plantas').hidden = false;

        var texto = '';

        texto += '    <div class="row">';

        for(i = ((paginacao-1) * 30); i < listaPlantas.lista.length && i < (paginacao * 30); i++){
            texto += '      <div class="col-sm-8">';
            texto += '          <input class="form-control" id="codigoPlanta_' + i + '" type="hidden" value="' + listaPlantas.lista[i].Id + '">';
            texto += '          <br>';
            texto += '          <h2 style="text-align: center;"> ' + listaPlantas.lista[i].Nomecientifico + ' | ' + listaPlantas.lista[i].Nomepopular + ' </h2>';
            texto += '          <br>';
            texto += '          <h4>';
            texto += '          Bioma: ' + listaPlantas.lista[i].Bioma;
            texto += '          <h4>';
            texto += '          Habitate: ' + listaPlantas.lista[i].Habitate;
            texto += '          <br>';
            texto += '          Folha: ' + listaPlantas.lista[i].Folha;
            texto += '          <br>';
            texto += '          Flor: ' + listaPlantas.lista[i].Flor;
            texto += '          <br>';
            texto += '          Fruto: ' + listaPlantas.lista[i].Fruto;
            texto += '          <br>';
            texto += '          Familia: ' + listaPlantas.lista[i].Familia;
            texto += '          <br>';
            texto += '          Tribo: ' + listaPlantas.lista[i].Tribo;
            texto += '          </h4>';
            /*texto += '    ' + (getCookie('LOGADO') == '1' ?
                           `<h4 style="text-align: right;">
                                <button class="buttonInicio" onclick="AbrirModalCadastroImagem();">Adicionar Imagens</button>
                            </h4>` : '');*/
            texto += '    </div>';
        }
        texto += '    </div>';

        texto += `<div class="row">';
                    <div class="col-sm-12">'
                        <h2 style="text-align: center;">
                            ` + (paginacao == 1 ? '' : '<button style="text-align: right;" class="buttonInicio" id="proximo" onclick="volta();">Anterior</button>') + `
                            ` + (i == listaPlantas.lista.length ? '' : `<button style="text-align: right;" class="buttonInicio" id="proximo" onclick="avanca();">Próximo</button>`) + `
                        </h2>
                    </div>';
                  </div>`;

        document.getElementById('plantas').innerHTML = "";
        document.getElementById('plantas').innerHTML += texto;
    }
</script>