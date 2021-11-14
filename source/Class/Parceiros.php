<?php  
namespace Source\Class;

use PDO;
use Source\Class\MysqlCRUD;

class Parceiros
{
	private $cd_parceiro;
	private $nm_parceiro;
	private $ds_imagem_parceiro;

	public function set_cd_parceiro($cd_parceiro) {
		$this->cd_parceiro = $cd_parceiro;
	}

	public function set_nm_parceiro($nm_parceiro) {
		$this->nm_parceiro = $nm_parceiro;
	}

	public function set_ds_imagem_parceiro($ds_imagem_parceiro) {
		$this->ds_imagem_parceiro = $ds_imagem_parceiro;
	}

	public function listarParceiro() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDb(['*'], 'parceiros');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_Parceiro'] . "</td>";

				echo "<td>" . "<img src='".PATH_LINKS.'/assets/images/'.$resultado["ds_PathImg"]."' width='150px' height='100px'>" . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdateParceiros.php?u=" . $resultado["cd_Parceiro"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";

				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_Parceiro"]."' class='"."btn-exclui-parceiro"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";

				echo "<tr>";
			}
		}
	}

	public function formEditParceiro($u) {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDB(['*'], 'Parceiros', 'WHERE cd_Parceiro = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_parceiro' id='nm_parceiro' value='".$resultado['nm_Parceiro']."' required>";

				echo "</div>";
				echo "</div>";

				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='imagem'>" . "IMAGEM:" . "</label>";
				echo "<input type='file' name='ds_PathImg' id='ds_PathImg' required>";
				echo "</div>";
				echo "</div>";
			}
		}
	}

	public function criarParceiro() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->insertOnDB('Parceiros',['nm_Parceiro','ds_PathImg'],[$this->nm_parceiro, $this->ds_imagem_parceiro]);
		

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

	public function excluirParceiro($d) {
		$mysql = new MysqlCRUD();

		$comando = $mysql->deleteFromDB('parceiros','cd_Parceiro = ? LIMIT 1',[$d]);

		

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

	public function editarParceiro($u) {

		$mysql = new MysqlCRUD();

		$comando = $mysql->updateOnDB('parceiros','nm_Parceiro = ?, ds_PathImg = ?','cd_Parceiro = ?', [$this->nm_parceiro, $this->ds_imagem_parceiro,$u]);

		

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