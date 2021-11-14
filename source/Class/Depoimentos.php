<?php  
namespace Source\Class;

use PDO;
use Source\Class\MysqlCRUD;

class Depoimentos
{
	private $cd_depoimento;
	private $nm_depoimento;
	private $ds_depoimento;
	private $ds_imagem_depoimento;

	public function set_cd_depoimento($cd_depoimento) {
		$this->cd_depoimento = $cd_depoimento;
	}

	public function set_nm_depoimento($nm_depoimento) {
		$this->nm_depoimento = $nm_depoimento;
	}

	public function set_ds_depoimento($ds_depoimento) {
		$this->ds_depoimento = $ds_depoimento;
	}

	public function set_ds_imagem_depoimento($ds_imagem_depoimento) {
		$this->ds_imagem_depoimento = $ds_imagem_depoimento;
	}

	public function listarDepoimento() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDb(['*'], 'depoimentos');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_Depoimento'] . "</td>";
				echo "<td>" . $resultado['ds_Depoimento'] . "</td>";
				echo "<td>" . "<img src='".PATH_LINKS.'/assets/images/'.$resultado["ds_PathImg"]."' width='150px' height='100px'>" . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdateDepoimentos.php?u=" . $resultado["cd_Depoimento"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";

				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_Depoimento"]."' class='"."btn-exclui-depoimento"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";

				echo "<tr>";
			}
		}
	}

	public function formEditDepoimento($u) {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDB(['*'], 'Depoimentos', 'WHERE cd_Depoimento = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_depoimento' id='nm_depoimento' value='".$resultado['nm_Depoimento']."' required>";
				echo "</div>";

				echo "<div>";
				echo "<label for='descricao'>" . "DESCRIÇÃO:" . "</label>";
				echo "<input type='text' name='ds_depoimento' id='ds_depoimento' value='".$resultado['ds_Depoimento']."' required>";
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

	public function criarDepoimento() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->insertOnDB('Depoimentos',['nm_Depoimento','ds_Depoimento','ds_PathImg'],[$this->nm_depoimento, $this->ds_depoimento, $this->ds_imagem_depoimento]);
		

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

	public function excluirDepoimento($d) {
		$mysql = new MysqlCRUD();

		$comando = $mysql->deleteFromDB('depoimentos','cd_Depoimento = ? LIMIT 1',[$d]);

		

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

	public function editarDepoimento($u) {

		$mysql = new MysqlCRUD();

		$comando = $mysql->updateOnDB('depoimentos','nm_Depoimento = ?, ds_Depoimento = ?, ds_PathImg = ?','cd_Depoimento = ?', [$this->nm_depoimento, $this->ds_depoimento,$this->ds_imagem_depoimento,$u]);

		

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