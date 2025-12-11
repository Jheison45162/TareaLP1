<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/login_registrar.css">
</head>
<body>

<div class="auth-container">
    <h2>Iniciar sesión</h2>

    <form id="formLogin">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>

    <a href="registro.php" class="link">Crear cuenta</a>
    <a href="index.php" class="link">Volver al inicio</a>
</div>

<script>
document.getElementById("formLogin").onsubmit = async (e) => {
    e.preventDefault();
    const data = new FormData(e.target);

    const r = await fetch("main/login.php", { method: "POST", body: data });

    const text = await r.text();
    console.log("SERVER RESP:", text);

    let res;
    try {
        res = JSON.parse(text);
    } catch {
        alert("Respuesta inválida del servidor");
        return;
    }

    alert(res.msg);
    if (res.ok) location.href = "index.php";
};
</script>

</body>
</html>
