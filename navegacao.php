<?php
include 'funcoesBasicas.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>
		
		<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
					<a class="navbar-brand" href="index.php"> Biomas Nacionais e Suas Descrições </a>
                </div>
                <div class="collapse navbar-collapse" id="navBarOpcoes">
                    <ul class="nav navbar-nav navbar-right">
						<?php
							echo '<li class = "'.$home.'"><a href="index.php"><span class="glyphicon glyphicon-blackboard"></span>Início</a></li>';
							echo '<li class = "'.$biomas.'"><a href="biomas.php"><span class="glyphicon glyphicon-tree-deciduous"></span>Biomas</a></li>';
							echo '<li class = "'.$plantas.'"><a href="plantas.php"><span class="glyphicon glyphicon-grain"></span>Plantas</a></li>';
							echo '<li class = "'.$referencias.'"><a href="referencias.php"><span class="glyphicon glyphicon-grain"></span>Referências</a></li>';
							if(logado()){
								echo '
                                <li class = "'.$login.'">
                                    <div class="dropdown">
                                        <button class="btn btn-lg glyphicon glyphicon-list" style=" background-color: #4CAF50;color: #FFFFFF;font-size: 18px;" type="button" data-toggle="dropdown"></button> 
                                        <ul class="dropdown-menu" style=" background-color: #4CAF50;color: #FFFFFF;font-size: 18px;">
                                            <li id="incluirBioma">
                                                <a href="cadastroBioma.php">
                                                    <span class="glyphicon glyphicon-tree-deciduous">
                                                    </span>
                                                    Incluir Bioma
                                                </a>
                                            </li>
                                            <li id="incluirPlanta">
                                                <a href="cadastroPlanta.php">
                                                    <span class="glyphicon glyphicon-grain">
                                                    </span>
                                                    Incluir Planta
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" id="logOut">
                                                <span class="glyphicon fa fa-power-off">
                                                </span>
                                                Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                ';
							}
							else{
								echo '
                                <li>
                                    <a href = "" data-toggle="modal" data-target="#modalLogar" >
                                        <span class="glyphicon glyphicon-log-in">
                                        </span>
                                        Admin
                                    </a>
                                </li>';
                            }
						?>
					</ul>
                </div>
            </div>
        </nav>
        <?php
            include 'modal.php';
			include 'login.php';
        ?>
	</body>
</html>

<script>

$("#logOut").click(function(){
    logout();
});

</script>