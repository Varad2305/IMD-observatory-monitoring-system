<html>
<head>
	<title>Image Upload with AJAX, PHP and MYSQL Live Demo - Hyvor Developer</title>
</head>
<body>
<form onsubmit="submitForm(event);">
	<input type="file" name="image" id="image-selecter" accept="image/*">
	<input type="submit" name="submit" value="Upload Image">
</form>
<div id="uploading-text" style="display:none;">Uploading...</div>
<img id="preview">
<script type="text/javascript">
var previewImage = document.getElementById("preview"),	
	uploadingText = document.getElementById("uploading-text")

function submitForm(event) {
	// prevent default form submission
	event.preventDefault();
	uploadImage();
}
function uploadImage() {
	var imageSelecter = document.getElementById("image-selecter"),
		file = imageSelecter.files[0];

	if (!file) 
		return alert("Please select a file");

	// clear the previous image
	previewImage.removeAttribute("src");
	// show uploading text
	uploadingText.style.display = "block";

	// create form data and append the file
	var	formData = new FormData();
	formData.append("image", file);

	// do the ajax part
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			var json = JSON.parse(this.responseText);
			if (!json || json.status !== true) 
				return uploadError(json.error);

			showImage(json.url);
		}
	}
	ajax.open("POST", "upload.php", true);
	ajax.send(formData); // send the form data
}
function uploadError(error) {
	// called on error
	alert(error || 'Something went wrong');
}
function showImage(url) {
	previewImage.src = url;
	uploadingText.style.display = "none";
}
</script>
</body>
</html>