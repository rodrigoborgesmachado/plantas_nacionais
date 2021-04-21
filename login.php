<!DOCTYPE html>
<html lang="pt-br">
    <body>
        <div class="modal fade" id="modalLogar" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content" size="480px">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"></h4>
                    </div>	
                    <div class="modal-body">
                        Login:
                        <br>
                        <div class="input-group floating-label">
                            <input class="form-control valid" data-val="true"  data-val-length-max="50" data-val-required="* Campo obrigatório!!" id="UserLogin" name="UserLogin" placeholder="" type="text" value="" required>
                            <span class="validationMessage field-validation-valid" data-valmsg-for="UserLogin" data-valmsg-replace="true">
                            </span>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </div>
                        Senha:
                        <br>
                        <div class="input-group floating-label">
                            <input class="form-control" data-val="true" data-val-required="* Campo obrigatório!!" id="UserPassword" name="UserPassword" placeholder="" type="password" required>
                            <span class="field-validation-valid validationMessage" data-valmsg-for="UserPassword" data-valmsg-replace="true">
                            </span>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                        </dvi>
                    </div>
                    <div class="modal-footer">
                        <button value="Login" id="logar" onclick="loga()" class="btn btn-info">Login</button>
                    </div>
				</div>
			</div>
		</div>
        </div>
    </body>
</html>

<script>
    function loga(){
        document.getElementById('logar').disabled = true;

        var login = document.getElementById('UserLogin').value;
        var password = document.getElementById('UserPassword').value;
        var user = RealizaLogin(login, password);
    }

    function logout(){
        RealizaDeslog();
    }

</script>
