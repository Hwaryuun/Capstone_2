
function previewBeforeUpload(id){
  document.querySelector("#"+id).addEventListener("change",function(e){
    if(e.target.files.length == 0){
      return;
    }
    let file = e.target.files[0];
    let url = URL.createObjectURL(file);
    document.querySelector("#"+id+"-preview div").innerText = file.name;
    document.querySelector("#"+id+"-preview img").src = url;

  });
}

previewBeforeUpload("file-1")
previewBeforeUpload("file-2")

// 3d generated-----------------------------------------------------





/*


const wrapper = document.querySelector(".wrapper");
const fileName = document.querySelector(".file-name");
const defaultBtn = document.querySelector("#default-btn");
const customBtn = document.querySelector("#custom-btn");
const cancelBtn = document.querySelector("#cancel-btn i");
const img = document.querySelector("img");
let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
function defaultBtnActive(){
  defaultBtn.click();
}
defaultBtn.addEventListener("change", function(){
  const file = this.files[0];
  if(file){
    const reader = new FileReader();
    reader.onload = function(){
      const result = reader.result;
      img.src = result;
      wrapper.classList.add("active");
    }
    cancelBtn.addEventListener("click", function(){
      img.src = "";
      wrapper.classList.remove("active");
    })
    reader.readAsDataURL(file);
  }
  if(this.value){
    let valueStore = this.value.match(regExp);
    fileName.textContent = valueStore;
  }
});

const wrappers = document.querySelector(".wrappers");
const fileNames = document.querySelector(".file-names");
const defaultBtns = document.querySelector("#default-btns");
const customBtns = document.querySelector("#custom-btns");
const cancelBtns = document.querySelector("#cancel-btns i");
const imgs = document.querySelector(".imgs");
let regExps = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
function defaultBtnActiveS(){
  defaultBtns.click();
}
defaultBtns.addEventListener("change", function(){
  const file = this.files[0];
  if(file){
    const reader = new FileReader();
    reader.onload = function(){
      const result = reader.result;
      imgs.src = result;
      wrappers.classList.add("active");
    }
    cancelBtns.addEventListener("click", function(){
      imgs.src = " ";
      wrappers.classList.remove("active");
    })
    reader.readAsDataURL(file);
  }
  if(this.value){
    let valueStore = this.value.match(regExps);
    fileNames.textContent = valueStore;
  }
});
*/