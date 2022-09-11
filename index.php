<?php  include("first/header.php"); ?>
        <div class="hdev_sunat-card">
            <div class="wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#5000ca" fill-opacity="0.7" d="M0,192L40,160C80,128,160,64,240,64C320,64,400,128,480,181.3C560,235,640,277,720,277.3C800,277,880,235,960,186.7C1040,139,1120,85,1200,80C1280,75,1360,117,1400,138.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
            </svg>
            </div>
            <div class="hdev_sunat-container">
                <div class="hdev_sunat-grid d-flex">
                    <div class="hdev_sunat-img">
                        <img src="img/search-sunat.svg" alt="">
                    </div>
                    <div class="hdev_sunat-content">
                        <div class="hdev_sunat-info">
                            <div class="hdev_sunat-title">
                                <h1>CONSULTAR NOMBRES POR DNI</h1>
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">DNI:</label>
                                    <input type="text" class="form-control" id="documento">
                                </div>
                                <button type="button" class="btn btn-danger" id="buscar">
                                    Buscar
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </form>
                            <div class="hdev_sunat-request">
                                <div class="hdev_sunat-request-content">
                                    <div class="hdev_sunat-info-request hdev_border-none">
                                        <li><span>Apellido Paterno:</span></li>
                                        <li><input type="text" id="apellidoPaterno" disabled></li>
                                    </div>
                                    <div class="hdev_sunat-info-request hdev_border-none">
                                        <li><span>Apellido Materno:</span></li>
                                        <li><input type="text" id="apellidoMaterno" disabled></li>
                                    </div>
                                    <div class="hdev_sunat-info-request hdev_border-none">
                                        <li style="border:none"><span>Nombres:</span></li>
                                        <li style="border:none"><input type="text" id="nombre" disabled></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
            url:'Controlador/consultaDNI.php',
            type:'post',
            data: 'dni='+dni,
            dataType:'json',
            success:function(r){
            if(r.numeroDocumento==dni){
                var num1 = $('#apellidoPaterno').val(r.apellidoPaterno);
                var num2 = $('#apellidoMaterno').val(r.apellidoMaterno);
                var num3 = $('#nombre').val(r.nombres);

                console.log(num1);
                console.log(num2);
                console.log(num3);
            }else{
                alert(r.error);
            }
            console.log(r)
        }
        });
    });

    
</script>
<?php  include("first/footer.php"); ?>