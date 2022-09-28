
            
            <?php
            
            $patronombre= "/^([A-Za-z\s]){3,25}$/";
            $patroncontrasena="/^[:alnum:\S]{6,8}$/";
            $patroncorreo="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
            $patrontelefono="/[0-9]{9,9}$/";

            $nombre= filter_input(INPUT_POST, "name");
            $contrasena= filter_input(INPUT_POST, "password");
            $email= filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL);
            $telefono=filter_input(INPUT_POST, "tel");
            $diacumpleaños=filter_input(INPUT_POST, "dateofbirth");
            $edad=filter_input(INPUT_POST, "age");
            $shop=filter_input(INPUT_POST, "shop");
            $subscription=filter_input(INPUT_POST, "subscription");
            
            
            if (preg_match($patroncontrasena,$contrasena)&&
                    preg_match($patronombre,$nombre) &&
                    preg_match($patroncorreo,$email)&& 
                    preg_match($patrontelefono,$telefono) && 
                    isset ($edad)&&
                    !$diacumpleaños=="")
            {?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
     
    
        <div class="form-font capaform">
            
            <p>Nombre: <?php echo "$nombre";?></p>  
            <p>Conraseña: <?php echo "$contrasena"; ?></p>
            <p>Email: <?php echo "$email"; ?></p>
            <p>Fecha de cumpleaños: <?php echo "$diacumpleaños"; ?></p>
            <p>Telefono movil: <?php echo "$telefono"; ?></p>
            <p>Tienda: <?php echo "$shop"; ?> </p>
            <p>Edad: <?php
                if ($edad<"25"){
                echo "Eres menor de 25 años";}
                else if($edad=="25-50"){
                echo "Tu edad esta entre 25 y 50 años";}
                else {
                echo "tienes mas de 50 años";}
            ?></p>
            <p>Subscription: <?php
            if(!isset ($subscription))
            {
                echo "No te has suscrito";
            } 
            else{
                echo "Te has suscrito";}
            ?> 
            </p> 
            
        </div>
    </body>
</html>
            <?php }else { ?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Register Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
            <div class="flex-page">
                <h1>Customer Registration</h1>
                <form class="form-font capaform" name="registerform" 
                      action="procesaformulario.php" method="POST">
                    <div class="flex-outer">
                        <div class="form-section">
                            <label for="name">Name:</label> 
                            <?php if (!preg_match($patronombre,$nombre)) { ?> 
                            
                            <input id="name" type="text" name="name" placeholder="Enter your name:" >
                            <p style="color:red" >* El nombre puede contener letras mayúsculas, minúsculas, espacios y tiene una longitud entre 3 y 25 caracteres</p>
                            <?php }else { ?>
                            <input id="name" type="text" name="name" placeholder="Enter your name:" value="<?php echo "$nombre"; ?>" /> 
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <label for="password">Contraseña:</Label> 
                            <?php if (!preg_match($patroncontrasena,$contrasena)) { ?> 
                            <input id="password" type="password" name="password" placeholder="Enter your password:" >
                            <p style="color:red" >* La contraseña puede contener caracteres alfanuméricos y tiene una longitud entre 6 y 8 caracteres.</p>
                            <?php }else { ?>
                            <input id="password" type="password" name="password" placeholder="Enter your password:" value="<?php echo "$contrasena"; ?>" /> 
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <label for="email">Email:</Label> 
                            <?php if (!preg_match($patroncorreo,$email)) { ?> 
                            <input id="email" type="text"  name="email" placeholder="Enter your email" >
                            <p style="color:red">*Error al introducir el correo electronico<p>
                            <?php }else { ?>
                            <input id="email" type="text"  name="email" placeholder="Enter your email" value="<?php echo "$email"; ?>" /> 
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <label for="dateofbirth">Date of Birth:</Label> 
                            <input id="dateofbirth" type="date" name="dateofbirth" placeholder="Enter your date of birth">
                            <?php if ($diacumpleaños=="") { ?> 
                            <p style="color:red">*Es obligatorio introducir tu edad<p>
                            <?php }else { ?>
                            <!--<input id="dateofbirth" type="date" name="dateofbirth" placeholder="Enter your date of birth" value="<?php// echo $diacumpleaños ?>" />--> 
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            <label for="telephone">Telefono Móvil:</Label> 
                            <?php if (!preg_match($patrontelefono,$telefono)) { ?> 
                            <input id="telephone" type="tel" name="tel" placeholder="Enter your telephone">
                            <p style="color:red">*El numero de telefono solo pueden ser digitos<p>
                            <?php }else { ?>
                            <input id="telephone" type="tel" name="tel" placeholder="Enter your telephone" value="<?php echo "$telefono" ;?>" /> 
                            <?php } ?>
                        </div>
                        <div class="form-section">
                            
                            <label for="shop">Closest Shop:</Label> 
                            <select id="shop" name="shop">
                                <?php if ($shop=="Madrid"){?>
                                <option value="Madrid" selected>Madrid</option>
                                <option value="Barcelona" >Barcelona</option>
                                <option value="Valencia" >Valencia</option>
                                <?php } else if ($shop=="Barcelona"){?>
                                <option value="Madrid" >Madrid</option>
                                <option value="Barcelona" selected >Barcelona</option>
                                <option value="Valencia" >Valencia</option>
                                <?php }else if ($shop=="Valencia"){?>
                                <option value="Madrid" >Madrid</option>
                                <option value="Barcelona"  >Barcelona</option>
                                <option value="Valencia" selected>Valencia</option>
                                <?php }?>
                            </select> 
                            
                        </div>
                        <div class="form-section">
                            <label>Age:</label>
                            <div class="select-section">
                                <?php switch ($edad) {
                                case "-25": ?>
                                    <div>
                                        <input id="-25" type="radio" name="age" value="-25" checked="" /> 
                                    <label for="-25">Younger than 25</label>
                                </div>
                                <div>
                                    <input id="25-50" type="radio" name="age" value="25-50" /> 
                                    <label for="25-50">Between 25 and 50</label>
                                </div>
                                <div>
                                    <input id="50-" type="radio" name="age" value="50-" />
                                    <label for="50-">Older than 50</label>
                                </div>
                                <?php ;break;  
                                case "25-50": ?>
                                    <div>
                                    <input id="-25" type="radio" name="age" value="-25" /> 
                                    <label for="-25">Younger than 25</label>
                                </div>
                                <div>
                                    <input id="25-50" type="radio" name="age" value="25-50" checked="" /> 
                                    <label for="25-50">Between 25 and 50</label>
                                </div>
                                <div>
                                    <input id="50-" type="radio" name="age" value="50-" />
                                    <label for="50-">Older than 50</label>
                                </div>
                                <?php  ;break;  
                                case "50-": ?><div>
                                    <input id="-25" type="radio" name="age" value="-25" /> 
                                    <label for="-25">Younger than 25</label>
                                </div>
                                <div>
                                    <input id="25-50" type="radio" name="age" value="25-50" /> 
                                    <label for="25-50">Between 25 and 50</label>
                                </div>
                                <div>
                                    <input id="50-" type="radio" name="age" value="50-" checked="" />
                                    <label for="50-">Older than 50</label>
                                </div>
                                    
                                <?php ;break; 
                                default :?>
                                <div>
                                    <input id="-25" type="radio" name="age" value="-25" /> 
                                    <label for="-25">Younger than 25</label>
                                </div>
                                <div>
                                    <input id="25-50" type="radio" name="age" value="25-50" /> 
                                    <label for="25-50">Between 25 and 50</label>
                                </div>
                                <div>
                                    <input id="50-" type="radio" name="age" value="50-" />
                                    <label for="50-">Older than 50</label>
                                </div>
                                <p style="color:red">*Es obligatorio seleccionar alguno<p>
                                <?php } ?>
                            </div>
                            <?php if (!isset($age)) { ?> 
                            
                            <?php }?>
                        </div>
                        <div class="form-section">
                            <label for="subscription">Newsletter subscription:</label>
                            <input id="subscription" type="checkbox"  name="subscription"/> 
                        </div>
                        <div class="form-section">
                            <div class="submit-section">
                                <input class="submit" type="submit" 
                                       value="Send" name="sendbutton" /> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    
</html>
            <?php } ?>