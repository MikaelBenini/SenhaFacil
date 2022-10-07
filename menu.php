<?php
$title = 'Senha Fácil - Menu';
require_once 'header.php';
?>
<div class="container">
	<div class="area-cabecalho">
		<div id="area-logo">
			<a href="index">
				<h4 class="verde">SENHA <span class="branco">FÁCIL</span> </h4>
			</a>
		</div>

		<div class="showdesktop">
			<nav id="area-menu">
				<!-- <a href="index">Inicio</a>  Comentado para não apresentar Inicio, no Inicio-->
			</nav>
				<a class="buttonlogin" href="login">Login</a>
		</div>

		<div class="showmobile">
			<input id="menu-hamburguer" class="inputmenu" type="checkbox" />

			<label for="menu-hamburguer">
				<div class="menu">
					<span class="hamburguer"></span>
				</div>
			</label>
			<ul class="showmobile">
				<li><a href="index">Inicio</a></li>
				<!-- <li><a href="sobre.php">Quem Somos</a></li> -->
				<li><a href="login">Login</a></li>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<a href="termos">TERMOS DE USO</a>
			</ul>
		</div>
	</div>
</div>