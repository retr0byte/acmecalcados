<?php  
namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

class Promocoes
{
	private $cd_promocao;
	private $nm_promocao;
	private $vl_promocao;
	private $ds_imagem_promocao;
	private $ds_imagem_promocao_abs;

	public function set_cd_promocao($cd_promocao) {
		$this->cd_promocao = $cd_promocao;
	}

	public function get_cd_promocao() {
		return $this->cd_promocao;
	}

	public function set_nm_promocao($nm_promocao) {
		$this->nm_promocao = $nm_promocao;
	}

	public function get_nm_promocao() {
		return $this->nm_promocao;
	}

	public function set_vl_promocao($vl_promocao) {
		$this->vl_promocao = $vl_promocao;
	}

	public function get_vl_promocao() {
		return $this->vl_promocao;
	}

	public function set_ds_imagem_promocao($ds_imagem_promocao) {
		$this->ds_imagem_promocao = $ds_imagem_promocao;
	}

	public function get_ds_imagem_promocao() {
		return $this->ds_imagem_promocao;
	}

    public function set_ds_imagem_promocao_abs($ds_imagem_promocao_abs) {
		$this->ds_imagem_promocao_abs = $ds_imagem_promocao_abs;
	}

	public function get_ds_imagem_promocao_abs() {
		return $this->ds_imagem_promocao_abs;
	}

	public function listarPromocao() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDb(['*'], 'promocoes');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_promocao'] . "</td>";
				echo "<td>" . "R$ " . $resultado['vl_promocao'] . "</td>";
				echo "<td>" . "<img src='".PATH_LINKS.'/assets/'.$resultado["ds_pathimg"]."' width='150px' height='100px'>" . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdatePromocoes.php?u=" . $resultado["cd_promocao"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";



				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_promocao"]."' class='"."btn-exclui-promocao"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";


				echo "</tr>";
			}
		}
	}

	public function formEditPromocao($u) {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDB(['*'], 'Promocoes', 'WHERE cd_promocao = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_promocao' id='nm_promocao' value='".$resultado['nm_promocao']."' required>";
				echo "</div>";

				echo "<div>";
				echo "<label for='preco'>" . "PREÇO:" . "</label>";
				echo "<input type='text' name='vl_promocao' id='vl_promocao' value='".$resultado['vl_promocao']."' required>";
				echo "</div>";
				echo "</div>";

				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<img id='file_upload' src='".PATH_LINKS.'/assets/'.$resultado["ds_pathimg"]."'>";
				echo "</div>";
				echo "</div>";

				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='imagem'>" . "IMAGEM:" . "</label>";
				echo "<input type='file' name='ds_pathimg' onchange='readURL(this)' id='ds_pathimg' required>";
				echo "</div>";
				echo "</div>";
			}
		}
	}

	public function criarPromocao() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->insertOnDB('promocoes',['nm_promocao','vl_promocao','ds_pathimg', 'ds_pathimgabsoluto'],[$this->nm_promocao, $this->vl_promocao, $this->ds_imagem_promocao, $this->ds_imagem_promocao_abs]);
		

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
		$pgsql = new PostgreSqlCRUD();

        $getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'promocoes','WHERE cd_promocao = ?', [$d]);
        $accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->deleteFromDB('promocoes','cd_promocao = ?',[$d]);

        unlink($pathImg);

		// verificar quando conseguir excluir um e não o outro;

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

		$pgsql = new PostgreSqlCRUD();

        $getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'promocoes','WHERE cd_promocao = ?', [$u]);
        $accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->updateOnDB('promocoes','nm_promocao = ?, vl_promocao = ?, ds_pathimg = ?, ds_pathimgabsoluto = ?','cd_promocao = ?', [$this->nm_promocao, $this->vl_promocao,$this->ds_imagem_promocao, $this->ds_imagem_promocao_abs,$u]);

		

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

}

?>