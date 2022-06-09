<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areafor-Api</title>
</head>
<body>
   <h1>Areafor-API REST</h1>
   <h2>¿Para qué sirve?</h2>
   <p>Esta API REST permite el consumo de datos de alumnos y tutores en el curso Backend de Areafor 2022. Permitiendo el consumo RESTFul de esta API.</p>
   <main>
       <section>
           <article>
            <h2>GET HTTP REQUEST</h2>
                <strong><code>http://192.168.1.49/areafor-api/students</code></strong>
                <p>Retorna todos los estudiantes en <strong><code>JSON</code></strong>. Debemos hacer la petición a la API por el metodo HTTP GET.</p>
           </article>
           <article>
                <h2>POST HTTP REQUEST</h2>
                <strong><code>http://192.168.1.49/areafor-api/students</code></strong>
                <p>Insertar un estudiante. Debemos hacer la petición a la API por el metodo HTTP GET</p>
           </article>
           <article>
                <h2>POST HTTP REQUEST</h2>
                <strong><code>http://192.168.1.49/areafor-api/students</code></strong>
                <p>Insertar un estudiante. Debemos hacer la petición a la API por el metodo HTTP POST y pasando al body los siguientes parametros:</p>
                <ul>
                    <li><strong><code>name</code></strong> (Nombre del alumno).</li>
                    <li><strong><code>surname</code></strong> (Apellidos).</li>
                    <li><strong><code>email</code></strong> (Correo Electrónico).</li>
                    <li><strong><code>knowledge</code></strong> (Conocimientos).</li>
                </ul>
           </article>
           <article>
                <h2>PUT HTTP REQUEST</h2>
                <strong><code>http://192.168.1.49/areafor-api/students</code></strong>
                <p>Insertar un estudiante. Debemos hacer la petición a la API por el metodo HTTP PUT y pasando al body los siguientes parametros:</p>
                <ul>
                    <li><strong><code>id</code></strong> (id del alumno a modificar).</li>
                    <li><strong><code>name</code></strong> (Nombre del alumno).</li>
                    <li><strong><code>surname</code></strong> (Apellidos).</li>
                    <li><strong><code>email</code></strong> (Correo Electrónico).</li>
                    <li><strong><code>knowledge</code></strong> (Conocimientos).</li>
           </article>
           <article>
                <h2>PUT HTTP REQUEST</h2>
                <strong><code>http://192.168.1.49/areafor-api/students</code></strong>
                <p>Insertar un estudiante. Debemos hacer la petición a la API por el metodo HTTP PUT y pasando al body los siguientes parametros:</p>
                <ul>
                    <li><strong><code>id</code></strong> (id del alumno a eliminar).</li>
           </article>
       </section>
   </main>
</body>
</html>