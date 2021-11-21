<div class="conteudoFull">
		<div class="squad-adm">
			<div class="squad-adm-info">
				<div class="icone-adm">
					<?php 
					use Source\Class\MysqlCRUD; 
					$mysql = new MysqlCRUD();
					$comandoIMG = $mysql->selectFromDB(['ds_PathImg'], 'Usuarios', 'WHERE cd_Usuario = ?', [$_SESSION["codigo"]]);
					$resultado = $comandoIMG->fetchAll(PDO::FETCH_ASSOC);
					if(count($resultado) != 0) {
						foreach ($resultado as $resultado) {
							echo "<img id='imgADM' src='".PATH_LINKS.'/assets/'.$resultado["ds_PathImg"]."'>";
						}
					}
					?>
				</div>
				<span>
					<?php 
					$comando = $mysql->selectFromDB(['nm_Usuario'], 'Usuarios', 'WHERE cd_Usuario = ?', [$_SESSION["codigo"]]);
					$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
					if(count($resultado) != 0) {
						foreach ($resultado as $resultado) {
							echo $resultado["nm_Usuario"];
						}
					}
					?>
				</span>
				<div id="oi"><i class="fas fa-chevron-right altera"></i></div>
			</div>

			<div class="sub-menu-adm">
		        <div><a href="<?php echo PATH_LINKS;?>/view/pages/painelUpdateUsuarios.php" class="sub-item-adm"><i class="fas fa-address-card"></i>Minha conta</a></div>
		        <div><a href="<?php echo PATH_LINKS;?>/view/pages/painelUpdateSenha.php" class="sub-item-adm"><i class="fas fa-shield-alt"></i>Trocar senha</a></div>
		    </div>

		</div>
</div>