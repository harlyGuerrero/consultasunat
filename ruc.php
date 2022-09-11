<?php  include("first/header.php"); ?>
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
        <thead>
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
<?php  include("first/footer.php"); ?>