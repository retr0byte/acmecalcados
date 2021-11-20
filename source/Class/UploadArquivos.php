<?php
namespace Source\Class;

class UploadArquivos
{
	private $files;
    private $pasta_dir = __DIR__."/../../assets/uploads/";

	public function __construct($files) {
		$this->files = $files;
	}

	public function upload() {
        $x = date("ii");
        $filename = md5($this->files["name"]) . 'acme-' . $x . '-' . $this->files["name"];
        $absolute_path = $this->pasta_dir . $filename;
        $relative_path = 'uploads/' . $filename;
        $file_ext = explode('.', $this->files["name"]);
        $file_ext = '.' . $file_ext[count($file_ext) - 1];

        $moveStatus = move_uploaded_file($this->files["tmp_name"], $absolute_path);

		if($moveStatus) {
			return [
				'status' => 200,
                "absolutePath" => $absolute_path,
                "relativePath" => $relative_path,
				'message' => 'sucesso'
			];

		} else {
			return [
				"status" => 500,
				"message" => "Não foi possível fazer o upload da imagem."
			];
		}
	}


}