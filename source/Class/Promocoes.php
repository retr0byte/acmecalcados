<?php  
namespace Source\Class;

use PDO;
use Source\Class\MysqlCRUD;

class Promocoes
{
	private $cd_promocao;
	private $nm_promocao;
	private $vl_promocao;
	private $ds_imagem_promocao;

	public function set_cd_promocao($cd_promocao) {
		$this->cd_promocao = $cd_promocao;
	}

	public function get_cd_promocao() {
		return $this->$cd_promocao;
	}

	public function set_nm_promocao($nm_promocao) {
		$this->nm_promocao = $nm_promocao;
	}

	public function get_nm_promocao() {
		return $this->$nm_promocao;
	}

	public function set_vl_promocao($vl_promocao) {
		$this->vl_promocao = $vl_promocao;
	}

	public function get_vl_promocao() {
		return $this->$vl_promocao;
	}

	public function set_ds_imagem_promocao($ds_imagem_promocao) {
		$this->ds_imagem_promocao = $ds_imagem_promocao;
	}

	public function get_ds_imagem_promocao() {
		return $this->$ds_imagem_promocao;
	}

	public function listarPromocao() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDb(['*'], 'promocoes');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_Promocao'] . "</td>";
				echo "<td>" . "R$ " . $resultado['vl_Promocao'] . "</td>";
				echo "<td>" . "<img src='".PATH_LINKS.'/assets/images/'.$resultado["ds_PathImg"]."' width='150px' height='100px'>" . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdatePromocoes.php?u=" . $resultado["cd_Promocao"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";



				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_Promocao"]."' class='"."btn-exclui-promocao"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";


				echo "<tr>";
			}
		}
	}

	public function formEditPromocao($u) {
		$mysql = new MysqlCRUD();
		$comando = $mysql->selectFromDB(['*'], 'Promocoes', 'WHERE cd_Promocao = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_promocao' id='nm_promocao' value='".$resultado['nm_Promocao']."' required>";
				echo "</div>";

				echo "<div>";
				echo "<label for='preco'>" . "PREÇO:" . "</label>";
				echo "<input type='text' name='vl_promocao' id='vl_promocao' value='".$resultado['vl_Promocao']."' required>";
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

	public function criarPromocao() {
		$mysql = new MysqlCRUD();
		$comando = $mysql->insertOnDB('Promocoes',['nm_Promocao','vl_Promocao','ds_PathImg'],[$this->nm_promocao, $this->vl_promocao, $this->ds_imagem_promocao]);
		

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

	public function excluirPromocao($d) {
		$mysql = new MysqlCRUD();

		$comando = $mysql->deleteFromDB('promocoes','cd_Promocao = ? LIMIT 1',[$d]);

		

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

	public function editarPromocao($u) {

		$mysql = new MysqlCRUD();

		$comando = $mysql->updateOnDB('promocoes','nm_Promocao = ?, vl_Promocao = ?, ds_PathImg = ?','cd_Promocao = ?', [$this->nm_promocao, $this->vl_promocao,$this->ds_imagem_promocao,$u]);

		

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