<?php  
namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

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
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDb(['*'], 'lojas');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_loja'] . "</td>";

				echo "<td>" . $resultado['ds_endereco'] . "</td>";

				echo "<td>" . $resultado['cd_telefone'] . "</td>";

				echo "<td>" . $resultado['cd_celular'] . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdateLojas.php?u=" . $resultado["cd_loja"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";

				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_loja"]."' class='"."btn-exclui-loja"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";

				echo "<tr>";
			}
		}
	}

	public function formEditLoja($u) {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDB(['*'], 'Lojas', 'WHERE cd_loja = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_loja' id='nm_loja' value='".$resultado['nm_loja']."' required>";
				echo "</div>";
				echo "</div>";

				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='endereco'>" . "ENDERECO:". "</label>";
				echo "<input type='text' name='ds_endereco' id='ds_endereco' value='".$resultado['ds_endereco']."' required>";
				echo "</div>";
				echo "</div>";

			
				echo "<div class='box-form-geral'>";
				echo "<div>";

				echo "<label for='telefone'>" . "TELEFONE:". "</label>";
				echo "<input type='text' name='cd_telefone' id='cd_telefone' class='masc_loja' value='".$resultado['cd_telefone']."' required>";

				echo "</div>";

				echo "<div>";

				echo "<label for='celular'>" . "CELULAR:". "</label>";
				echo "<input type='text' name='nm_celular' id='cd_celular' class='masc_loja' value='".$resultado['cd_celular']."' required>";

				echo "</div>";
				echo "</div>";
			}
		}
	}

	public function criarLoja() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->insertOnDB('Lojas',['nm_loja','ds_endereco', 'cd_telefone', 'cd_celular'],[$this->nm_loja, $this->ds_endereco, $this->cd_telefone, $this->cd_celular]);
		

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
		$pgsql = new PostgreSqlCRUD();

		$comando = $pgsql->deleteFromDB('lojas','cd_loja = ?',[$d]);

		

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

		$pgsql = new PostgreSqlCRUD();

		$comando = $pgsql->updateOnDB('lojas','nm_loja = ?, ds_endereco = ?, cd_telefone = ?, cd_celular = ?','cd_loja = ?', [$this->nm_loja, $this->ds_endereco, $this->cd_telefone, $this->cd_celular,$u]);

		

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