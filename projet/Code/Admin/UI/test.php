<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/head.php';
include '../Includes/root.php';

?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

 <div class="form-group">
                      <label for="images">Gallery of images</label>
                      <div class="d-flex gap-2 flex-wrap m-3 formvalid">
                        <div class="d-flex flex-wrap gap-3 imagesupdat" id="images">
                          <!-- Image preview will be displayed here -->
                        </div>
                        <div class="rectangle_updat">
                          <label for="image-input" class="icon">
                            <i class="fa fa-plus"></i>
                          </label>
                          <input id="image-input" name="images[]" type="file" multiple>
                        </div>
                      </div>
                    </div>
    <!-- Content Header (Page header) -->
<script>
    // add images for anounce
    const imageInputupdat = document.querySelector(".rectangle_updat input[type='file']");
    const imageupdat = document.querySelector(".imagesupdat");
    let files_updat = [];
    imageInputupdat.addEventListener("change", function(event) {
      const array=Array.from(event.target.files);
      console.log(array);
      for (let i = 0; i < array.length; i++) {
        files_updat.push( array[i]);
      }
      for (let i = 0; i < this.files.length; i++) {
        const file=this.files[i];
        if (file) {
          const reader = new FileReader();
          reader.addEventListener("load", function() {
            imageupdat.innerHTML+=` 
            <div class="image">
            <img src="${this.result}" alt="Snow" style="width:90%;">
            <a class="top-right" onclick="remove(this)"><i class="fas fa-times-circle"></i>
            </a>
          </div>`
          });
          reader.readAsDataURL(file);
        }

      }
      const newFiles = new DataTransfer();
      for (let i = 0; i < files_updat.length; i++) 
      {
          newFiles.items.add(files_updat[i]);
      }    
      imageInputupdat.files = newFiles.files
    });
</script>




</div>

  <!-- /.navbar -->


 



      <!-- /.container-fluid -->

<?php
    include '../Includes/footer.php'
    ?>
</body>
</html>
