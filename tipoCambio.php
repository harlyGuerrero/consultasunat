<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENIEC PERÚ</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <style>
        body{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .page-container{
            width: auto;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
    <div class="page-container">
        <h3>CONSULTA DE RUC</h3>
        <div class="btn-group">
            <input type="text" id="documento" class="form-control">
            <button type="button" class="btn btn-dark" id="buscar">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>
        <br><br>
        <div class="row" style="width: 100%;">
        <table class="table">
        <thead class=">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Razón Social</th>
            <th scope="col">Domicilio Fiscal</th>
            <th scope="col">Estado del Contribuyente</th>
            <th scope="col">Condición del Contribuyente</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">-</th>
            <td><input type="text" class="form-control" id="nombreruc" disabled></td>
            <td><input type="text" class="form-control" id="direccion" disabled></td>
            <td><input type="text" class="form-control" id="estado" disabled></td>
            <td><input type="text" class="form-control" id="condicion" disabled></td>
            </tr>
        </tbody>
        </table>
        </div>
    </div>


</body>
<script>
    $('#buscar').click(function(){
        ruc=$('#documento').val();
        $.ajax({
            url:'Controlador/consultaRUC.php',
            type:'post',
            data: 'ruc='+ruc,
            dataType:'json',
            success:function(e){
            if(e.numeroDocumento==ruc){
                $('#nombreruc').val(e.nombre);
                $('#direccion').val(e.direccion);
                $('#estado').val(e.estado);
                $('#condicion').val(e.condicion);

            }else{
                alert(e.error);
            }
            console.log(e)
        }
        });
    });
</script>


</html>