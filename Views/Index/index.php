<div class="container">
	<div class="card card card-container">
		<h2 class="titleLogin">Inicia Sesi&oacute;n</h2>
		<form class="form-signin" id="sesion" name="sesion" method="POST">
			<input type="email" 
			       name="email" 
			       id="email" 
			       class="form-control"
			       placeholder="e-mail or user">
			<input type="password" 
			       name="passwd" 
			       id="passwd" 
			       class="form-control"
			       onblur="javascript:valida_acceso()" 
			       placeholder="Contraseña">
			<button type="button" 
			        class="btn btn-primary"
			        onclick="javascript:valida_acceso()" 
			        id="btnLogn">Iniciar Sesion</button>
		</form>
		<br>
		<br />
		<a href="Index/signIn">Registrarse</a>
	</div>
</div>

<script type="text/javascript">


	function valida_acceso(){
		var email= document.getElementById("email").value.trim();
		var passwd = document.getElementById("passwd").value.trim();
		var Controller_Method ="User/userLogin";

		if(email=="" || passwd=="")
		{
			alert("Datos requeridos Vacios");
		}else{
		$.ajax({
			type:"POST",
			url:"<?php echo URL;?>User/usuarioLogin",
			data:{email:email, passwd:passwd},
			success:function(response){
				if(response==1){
					document.location ="<?php echo URL;?>Principal/principal";
				}else{
					alert("Email o Contraseña Incorrectos");
				}
			}
		});
		
		}
	
	}


</script>