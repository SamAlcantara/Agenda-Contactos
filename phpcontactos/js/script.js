var contactoNombre = document.getElementById("nombre");
var contactoApellido= document.getElementById("apellido");
var contactoEmail= document.getElementById("email");
var contactoTelefono= document.getElementById("telefono");
var updateIndex;
if(localStorage.getItem("contactoList")==null){
   var contactoContainer=[];
}
else{
    contactoContainer=JSON.parse(localStorage.getItem("contactoList"));
    displayAllConts();
}


function addCont(){
    var contacto= {
        nombre:contactoNombre.value,
        apellido:contactoApellido.value,
        email:contactoEmail.value,
        telefono:contactoTelefono.value,
    }

    if(!validateCont(contacto)){
        return;
    }
    contactoContainer.push(contacto);
    clearForm();
    localStorage.setItem("contactoList",JSON.stringify(contactoContainer));
    console.log(contactoContainer);
    displayCont(contacto,contactoContainer.length-1);

}
function validateCont(contacto){

    let nombreRegex = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
    let apellidoRegex = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
    let emailRegex=/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let telefonoRegex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    let validForm=true;
    
   
    if(!nombreRegex.test(contacto.nombre)){

        document.getElementById("invalidNombre").innerHTML ="Nombre no v\u00e1lido ";
        validForm= false;
    }else {
        document.getElementById( "invalidNombre").innerHTML="";
    }
    if(!apellidoRegex.test(contacto.apellido)){
   
        document.getElementById("invalidApellido").innerHTML ="Apellido no v\u00e1lido ";
        validForm= false;
    }else {
        document.getElementById( "invalidApellido").innerHTML="";    }
    if(!emailRegex.test(contacto.email)){

        document.getElementById("invalidCate").innerHTML ="Email no v\u00e1lido";
        validForm= false;
    }else {
        document.getElementById( "invalidCate").innerHTML="";
    }
    if (!telefonoRegex.test(contacto.telefono)) {

        document.getElementById("invalidTel").innerHTML = "Tel\u00e9fono no v\u00e1lido";
        validForm = false;
    } else {
        document.getElementById("invalidTel").innerHTML = "";
    }

    
return validForm;
}
function clearForm(){
    contactoNombre.value="";
    contactoApellido.value="";
    contactoEmail.value="";
    contactoTelefono.value="";
}

function displayCont(contacto,index){
    document.getElementById("tableBody").innerHTML+=`
    <tr class="my-4"> 
    <td>
      `+index+`
    </td>
    <td>`+contacto.nombre+`</td>
    <td>`+contacto.apellido+`</td>
    <td>`+contacto.email+`</td>
    <td>`+contacto.telefono+`</td>
    <td><button class=" btn btn-outline-warning" onclick="updateButton(`+index+`)">Actualizar</button></td>
    <td><button class=" btn btn-outline-danger" onclick="deleteCont(`+ index +`)">Borrar</button></td>
   <td><button class=" btn btn-outline-success" onclick="doMail(`+ index +`)">Mensaje</button></td>
</tr>`
}

function updateButton(index){
    contactoNombre.value= contactoContainer[index].nombre;    
    contactoApellido.value= contactoContainer[index].apellido;
    contactoEmail.value= contactoContainer[index].email;
    contactoTelefono.value= contactoContainer[index].telefono;
    document.getElementById("cancelButton").style="display: inline-block !important;";
    document.getElementById("addButton").disabled=true;

    
    document.getElementById("updateButton").style="display: inline-block !important; ";
    updateIndex=index;
}

function cancelUpdate (){
    document.getElementById("cancelButton").style="display: none;";

    document.getElementById("updateButton").style="display: none;";
    document.getElementById("addButton").disabled=false;

    updateIndex=null;
    clearForm();

}
 function updateCont(){
    contactoContainer[updateIndex].nombre=contactoNombre.value;
    contactoContainer[updateIndex].apellido=contactoApellido.value;
    contactoContainer[updateIndex].email=contactoEmail.value;
    contactoContainer[updateIndex].telefono=contactoTelefono.value ;
    localStorage.setItem("contactoList",JSON.stringify(contactoContainer));   
    clearForm();
    cancelUpdate();
    displayAllConts();
 }
function displayAllConts(){

    var cartoona='';
    document.getElementById("tableBody").innerHTML='';
    for(var i=0;i<contactoContainer.length;i++){
        displayCont(contactoContainer[i], i);
    }
}


function deleteCont(index){
    contactoContainer.splice(index,1);
    localStorage.setItem("contactoList",JSON.stringify(contactoContainer));   
    displayAllConts();
}

function searchConts(temp){
    var cartoona='';
    for(var i=0;i<contactoContainer.length;i++){
        if(contactoContainer[i].nombre.toLowerCase().includes(temp.toLowerCase() )){
            var contacto=contactoContainer[i];
            cartoona+=`
    <tr class="my-4"> 
    <td>
      `+i+`
    </td>
    <td>`+contacto.nombre+`</td>
    <td>`+contacto.apellido+`</td>
    <td>`+contacto.email+`</td>
    <td>`+contacto.telefono+`</td>
    <td><button class=" btn btn-outline-warning" onclick="updateButton(`+i+`)">Update</button></td>
    <td><button class=" btn btn-outline-danger" onclick="deleteCont(`+ i +`)">delete</button></td>
   <td><button class=" btn btn-outline-success" onclick="doMail(`+ index +`)">Mensaje</button></td>
</tr>`
        }
    }
    document.getElementById("tableBody").innerHTML=cartoona;

    
}

function doMail() { 

    location.href = "mailto:"
}