<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro</title>
<link rel="stylesheet" href="css/login_registrar.css">
</head>
<body>

<div class="auth-container">
    <h2>Crear cuenta</h2>

    <form id="formReg">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrar</button>
    </form>

    <a href="login.php" class="link">Ya tengo cuenta</a>
    <a href="index.php" class="link">Volver al inicio</a>
</div>

<script>
document.getElementById("formReg").onsubmit = async (e) => {
    e.preventDefault();
    const data = new FormData(e.target);

    const r = await fetch("main/registrar.php", { method: "POST", body: data });

    const text = await r.text();
    console.log("SERVER RESP:", text);

    let res;
    try {
        res = JSON.parse(text);
    } catch {
        alert("Error en la respuesta del servidor");
        return;
    }

    alert(res.msg);
    if (res.ok) location.href = "login.php";
};
</script>

</body>
</html>
