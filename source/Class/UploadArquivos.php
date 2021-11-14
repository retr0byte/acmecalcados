<?php  
namespace Source\Class;

class UploadArquivos
{
	private $files;
	private $nome_campo;

	public function __construct($files, $nome_campo) {
		$this->files = $files;
		$this->nome_campo = $nome_campo;
	}

	public function upload() {
		$ext = strtolower(substr($this->files[$this->nome_campo]['name'], -4));
		$novo_nome = "img" . time() . $ext;
		$diretorio = "/assets/uploads";
		$uploaded = move_uploaded_file($this->files[$this->nome_campo] ['tmp_name'],$diretorio.$novo_nome);

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