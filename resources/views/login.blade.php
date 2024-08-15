<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA DE INSTITUCIÓM EDUCATIVA MARIANO MELGAR</title>
    <link rel="stylesheet" href="/login/css/login.css">	
</head>
<body>
<div class="logo">
  <img src="/login/img/institucion.png" alt="Sistema de Institucióm Educativa Mariano Melgar">
  <p>SISTEMA DE INSTITUCIÓN EDUCATIVA MARIANO MELGAR</p>
</div>

<div class="caja1">
  <form method="post" action="{{ route('identificacion') }}">
    @csrf
      <div class="form-title"> Inicio de Sesión</div>
      <img src="/login/img/usuariomujer.png">
      <img src="/login/img/usuariohombre.png">
      <div class="form-group">
        <div class="ub1">&#128273; Ingresar usuario</div>
        <input class="form-control @error('name') is-invalid @enderror"  type="text"  placeholder="Ingrese usuario" id="name" name="name" value="{{old('name')}}"/>                        
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror      
      </div>
      <div class="form-group">
        <div class="ub1">&#128274; Ingresar contraseña</div>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Ingresar password..."id="password" name="password"  value="{{old('password')}}"/>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{$message}}</strong>
        </span>
        @enderror
      </div>
    
      <div class="ub1">
        <input type="checkbox" onclick="verpassword()" >Mostrar contraseña
      </div>
      <div class="ub1">Rol</div>
      <select name="rol">
      <option value="0" style="display:none;"><label>Seleccionar</label></option>
      <option value="Admin">Administrador</option>
      <option value="Assistant">Asistente</option>
      <option value="Student">Estudiante</option>
      <option value="Teacher">Profesor</option>
      <option value="Secretary">Secretaria</option>
      </select>

      <div style="align=center">
        <input type="submit" value="Ingresar">

        <input type="reset" value="Cancelar">
      </div>
      <div class="ref1"><a href="#">Registrar</a> / <a href="#">Recuperar contraseña</a></div>
    </form>
</div>
</body>
<script>
  function verpassword(){
    var tipo = document.getElementById("password");
    if(tipo.type == "password")
	  {
      tipo.type = "text";
    }
    else
	  {
      tipo.type = "password";
    }
  }
</script>
</html>