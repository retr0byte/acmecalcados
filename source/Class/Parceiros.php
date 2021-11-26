<?php  
namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

class Parceiros
{
	private $cd_parceiro;
	private $nm_parceiro;
	private $ds_imagem_parceiro;
	private $ds_imagem_parceiro_abs;

	public function set_cd_parceiro($cd_parceiro) {
		$this->cd_parceiro = $cd_parceiro;
	}

	public function set_nm_parceiro($nm_parceiro) {
		$this->nm_parceiro = $nm_parceiro;
	}

	public function set_ds_imagem_parceiro($ds_imagem_parceiro) {
		$this->ds_imagem_parceiro = $ds_imagem_parceiro;
	}

	public function set_ds_imagem_parceiro_abs($ds_imagem_parceiro_abs) {
		$this->ds_imagem_parceiro_abs = $ds_imagem_parceiro_abs;
	}

	public function listarParceiro() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDb(['*'], 'parceiros');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_parceiro'] . "</td>";

				echo "<td>" . "<img src='".PATH_LINKS.'/assets/'.$resultado["ds_pathimg"]."' width='150px' height='100px'>" . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdateParceiros.php?u=" . $resultado["cd_parceiro"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";

				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_parceiro"]."' class='"."btn-exclui-parceiro"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";

				echo "<tr>";
			}
		}
	}

	public function formEditParceiro($u) {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDB(['*'], 'Parceiros', 'WHERE cd_parceiro = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_parceiro' id='nm_parceiro' value='".$resultado['nm_parceiro']."' required>";

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

	public function criarParceiro() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->insertOnDB('parceiros',['nm_parceiro','ds_pathimg', 'ds_pathimgabsoluto'],[$this->nm_parceiro, $this->ds_imagem_parceiro, $this->ds_imagem_parceiro_abs]);
		

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
		$pgsql = new PostgreSqlCRUD();

		$getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'parceiros','WHERE cd_parceiro = ?', [$d]);
        $accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->deleteFromDB('parceiros','cd_parceiro = ?',[$d]);

		unlink($pathImg);


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

		$pgsql = new PostgreSqlCRUD();


		$getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'parceiros','WHERE cd_parceiro = ?', [$u]);
        $accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->updateOnDB('parceiros','nm_parceiro = ?, ds_pathimg = ?, ds_pathimgabsoluto = ?','cd_parceiro = ?', [$this->nm_parceiro, $this->ds_imagem_parceiro, $this->ds_imagem_parceiro_abs,$u]);

		

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