<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
       <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
                  <header>
                      </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  id="form1" name="form1" method="post" action="modelo/mcontrol.php" autocomplete="on"> 
                                <h1>Ingreso</h1> 
                                <?php
				$ErrUsu = isset($_GET["errorusuario"]) ? $_GET["errorusuario"] : NULL;
				if (strcmp($ErrUsu,"si") == 0){
					echo "<span style=\"color:white\"><b>Datos incorrectos</b></span>";
				}else{
					echo "<span style=\"color:white; font-size:14;\"><b>Introduce tu clave de acceso:</b></span>";
				}
				?>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Usuario </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="No de Documento"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Contrase&ntilde;a </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Clave" /> 
                                </p>
                                    <p class="login button"> 
                                    <input type="submit" value="Ingresar" /> 
								</p>
                                <p class="change_link">
									olvido su contrase&ntilde;a?
									<a href="#toregister" class="to_register">Aqu&iacute;</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1>Recordar Contrase&ntilde;a </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Ingrese No de Documento</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                               
                                <p class="signin button"> 
									<input type="submit" value="Recordar"/> 
								</p>
                                <p class="change_link">  
									<a href="#tologin" class="to_register"> Regresar </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>