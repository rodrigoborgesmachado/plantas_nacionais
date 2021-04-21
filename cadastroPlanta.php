<?php
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR.utf-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php
    include 'head.php';
    ?>
    <body id="home" data-spy="scroll" data-target=".navbar">
        <?php
        include 'modal.php';
        include 'navegacao.php';

        if(isset($_COOKIE['CHAVE']) && isset($_COOKIE['LOGADO'] && $_COOKIE['LOGADO'] == '1'))
        {
        ?>
        <div class="jumbotron">	
			<div class="interna" style="background-color: #dddddd;" align="justify">
                <div id="contact" class="container-fluid bg-grey">
                    <div class="row">
                        <div class="row">
        					<div class="col-sm-12">
				        		<h2 style="text-align: center;">
                                    Cadastro de Planta 
                                </h2>
                                <hr>
                                <br>					
        					</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Nome Científico:<br>
                                <input class="form-control" id="nomeCientifico" name="nomeCientifico" placeholder="Nome Científico" type="text" maxlength="200" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Nome Popular:<br>
                                <input class="form-control" id="nomePopular" name="nomePopular" placeholder="Nome Popular" type="text" maxlength="200" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            Biomas:<br>
                            <div class="row">
                                <div class="col-sm-12" id = 'biomas'>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Habitate:<br>
                                <input class="form-control" id="habitate" name="habitate" placeholder="Habitate" type="text" maxlength="1000" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Folha:<br>
                                <input class="form-control" id="folha" name="folha" placeholder="Folha" type="text" maxlength="1000" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Flor:<br>
                                <input class="form-control" id="flor" name="flor" placeholder="Flor" type="text" maxlength="1000" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Fruto:<br>
                                <input class="form-control" id="fruto" name="fruto" placeholder="Fruto" type="text" maxlength="1000" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Familia:<br>
                                <input class="form-control" id="familia" name="familia" placeholder="Família" type="text" maxlength="200" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                Tribo:<br>
                                <input class="form-control" id="tribo" name="tribo" placeholder="Tribo" type="text" maxlength="200" required>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button style="text-align: right;" class="buttonIncluir" onclick="incluirPlanta(<?php echo $_COOKIE['CHAVE']?>, <?php echo $_COOKIE['USUARIO']?>)">Incluir</button>
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

    <?php
        include 'modal.php';
        include 'navegacao.php';

        if(isset($_COOKIE['CHAVE']) && isset($_COOKIE['LOGADO'] && $_COOKIE['LOGADO'] == '1'))
        {
        ?>
            PreencheBiomas();
            function incluirPlanta(idusuario, chave){
                var bioma = document.getElementById('selectBiomas').value;
                var nomeCientifico = document.getElementById('nomeCientifico').value;
                var nomePopular = document.getElementById('nomePopular').value;
                var habitate = document.getElementById('habitate').value;
                var folha = document.getElementById('folha').value;
                var flor = document.getElementById('flor').value;
                var fruto = document.getElementById('fruto').value;
                var familia = document.getElementById('familia').value;
                var tribo = document.getElementById('tribo').value;
                var retorno = InserePlanta(bioma, nomeCientifico, nomePopular, habitate, folha, flor, fruto, familia, tribo, usuario, Chave);

                if(retorno.Result == 'True'){
                    alerta("Incluído com sucesso!");
                    $_COOKIE['CHAVE'] = retorno.Chave;
                    document.location.reload();
                }
            }

            function PreencheBiomas(){
                var listaBiomas = BuscaBiomas();
                document.getElementById('biomas').innerHTML = '';

                var texto = `<select class="form-select form-select-sm" aria-label="Default select" id='selectBiomas'>`;
                for(i = 0; i < listaBiomas.length; i++){
                    texto+=`<option value="`+ listaBiomas[i].ID + `">` + listaBiomas[i].NOME + `</option>`;
                }
                texto+='</select>';

                document.getElementById('biomas').innerHTML += texto;
            }
    <?php
        }
        ?>
</script>