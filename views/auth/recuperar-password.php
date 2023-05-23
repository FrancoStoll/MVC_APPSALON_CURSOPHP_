<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuacion</p>
<?php 
include_once __DIR__ . "/../templates/alertas.php" ?>

<?php if($error) return null; ?>
<form class="formulario" method="POST">

<div class="campo">
    <label for="password">Password</label>
    <input 
    type="password"
    id="password"
    name="password"
    placeholder="Ingresa tu nuevo Password"
    >
</div>
<input type="submit" class="boton" value="Guardar Nuevo Password">

<div class="acciones">
    <a href="/">¿Ya tienes cuenta? Inicia Sesión</a>
    <a href="crear-cuenta">¿Aún no tienes cuenta? Obtener una</a>
</div>
</form>