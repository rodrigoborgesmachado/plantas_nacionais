<!DOCTYPE html>
<html lang="pt-br">
    <?php
    include 'head.php';
    ?>
    <body id="home" data-spy="scroll" data-target=".navbar">
        <?php
        include 'modal.php';
        include 'navegacao.php';

        if(isset($_COOKIE['LOGADO']) && $_COOKIE['LOGADO'] == '1')
        {
        ?>
        <div class="jumbotron">	
			<div class="interna" style="background-color: #dddddd;" align="justify">
                <div id="contact" class="container-fluid bg-grey">
                    <div class="row">
                        <div class="row">
        					<div class="col-sm-12">
				        		<h2 style="text-align: center;">
                                    Cadastro de Biomas 
                                </h2>
                                <hr>
                                <br>					
        					</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Nome do bioma:<br>
                                <input class="form-control" id="nomeBioma" name="nomeBioma" placeholder="Nome do Bioma" type="text" maxlength="200" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Distribuição:<br>
                                <input class="form-control" id="distribuicao" name="distribuicao" placeholder="Distribuição" type="text" maxlength="200" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Características:<br>
                                <input class="form-control" id="caracteristicas" name="caracteristicas" placeholder="Características" type="text" maxlength="65535" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Fitofisionomia:<br>
                                <input class="form-control" id="fitofisionomia" name="fitofisionomia" placeholder="Fitofisionomia" type="text" maxlength="65535" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Observação:<br>
                                <input class="form-control" id="observacao" name="observacao" placeholder="Observação" type="text" maxlength="65535" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button style="text-align: right;" class="buttonStartGame" id="incluir" onclick="incluirBioma('<?php echo $_COOKIE['USUARIO']?>')">Incluir</button>
                        </div>
                    </div>
			    </div>
            </div>
		</div>
        <?php
        }
        else{
            alert('Você não tem acesso a essa área! Faça o login!');
        ?>
        <div class="jumbotron">	
			<div class="interna" style="background-color: #dddddd;" align="justify">
                <div id="contact" class="container-fluid bg-grey">
                    <div class="row">
                        <div class="row">
        					<div class="col-sm-12">
				        		<h2 style="text-align: center;">
                                    Você não tem acesso a essa área! Faça o login!
                                </h2>
                                <hr>
                                <br>					
        					</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>

<script>
        function incluirBioma(idusuario){
            document.getElementById('incluir').disabled = true;
            
            var nome = document.getElementById('nomeBioma').value;
            var distribuicao = document.getElementById('distribuicao').value;
            var caracteristicas = document.getElementById('caracteristicas').value;
            var fitofisionomia = document.getElementById('fitofisionomia').value;
            var observacao = document.getElementById('observacao').value;
            var retorno = InsereBioma(nome, distribuicao, caracteristicas, fitofisionomia, observacao, 1);
        }
</script>