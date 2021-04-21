<?php
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR.utf-8');

$home='active';
$biomas='';
$plantas='';
$referencias='';
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php
    include 'head.php';
    ?>
    <body id="home" data-spy="scroll" data-target=".navbar">
        <?php
            include 'navegacao.php';
        ?>
        <div class="jumbotron">	
			<div class="interna" style="background-color: #dddddd;" align="justify">
                <div id="contact" class="container-fluid bg-grey">
                    <div class="row">
                        <div class="row">
        					<div class="col-sm-12">
				        		<h2 style="text-align: center;">
                                    Biomas Nacionais e Suas Descrições 
                                </h2>
                                <hr>
                                <br>					
        					</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Projeto com o objetivo de descrever de forma objetiva dos pricinpais biomas nacionais além de suas plantas. O projeto foi desenvolvido afim de levantar uma base de dados que forneça informações sobre os biomas e suas plantas, uma vez que as bases existente atualmente (governamentais) não conseguem suprir toda a necessidade, tendo informações incorretas e muitas vezes sem veracidade.
                                <br>
                                <br>
                                Insentivado e financiado por empreendedores de Uberlândia, o projeto começou em 2020, em meio à pandemia, com o intuito de deixar mais próximo as natureza daqueles que estão tão distantes. Os mineiros queriam ainda ajudar aqueles estudantes de flores, que fazem suas descrições, levantando um material que realmente seria de base para outros trabalhos e dissertações.
                                <br>
                                <br>
                                O site possui métodos de busca por biomas, suas descrições, ou mesmo busca por plantas, mostrando filtro para cada tipo e espécie. Navegue e descubra um pouco mais do nossa Brasil.
                            </h4>
                        </div>
                        <div class="col-sm-4">
                            <center><span class="glyphicon glyphicon-globe logo"></span></center>
                        </div>
                    </div>
			    </div>
            </div>
		</div>
    </body>
</html>

<script>

    function alerta(mensagem){
        AbrirModal("Alerta", mensagem);
    }

    function sucesso(mensagem){
        AbrirModal("Sucesso", mensagem);
    }

    function AbrirModal(tituloModal, textoModal){
        var titulo = document.querySelector('#tituloModal');
        var texto = document.querySelector('#textoModal');

        titulo.innerHTML = '';
        titulo.innerHTML = tituloModal;
        texto.innerHTML = '';
        texto.innerHTML = '<p>' + textoModal + '</p>';
        
        $("#myModal").modal();
    }

</script>