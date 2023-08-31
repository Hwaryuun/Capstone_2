function previewBeforeUpload2(id){
    document.querySelector("#"+id).addEventListener("change",function(e){
        if(e.target.files.length == 0){
        return;
        }
        let filex = e.target.files[0];
        let urlx = URL.createObjectURL(filex);
        document.querySelector("#"+id+"-preview div").innerText = filex.name;
        document.querySelector("#"+id+"-preview model-viewer").src = urlx;

    });
    }


    previewBeforeUpload2("file-3d")
