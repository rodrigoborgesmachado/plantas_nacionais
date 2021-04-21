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
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                            </h4>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
			    </div>
            </div>
		</div>
    </body>
</html>
