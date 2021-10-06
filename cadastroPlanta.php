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
                            <h4>
                                Biomas:<br>
                                <div class="row">
                                    <div class="col-sm-12" id = 'biomas'>
                                        
                                    </div>
                                </div>
                            </h4>
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
                            <button style="text-align: right;" class="buttonStartGame" id="incluir" onclick="incluirPlanta();">Incluir</button>
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

            PreencheBiomas();
            function incluirPlanta(){
                var bioma = document.getElementById('selectBiomas').value;
                var nomeCientifico = document.getElementById('nomeCientifico').value;
                var nomePopular = document.getElementById('nomePopular').value;
                var habitate = document.getElementById('habitate').value;
                var folha = document.getElementById('folha').value;
                var flor = document.getElementById('flor').value;
                var fruto = document.getElementById('fruto').value;
                var familia = document.getElementById('familia').value;
                var tribo = document.getElementById('tribo').value;
                var retorno = InserePlanta(bioma, nomeCientifico, nomePopular, habitate, folha, flor, fruto, familia, tribo, 1);

                if(retorno.Sucesso == true){
                    alert("Incluído com sucesso!");
                    document.location.reload();
                }
            }

            function PreencheBiomas(){
                var biomas = BuscaBiomas();
                document.getElementById('biomas').innerHTML = '';

                var texto = `<select class="col-sm-12 form-select form-select-lg mb-3" aria-label=".form-select-lg example" id='selectBiomas'>`;
                for(i = 0; i < biomas.lista.length; i++){
                    texto+=`<option value="`+ biomas.lista[i].Id + `"` + (i == 0 ? " selected " : "") + `>` + biomas.lista[i].Nome + `</option>`;
                }
                texto+='</select>';

                document.getElementById('biomas').innerHTML += texto;
            }
</script>