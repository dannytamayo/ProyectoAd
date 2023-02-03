<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body d-flex">
                <div class="w-50 text-center my-auto">
                    <h3>Formulario</h3>
                </div>
                <div class="w-50">
                <form action="{{ route('admin.users.store') }}" method="post">

                    @csrf

                    <input type="hidden" name="estado" value="1">

                    <div class="form-group mt-3">
                      <label for="name">Nombre:</label>
                      <input type="text" id="name" name="name" class="form-control">
                    </div>

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-3">
                      <label for="last_name">Apellido:</label>
                      <input type="text" id="last_name" name="last_name" class="form-control">
                    </div>
                    
                    @error('last_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-3">
                        <label for="rol">Rol:</label>
                        <select id="rol" name="rol" class="form-control">
                          <option value="Cliente">Cliente</option>
                          <option value="Taxista">Taxista</option>
                          <option value="Administrador">Administrador</option>
                        </select>
                    </div>                      

                    <div class="form-group mt-3">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" class="form-control">
                    </div>
                    
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-3">
                      <label for="password">Contraseña:</label>
                      <input type="password" id="password" name="password" class="form-control">
                    </div>
                    
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>