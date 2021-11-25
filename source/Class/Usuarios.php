<?php  
namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

class Usuarios
{
	private $cd_usuario;
	private $nm_usuario;
	private $nm_acesso;
	private $ds_senha;
	private $ds_imagem_usuario;
	private $ds_imagem_promocao_abs;

	public function set_cd_usuario($cd_usuario) {
		$this->cd_usuario = $cd_usuario;
	}

	public function set_nm_usuario($nm_usuario) {
		$this->nm_usuario = $nm_usuario;
	}

	public function set_nm_acesso($nm_acesso) {
		$this->nm_acesso = $nm_acesso;
	}

	public function set_ds_senha($ds_senha) {
		$this->ds_senha = $ds_senha;
	}

	public function set_ds_imagem_usuario($ds_imagem_usuario) {
		$this->ds_imagem_usuario = $ds_imagem_usuario;
	}

	public function set_ds_imagem_usuario_abs($ds_imagem_usuario_abs) {
		$this->ds_imagem_usuario_abs = $ds_imagem_usuario_abs;
	}

	public function formEditUsuario($u) {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDB(['*'], 'Usuarios', 'WHERE cd_usuario = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:" . "</label>";
													
				echo "<input type='text' name='nm_usuario' value='".$resultado['nm_usuario']."' id='nm_usuario' required>";
				echo "</div>";
								
				echo "<div>";
				echo "<label for='nm_acesso'>" . "NOME DE USUARIO:" . "</label>";
													
				echo "<input type='text' name='nm_acesso' value='".$resultado['nm_acesso']."' id='nm_acesso' required>";
				echo "</div>";
				echo "</div>";
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<img id='file_upload' src='".PATH_LINKS.'/assets/'.$resultado["ds_pathimg"]."'>";
				echo "</div>";
				echo "</div>";
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='ds_pathimg'>" . "NOVA IMAGEM?" . "</label>";
				echo "<input type='file' name='ds_pathimg' onchange='readURL(this)' id='ds_pathimg' required>";
				echo "</div>";
				echo "</div>";
			}
		}
	}


	public function editarUsuario($u) {

		$pgsql = new PostgreSqlCRUD();

		$getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'usuarios','WHERE cd_usuario = ?', [$u]);
        $accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->updateOnDB('usuarios','nm_usuario = ?, nm_acesso = ?, ds_pathimg = ?, ds_pathimgabsoluto = ?','cd_usuario = ?', [$this->nm_usuario, $this->nm_acesso , $this->ds_imagem_usuario,$this->ds_imagem_usuario_abs,$u]);

		

		if($comando) {
            unlink($pathImg);
			return [
				"status" => 200,
				"message" => "sucesso"
			];
		}
		else {
			return [
				"status" => 500,
				"message" => "erro"
			];
		}
	}

	public function formEditSenha($u) {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDB(['*'], 'Usuarios', 'WHERE cd_usuario = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nm_senha'>" . "SENHA ATUAL:" . "</label>";
													
				echo "<input type='password' name='nm_senha' value='".$resultado['ds_senha']."' id='nm_senha' required readonly>";
				echo "</div>";
				echo "</div>";
					
				echo "<div class='box-form-geral'>";			
				echo "<div>";
				echo "<label for='nm_senha_nova'>" . "NOVA SENHA:" . "</label>";
													
				echo "<input type='password' name='nm_senha_nova' id='nm_senha_nova' required>";
				echo "</div>";
				echo "</div>";

				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nm_senha_confirma'>" . "CONFIRMAÇÃO NOVA SENHA:" . "</label>";
													
				echo "<input type='password' name='nm_senha_confirma' id='nm_senha_confirma' required>";
				echo "</div>";
				echo "</div>";
			}
		}
	}

	public function editarSenha($u) {

		$pgsql = new PostgreSqlCRUD();

		$comando = $pgsql->updateOnDB('usuarios','ds_senha = ?','cd_usuario = ?', [$this->ds_senha,$u]);

		

		if($comando) {
			return [
				"status" => 200,
				"message" => "sucesso"
			];
		}
		else {
			return [
				"status" => 500,
				"message" => "erro"
			];
		}
	}
}


?>