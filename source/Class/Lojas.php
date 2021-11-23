<?php  
namespace Source\Class;

use PDO;
use Source\Class\MysqlCRUD;

class Lojas
{
	private $cd_loja;
	private $nm_loja;
	private $ds_endereco;
	private $cd_telefone;
	private $cd_celular;

	public function set_cd_loja($cd_loja) {
		$this->cd_loja = $cd_loja;
	}

	public function set_nm_loja($nm_loja) {
		$this->nm_loja = $nm_loja;
	}

	public function set_ds_endereco($ds_endereco) {
		$this->ds_endereco = $ds_endereco;
	}
	public function set_cd_telefone($cd_telefone) {
		$this->cd_telefone = $cd_telefone;
	}

	public function set_cd_celular($cd_celular) {
		$this->cd_celular = $cd_celular;
	}

	public function listarLoja() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDb(['*'], 'lojas');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_Loja'] . "</td>";

				echo "<td>" . $resultado['ds_Endereco'] . "</td>";

				echo "<td>" . $resultado['cd_Telefone'] . "</td>";

				echo "<td>" . $resultado['cd_Celular'] . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdateLojas.php?u=" . $resultado["cd_Loja"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";

				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_Loja"]."' class='"."btn-exclui-loja"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";

				echo "<tr>";
			}
		}
	}

	public function formEditLoja($u) {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDB(['*'], 'Lojas', 'WHERE cd_Loja = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_loja' id='nm_loja' value='".$resultado['nm_Loja']."' required>";
				echo "</div>";
				echo "</div>";

				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='endereco'>" . "ENDERECO:". "</label>";
				echo "<input type='text' name='ds_endereco' id='ds_endereco' value='".$resultado['ds_Endereco']."' required>";
				echo "</div>";
				echo "</div>";

			
				echo "<div class='box-form-geral'>";
				echo "<div>";

				echo "<label for='telefone'>" . "TELEFONE:". "</label>";
				echo "<input type='text' name='cd_telefone' id='cd_telefone' class='masc_loja' value='".$resultado['cd_Telefone']."' required>";

				echo "</div>";

				echo "<div>";

				echo "<label for='celular'>" . "CELULAR:". "</label>";
				echo "<input type='text' name='nm_celular' id='cd_celular' class='masc_loja' value='".$resultado['cd_Celular']."' required>";

				echo "</div>";
				echo "</div>";
			}
		}
	}

	public function criarLoja() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->insertOnDB('Lojas',['nm_Loja','ds_Endereco', 'cd_Telefone', 'cd_Celular'],[$this->nm_loja, $this->ds_endereco, $this->cd_telefone, $this->cd_celular]);
		

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

	public function excluirLoja($d) {
		$mysql = new MysqlCRUD();

		$comando = $mysql->deleteFromDB('lojas','cd_Loja = ? LIMIT 1',[$d]);

		

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

	public function editarLoja($u) {

		$mysql = new MysqlCRUD();

		$comando = $mysql->updateOnDB('lojas','nm_Loja = ?, ds_Endereco = ?, cd_Telefone = ?, cd_Celular = ?','cd_Loja = ?', [$this->nm_loja, $this->ds_endereco, $this->cd_telefone, $this->cd_celular,$u]);

		

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