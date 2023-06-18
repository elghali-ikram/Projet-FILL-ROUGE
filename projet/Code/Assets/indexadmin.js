
$(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit(); // Submit the form
    }
  });
  $('#myForm').validate({
    rules: {
          name: {
            required: true,
          },
          price: {
            required: true,
          },
          description: {
            required: true,
          },
          category: {
            required: true,
          },
          'size[]': {
            required: true,
          },
          'color[]': {
            required: true,
          },
    },
    messages: {
          name:  {
            required: 'Please enter a name',
          },
          price:  {
            required:'Please enter a price',
          },
          description: {
            required:  'Please enter a description',
          },
          category:  {
            required: 'Please select a category',
          },
          'size[]':  {
            required: 'Please select a size',
          },
          'color[]':  {
            required: 'Please select a color',
          },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
     //Initialize Select2 Elements
     $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  //Bootstrap Duallistbox
  $('.duallistbox').bootstrapDualListbox()

  //Colorpicker
  $('.my-colorpicker1').colorpicker()
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  $('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
  })

  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })
});
// VALIDATION FORM SIGN IN
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        form.submit(); // Submit the form
      }
    });
    $('#quickForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  // test

    // add images for anounce
    const imageInput = document.querySelector("#image-input");
    const image = document.querySelector("#images");
    let files_add = [];
    imageInput.addEventListener("change", function(event) {
      const array=Array.from(event.target.files);
      console.log(array);
      for (let i = 0; i < array.length; i++) {
        files_add.push( array[i]);
      }
      for (let i = 0; i < this.files.length; i++) {
        const file=this.files[i];
        if (file) {
          const reader = new FileReader();
          reader.addEventListener("load", function() {
            image.innerHTML+=` 
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
      for (let i = 0; i < files_add.length; i++) 
      {
          newFiles.items.add(files_add[i]);
      }    
      imageInput.files = newFiles.files
    });
   // add images for anounce
   const imageInputupdat = document.querySelectorAll(".rectangle_updat input[type='file']");
for (let i = 0; i < imageInputupdat.length; i++) {
  console.log(imageInputupdat[i]);
  const parent = imageInputupdat[i].closest(".formvalid");
  const imageupdat = parent.querySelector(".imagesupdat");
  let files_updat = [];
  imageInputupdat[i].addEventListener("change", function(event) {
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
    imageInputupdat[i].files = newFiles.files
  });

  
}  
 const imageupdat = document.querySelector(".imagesupdat");


    // // remove image add from files
    function remove(icon) {
          const iconparent=icon.closest(".image");
          console.log(iconparent);
          const file_input_parent=iconparent.closest(".formvalid")
          console.log(file_input_parent);
          const file_input=file_input_parent.querySelector("input[type='file']");
          console.log(files_add);
            const indexToRemove = Array.from(image.children).indexOf(iconparent);
            files_add.splice(indexToRemove, 1);
          console.log(files_add);
           const newFiles = new DataTransfer();
           for (let i = 0; i < files_add.length; i++) 
           {
               newFiles.items.add(files_add[i]);
           }    
           file_input.files = newFiles.files
           console.log(file_input.files);
          iconparent.remove();
        }
//     // remove image updatproduct
//     // function removeupdat(icon) {
//     //   const iconparent=icon.closest(".imageupdat");
//     //   console.log(iconparent);
//     //   const file_input_parent=iconparent.closest(".formvalid")
//     //   console.log(file_input_parent);
//     //   const file_input=file_input_parent.querySelector("input[type='file']");
//     //   console.log(files_add);
//     //     const indexToRemove = Array.from(image.children).indexOf(iconparent);
//     //     files_add.splice(indexToRemove, 1);
//     //   console.log(files_add);
//     //    const newFiles = new DataTransfer();
//     //    for (let i = 0; i < files_add.length; i++) 
//     //    {
//     //        newFiles.items.add(files_add[i]);
//     //    }    
//     //    file_input.files = newFiles.files
//     //    console.log(file_input.files);
//     //   iconparent.remove();
//     // }