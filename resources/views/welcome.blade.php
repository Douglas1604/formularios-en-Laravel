<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/cb951202fd.js" crossorigin="anonymous"></script>

    </head>
    <body> 

        <h1 class="text-center p-3"> Crud Laravel </h1>

        @if (session("Correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
            
        @endif

        @if (session("incorrecto"))
        <div class="alert alert-danger">{{session("incorrecto")}}</div>
            
        @endif

        <script>
            var res=function(){
                var not=confirm("Estas seguro de eliminar?");
                return not;
            }
        </script>

         <!-- Modal  registro de datos-->
  <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("crud.create")}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Codigo Cliente</label>
                  <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcliente">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">
                  </div>  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapellido">
                  </div>  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telefono Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttelefono">
                  </div>  
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtemail">
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
        <div class="p-5 table-responsive">
            <table class="table table-striped table-bordered table-hover">
            <button data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir Cliente</button>

            <thead>
              <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
             @foreach ($datos as $item)
             <tr>
                 <th>{{$item->id_cliente}}</th>
                 <td>{{$item->nombre}}</td>
                 <td>{{$item->apellido}}</td>
                 <td>{{$item->telefono}}</td>
                 <td>{{$item->email}}</td>
                 <td>
                   <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id_cliente}}" class="btn btn-warning btn btnsm"> <i class="fa-solid fa-pen-to-square"></i>
                   <a href="{{route("crud.delete",$item->id_cliente)}}" onclick="return res()" class="btn btn-danger btn btnsm"><i class="fa-solid fa-delete-left"></i>
                 </td>


  <!-- Modal -->
  <div class="modal fade" id="modalEditar{{$item->id_cliente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Datos del Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("crud.update")}}" method="POST">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Codigo Cliente</label>
                  <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcliente" value="{{$item->id_cliente}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                  </div>  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapellido" value="{{$item->apellido}}">
                  </div>  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telefono Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttelefono" value="{{$item->telefono}}">
                  </div>  
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Cliente</label>
                    <input type="tex" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtemail" value="{{$item->email}}">
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>

                 
             </tr>
             @endforeach
            </tbody>
          </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    </body>
</html>
