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
   <p>Esta API REST permite el consumo de datos de People y tutores en el curso Backend de Areafor 2022. Permitiendo el consumo RESTFul de esta API.</p>
   <main>
       <section>
           <article>
               <h2>URL</h2>
               <p>Haremos una petición a la API con el nombre de la tabla alumno o profesor.</p>
               <p><strong>Ejemplo:</strong></p>
                <strong><code>http://192.168.1.49/areafor-api/alumnos</code></strong><br><br>
           </article>
           <article>
            <h2>GET HTTP REQUEST</h2>
                <p>Retorna todos los estudiantes o tutores en <strong><code>JSON</code></strong>. Debemos hacer la petición a la API por el metodo HTTP <strong>GET</strong>.</p>
           </article>
           <article>
                <h2>POST HTTP REQUEST</h2>
                <p>Insertar un estudiante o tutor. Debemos hacer la petición a la API por el metodo HTTP <strong>POST</strong> y pasando al body los siguientes parametros:</p>
                <ul>
                    <li><strong><code>name</code></strong> (Nombre del alumno/tutor).</li>
                    <li><strong><code>surname</code></strong> (Apellidos).</li>
                    <li><strong><code>email</code></strong> (Correo Electrónico).</li>
                    <li><strong><code>knowledge</code></strong> (Conocimientos).</li>
                </ul>
           </article>
           <article>
                <h2>PUT HTTP REQUEST</h2>
                <p>Modifica un estudiante o tutor por su <strong>id</strong>. Debemos hacer la petición a la API por el metodo HTTP <strong>PUT</strong> y pasando al body los siguientes parametros:</p>
                <ul>
                    <li><strong><code>id</code></strong> (id del alumno a modificar).</li>
                    <li><strong><code>name</code></strong> (Nombre del alumno/tutor).</li>
                    <li><strong><code>surname</code></strong> (Apellidos).</li>
                    <li><strong><code>email</code></strong> (Correo Electrónico).</li>
                    <li><strong><code>knowledge</code></strong> (Conocimientos).</li>
           </article>
           <article>
                <h2>DELETE HTTP REQUEST</h2>
                <p>Elimina un estudiante o tutor por su <strong>id</strong>. Debemos hacer la petición a la API por el metodo HTTP <strong>DELETE</strong> y pasando al body los siguientes parametros:</p>
                <ul>
                    <li><strong><code>id</code></strong> (id del alumno a eliminar).</li>
           </article>
       </section>
   </main>
</body>
</html>