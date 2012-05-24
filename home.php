<?php
include_once("/php/cp/cUsuario.php");
$cookie = $_COOKIE["Cookie-SocialUfro"];
$matricula=$_COOKIE["Cookie-SocialUfro-Rut"];
$objusuario=new cUsuario;
if($matricula==""){

	$nombre="usuario no existe";
}
else{
	$nombre=$objusuario->buscarNombre($matricula);
}

if ($cookie == 0) {
    header('Location:index.html');
}
?>
<html>
<head>
<title>Bienvenido a Social Ufro <?php echo "$nombre"; ?></title>
<link rel="STYLESHEET" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/principal.css" />
<link rel="stylesheet" href="css/ramos.css" />
<link rel="stylesheet" href="css/timeline.css" />
<link rel="stylesheet" href="css/unidades.css" />
<script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
<script language="javascript" src="js/AjaxUpload.2.0.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta name="keywords" content="jquery, ajax" />

<script type="text/javascript">

$(document).ready(function(){
	var button = $('#upload_button'), interval;
	MostrarTimeline('php/MostrarTimeline.php');


	new AjaxUpload('#upload_button', {
        action: 'upload.php',
		onSubmit : function(file , ext){
		
		

		if (! (ext && /^(pdf|doc|docx|ppt|pptx)$/.test(ext)) || document.getElementById("tipo").value=="" 
				||document.getElementById("ramo").value==""||document.getElementById("anio").value=="" 
				||document.getElementById("nombre").value==""||document.getElementById("ramo").value=="" ) {
			// extensiones permitidas
			alert('ups! archivo no permitido o no completó todos los campos =/');


			// cancela upload
			return false;
		} else {

			button.text('Uploading');			
			//aca va el nombre del archivo que se va a cargar xD
			almacenarArchivo(file);

			this.disable();
		}
		},
		onComplete: function(file, response){
			button.text('Upload');
			 //divResultado = document.getElementById('respuestaArchivo');
			 //divResultado.innerHTML = "listo!";

			// enable upload button
			//MostrarTimeline('php/timeline.php');
			this.enable();			
			// Agrega archivo a la lista
			//$('#lista').appendTo('.files').text(file);

		}	
	});
});

</script>
<script> 
 
(function ($) {
  // custom css expression for a case-insensitive contains()
  jQuery.expr[':'].Contains = function(a,i,m){
      return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
  };
 
  function filterList(header, list) { 
  // header is any element, list is an unordered list
    // create and add the filter form to the header
    var form = $("<form>").attr({"class":"filterform","action":"#"}),
        input = $("<input>").attr({"class":"filterinput","type":"text"});
    $(form).append(input).appendTo(header);
 
    $(input)
      .change( function () {
        var filter = $(this).val();
        if(filter) {
 	  
		  $matches = $(list).find('a:Contains(' + filter + ')').parent();
		  $('p', list).not($matches).slideUp();
		  $matches.slideDown();
		    
        } else {
          $(list).find("p").slideDown();
        }
        return false;
      })
    .keyup( function () {
        // fire the above change event after every letter
        $(this).change();
    });
  }
 
 
  //ondomready
  $(function () {
  	  filterList($("#fitroTimeline"), $("#Timeline"));
    //filterList($("#fitroTimeline"));
  
  });
}(jQuery));
 
  </script> 


</head>
<body>

	<!--logo, redireccion-->

	<header>
		<section id="sub-header">
			<section id="banner">
				<a href="#" ><img id="img_logo2" src="images/logo.png"></a>
			</section>
			<section id="search_sec"><div id="fitroTimeline"></div></section>
			<section id="login">
				<span id="nombre" class="datos"><? echo $nombre; ?>(<a href="#" onclick="borrarcookie();">Cerrar sesión</a>)</span>
			</section>
		</section>
	</header>

			<!--  Cuerpo -->
		<section style='position: absolute' id='systemData'>
			<div id='panel-lateral' class='float_left t1'>

				<div class="product-head"> 
      				<div id="form"></div>
        			<div class="clear"></div>
  				</div>
				<a href="#" onclick="MostrarConsulta();">Entrar</a>
				
			</div>

			<!-- Panel 3 -->
			<div class='float_right t3 pane box_shadow'>
					<div id="resultadoArchivos"></div>
				<!-- subir archivo -->
				<section class='publicar-form'>
					<input type='text'  id="nombreArchivo" placeholder='nombre archivo'>					
					<select id="tipo" size="1">
					    <option value="prueba" selected="selected">prueba</option>
					    <option value="taller">taller</option>
					    <option value="apunte">apunte</option>
					    <option value="manual">manual</option>
					</select>
					<input type="number" id="anio" size="6" id"anio" min="2000" max="2012" value="2012">
					<a id="upload_button">Upload</a>
					<div id="respuestaArchivo"></div>
					<div id="almacenar"></div>
				</section>

			</div>
			
			<!--Panel 2 -->
			<div class='t2'>
				<a href="#" onclick="MostrarTimeline('php/MostrarTimeline.php');">últimos archivos subidos al servidor :D </a>
				
				<div class="clear"></div>
				<div id="Timeline"></div>
			</div>
	</section>


</body>
</html>

