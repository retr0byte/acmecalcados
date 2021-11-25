<?php  
namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

class Login
{
	private $nm_usuario;
	private $nm_senha;

	public function set_nm_usuario($nm_usuario) {
		$this->nm_usuario = $nm_usuario;
	}

	public function get_nm_usuario() {
		return $this->nm_usuario;
	}

	public function set_nm_senha($nm_senha) {
		$this->nm_senha = $nm_senha;
	}

	public function get_nm_senha() {
		return $this->nm_senha;
	}

	public function validaLogin() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDb(['cd_usuario'], 'Usuarios', 'WHERE nm_usuario = ? and ds_senha = ?', [$this->nm_usuario, $this->nm_senha]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				session_start();
				@$_SESSION["codigo"] = $resultado["cd_usuario"];
				$_SESSION["nome"] = $this->nm_usuario;
				$_SESSION["senha"] = $this->nm_senha;
				return [
					"status" => 200,
					"message" => "logado com sucesso"
				];
			}
			
		}
		else {
			return [
				"status" => 500,
				"message" => "Não foi possivel conectar"
			];
		}
	}

	public function sair() {
		session_start();
		session_destroy();
		return [
				"status" => 200,
				"message" => "saiu"
			];
	}
}


// final
?>
