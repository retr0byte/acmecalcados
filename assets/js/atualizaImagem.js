function readURL(input) {
	var reader = new FileReader();

	reader.onload = function (e) {
		$('#file_upload').attr('src', e.target.result);
	};
	reader.readAsDataURL(input.files[0]);
}
		