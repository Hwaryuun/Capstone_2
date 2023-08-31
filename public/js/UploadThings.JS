const input = document.getElementById("uploading")
const text = document.getElementById("texto")
const btns = document.getElementById("uploading-btn")   

input.addEventListener("change", () => {
   const path = input.value.split('\\')
   const filename = path[path.length - 1]

   text.innerText = filename ? filename : "Choose file"

   if(filename)
       btns.classList.add("chosen")
   else
       btns.classList.remove("chosen")

})