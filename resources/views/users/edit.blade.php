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

    <div class="container mt-5">

        <div class="card">

            <div class="card-header">
                <H3>EDITAR CREDENCIALES</H3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                            class="form-control">
                    </div>

   
                    <div class="form-group mt-3">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese la nueva contraseña">
                  </div>


                    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>

                </form>

            </div>

        </div>

    </div>



</body>

</html>
