function previewImage(file) 
{
    var input = file.target;	
    var reader = new FileReader();
    reader.readAsDataURL(input.files[0]);
    reader.onload = function()
    {
      var dataURL = reader.result;
      var output = document.getElementById('preview');
      output.src = dataURL;
   };
   reader.readAsDataURL(input.files[0]);
}