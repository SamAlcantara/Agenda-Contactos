<?php

session_start();


if (isset($_POST["logout"])) { unset($_SESSION["user"]); }


if (!isset($_SESSION["user"])) {
  header("Location: 1a-login.php");
  exit();
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
	<meta charset=”utf-8″ /> 
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4070f4" fill-opacity="1" d="M0,64L15,96C30,128,60,192,90,234.7C120,277,150,299,180,298.7C210,299,240,277,270,240C300,203,330,149,360,133.3C390,117,420,139,450,138.7C480,139,510,117,540,112C570,107,600,117,630,117.3C660,117,690,107,720,133.3C750,160,780,224,810,208C840,192,870,96,900,80C930,64,960,128,990,176C1020,224,1050,256,1080,229.3C1110,203,1140,117,1170,117.3C1200,117,1230,203,1260,240C1290,277,1320,267,1350,240C1380,213,1410,171,1425,149.3L1440,128L1440,0L1425,0C1410,0,1380,0,1350,0C1320,0,1290,0,1260,0C1230,0,1200,0,1170,0C1140,0,1110,0,1080,0C1050,0,1020,0,990,0C960,0,930,0,900,0C870,0,840,0,810,0C780,0,750,0,720,0C690,0,660,0,630,0C600,0,570,0,540,0C510,0,480,0,450,0C420,0,390,0,360,0C330,0,300,0,270,0C240,0,210,0,180,0C150,0,120,0,90,0C60,0,30,0,15,0L0,0Z"></path></svg>
    <div class="container">
    <style>
        .logout{
            display: flex;
            justify-content: right;
            margin: -50 20px;
        }
        </style>
    <div class="logout">
         <form method="post">           
            <input type="hidden"  name="logout" value="1"/>
            <input type="submit" class=" btn btn-danger " right; value="Salir"/>
        </form>
</div>
        <h1 class="text-center "> Agenda de <span class="localStorage"> Contactos </span> </h1>

        <div class="row">
            <div class="form-group my-4">
                <label for="nombre"> Nombre</label>
                <input type="text" id="nombre" class="form-control">
                <p id="invalidNombre" class="text-danger p-1  fw-bold"></p>
            </div>

            <div class="form-group my-4 ">
                <label for="apellido"> Apellido</label>
                <input type="text" id="apellido" class="form-control">
                <p id="invalidApellido" class="text-danger p-1 fw-bold"></p>
            </div>

            <div class="form-group my-4">
                <label for="nombre"> Email</label>
                <input type="text" id="email" class="form-control">
                <p id="invalidCate" class="text-danger p-1 fw-bold"></p>
            </div>

            <div class="form-group my-4">
                <label for="telefono"> Teléfono</label>
                <input type="text" id="telefono" class="form-control">
                <p id="invalidTel" class="text-danger p-1 fw-bold"></p>
            </div>
        </div>
        <div>
            <p id="invalid" class="text-danger p-1 fw-bold"></p>
        </div>
      
        <div class="my-2">
            <button id="addButton" onclick="addCont()" class=" btn btn-primary "> Guardar contacto </button>
            <button id="updateButton" onclick="updateCont()" class=" btn btn-success  mx-1  d-none"> Actualizar contacto </button>
            <button id="cancelButton" onclick="cancelUpdate()" class=" btn btn-danger mx-1 d-none"> Cancel </button>
            

        </div>

    </div>

    <div class="container">
        <div class="row my-5">
            <div class="searchInput">
                <input type="text" onkeyup="searchConts(this.value)" class="form-control" placeholder="Buscar">
            </div>
        </div>
    </div>

    <div class="container ">

        <div class="row my-5">
            <table class="table">
                <thead>
                <th> No. </th>
                <th> Nombre </th>
                <th> Apellido </th>
                <th> Email </th>
                <th> Telefono </th>
                <th> Actualizar </th>
                <th> Borrar</th>
                <th> Enviar correo</th>
                </thead>
                <tbody id="tableBody">
                    <tr class="my-4"></tr>
                </tbody>
            </table>
        </div>
    </div>
    


    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4070f4" fill-opacity="1" d="M0,64L15,96C30,128,60,192,90,234.7C120,277,150,299,180,298.7C210,299,240,277,270,240C300,203,330,149,360,133.3C390,117,420,139,450,138.7C480,139,510,117,540,112C570,107,600,117,630,117.3C660,117,690,107,720,133.3C750,160,780,224,810,208C840,192,870,96,900,80C930,64,960,128,990,176C1020,224,1050,256,1080,229.3C1110,203,1140,117,1170,117.3C1200,117,1230,203,1260,240C1290,277,1320,267,1350,240C1380,213,1410,171,1425,149.3L1440,128L1440,320L1425,320C1410,320,1380,320,1350,320C1320,320,1290,320,1260,320C1230,320,1200,320,1170,320C1140,320,1110,320,1080,320C1050,320,1020,320,990,320C960,320,930,320,900,320C870,320,840,320,810,320C780,320,750,320,720,320C690,320,660,320,630,320C600,320,570,320,540,320C510,320,480,320,450,320C420,320,390,320,360,320C330,320,300,320,270,320C240,320,210,320,180,320C150,320,120,320,90,320C60,320,30,320,15,320L0,320Z"></path></svg>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>