<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <a class="btn btn-primary mt-4" href="{{ route('admin') }}">Volver</a>

        <div class="card mt-3">

            <div class="card-header d-flex justify-content-between">
                <h3>USUARIOS</h3>
                <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Nuevo</a>
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>ROL</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->rol }}</td>
                                <td>{{ $user->estado }}</td>

                                <td class="d-flex">
                                    <a style="margin-right: 1rem" href="{{ route('admin.users.edit', $user)}}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (session('message'))
                <div class="alert alert-success mx-4">
                    {{ session('message') }}
                </div>
            @endif

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alert').animate({
                        opacity: 0,
                        height: "toggle"
                    }, 1000);
                }, 2000);
            });
    </script>

</body>

</html>
