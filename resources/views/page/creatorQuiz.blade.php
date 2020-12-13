<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Quiz</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
      integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <h1>Creador de Quiz</h1>
      {!!$errors->first('title','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('description','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('questions.*.contenido','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('questions.*.respuestas','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('questions.*.correcta','<span style="display:block;" class="alert alert-danger">:message</span>') !!}
      {!!$errors->first('msg','<span class="alert">:message</span>') !!}
      

      <form method="post" action="{{route('creatorQuiz')}}">
        @csrf
        <input
          type="text"
          placeholder="Titulo de el Quiz"
          class="form form-control mb-2"
          name="title"
        />
        <textarea
          name="description"
          placeholder="Descripción de Quiz"
          class="form form-control mb-2"
        ></textarea>
        <select name="asignatura_id" class="form form-control">
          @foreach (Auth::user()->asignaturas as $asignatura)
            <option value="{{$asignatura->id}}">{{$asignatura->sigla}}</option>
          @endforeach
        </select>
        <div id="contenedor-preguntas">

        </div>

        <button class="btn btn-primary" type="button" id="agregar-pregunta">
          Agregar pregunta
        </button>
        <button class="btn btn-outline-primary" type="submit">
          Publicar quiz
        </button>
      </form>
    </div>
    <script src="{{asset('js/creatorQuiz.js')}}"></script>
  </body>
</html>
