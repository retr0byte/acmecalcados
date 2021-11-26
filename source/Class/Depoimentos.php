<?php  
namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

class Depoimentos
{
	private $cd_depoimento;
	private $nm_depoimento;
	private $ds_depoimento;
	private $ds_imagem_depoimento;
	private $ds_imagem_depoimento_abs;

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

	public function set_ds_imagem_depoimento_abs($ds_imagem_depoimento_abs) {
		$this->ds_imagem_depoimento_abs = $ds_imagem_depoimento_abs;
	}

	public function listarDepoimento() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDb(['*'], 'depoimentos');
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<tr>";
				echo "<td>" . $resultado['nm_depoimento'] . "</td>";
				echo "<td>" . $resultado['ds_depoimento'] . "</td>";
				echo "<td>" . "<img src='".PATH_LINKS.'/assets/'.$resultado["ds_pathimg"]."' width='150px' height='100px'>" . "</td>";

				echo "<td>" . "<a href=".PATH_LINKS."'/view/pages/painelUpdateDepoimentos.php?u=" . $resultado["cd_depoimento"] . "' >" . '<i class="fas fa-pencil-alt"></i>' ."</a>" . "</td>";

				echo "<td>" . "<a href='#' deleteid='".$resultado["cd_depoimento"]."' class='"."btn-exclui-depoimento"."' >" . '<i class="fas fa-trash-alt"></i>' ."</a>" . "</td>";

				echo "<tr>";
			}
		}
	}

	public function formEditDepoimento($u) {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->selectFromDB(['*'], 'Depoimentos', 'WHERE cd_depoimento = ?', [$u]);
		$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
		if(count($resultado) != 0) {
			foreach ($resultado as $resultado) {
				echo "<div class='box-form-geral'>";
				
				echo "<div>";
				echo "<label for='nome'>" . "NOME:". "</label>";
				echo "<input type='text' name='nm_depoimento' id='nm_depoimento' value='".$resultado['nm_depoimento']."' required>";
				echo "</div>";

				echo "<div>";
				echo "<label for='descricao'>" . "DESCRIÇÃO:" . "</label>";
				echo "<input type='text' name='ds_depoimento' id='ds_depoimento' value='".$resultado['ds_depoimento']."' required>";
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

	public function criarDepoimento() {
		$pgsql = new PostgreSqlCRUD();
		$comando = $pgsql->insertOnDB('Depoimentos',['nm_depoimento','ds_depoimento','ds_pathimg', 'ds_pathimgabsoluto'],[$this->nm_depoimento, $this->ds_depoimento, $this->ds_imagem_depoimento, $this->ds_imagem_depoimento_abs]);
		

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
		$pgsql = new PostgreSqlCRUD();

		$getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'depoimentos','WHERE cd_depoimento = ?', [$d]);
        $accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->deleteFromDB('depoimentos','cd_depoimento = ?',[$d]);

		
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

	public function editarDepoimento($u) {

		$pgsql = new PostgreSqlCRUD();

		$getPathImg = $pgsql->selectFromDB(['ds_pathimgabsoluto'],'depoimentos','WHERE cd_depoimento = ?', [$u]);
		$accessPathImg = $getPathImg->fetchAll(PDO::FETCH_ASSOC);
        $pathImg = $accessPathImg[0]['ds_pathimgabsoluto'];

		$comando = $pgsql->updateOnDB('depoimentos','nm_depoimento = ?, ds_depoimento = ?, ds_pathimg = ?, ds_pathimgabsoluto = ?','cd_depoimento = ?', [$this->nm_depoimento, $this->ds_depoimento,$this->ds_imagem_depoimento,$this->ds_imagem_depoimento_abs,$u]);

		

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