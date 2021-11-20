<?php  
namespace Source\Class;

class UploadArquivos
{
	private $files;
	
	public function __construct($files) {
		$this->files = $files;
	}

	public function upload() {
		$ext = strtolower(substr($this->files[$this->nome_campo]['name'], -4));
		$novo_nome = "img" . time() . $ext;
		$diretorio = "/assets/images";
		$uploaded = move_uploaded_file($this->nome_campo ['tmp_name'],$diretorio.$novo_nome);

		if($uploaded) {
			return [
				'status' => 200,
				'message' => 'sucesso'
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