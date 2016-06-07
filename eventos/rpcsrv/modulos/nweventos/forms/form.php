<?php
if (!isset($code)) {
    return false;
}
if (!isset($tipo)) {
    return false;
}
?>

<input type="hidden" name="tipo" id="tipo" value="<?php echo $tipo; ?>" />
<input type="hidden" name="codigo" id="codigo" value="<?php echo $code; ?>" />

<div class="conInput">
    <label>
        Nombres y Apellidos:
    </label>
    <input type="text" name="nombre" id="nombre" />
</div>
<div class="conInput">
    <label>
        Cédula:
    </label>
    <input type="number" name="cedula" id="cedula" />
</div>
<div class="conInput">
    <label>
        E-mail:
    </label>
    <input type="text" name="email" id="email" />
</div>
<div class="conInput">
    <label>
        Celular:
    </label>
    <input type="number" name="celular" id="celular" />
</div>

<div class="conInput">
    <?php
    if ($tipo == "colegios") {
        ?>
        <label>
            Institución:
        </label>

        <!---------------------------------------INICIA BUSCADOR---------------------------------------->
        <style>
            .containSearchNw{
                position: relative;
            }
            .containSearchNwInputs{
                position: relative;
            }
            .resultado {
                background: #FFFFFF;
                position: absolute;
                z-index: 1000000000;
                border: 1px solid #ccc;
                box-shadow: 2px 3px 5px #CCC;
                width: 100%;
                border-top: 0;
                padding: 5px;
                display: none;
                max-height: 200px;
                overflow: auto;
            }
            .divResultNw{
                position: relative;
                padding: 5px;
                cursor: pointer;
            }
            .containSearchNw input {
                width: 100%;
                padding: 5px;
            }
        </style>
        <script>
            $(document).ready(function() {
                searchAjaxNw();
            });
            function searchAjaxNw() {
                (function() {
                    $('body').delegate('.divResultNw', 'click', function() {
                        var data = $(this).attr("data");
                        var name = $(this).attr("data-name");
                        addDataResultNwAjax(data, name);
                    });
                })();

                $("#busqueda").keyup(function(e) {
                    var consulta = $("#busqueda").val();
                    $("#data_result_search").val("");
                    $("#data_result_search_text").val("");
                    $("#resultado").fadeIn(0);
                    $.ajax({
                        type: "POST",
                        url: "buscador/buscar.php",
                        data: "b=" + consulta,
                        dataType: "html",
                        beforeSend: function() {
    //                            $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                        },
                        error: function() {
                            console.log("error petición ajax");
                        },
                        success: function(data) {
                            $("#resultado").empty();
                            $("#resultado").append(data);
                        }
                    });
                });

                function addDataResultNwAjax(data, name) {
                    $("#resultado").fadeOut(0);
                    $("#resultado").empty();
                    $("#data_result_search").val("");
                    $("#data_result_search").val(data);
                    $("#data_result_search_text").val("");
                    $("#data_result_search_text").val(name);
                    $("#busqueda").val(name);
                }

            }

        </script>
        <div class="containSearchNw">
            <div class="containSearchNwInputs">
                <input type="hidden" id="data_result_search" name="data_result_search" />
                <input type="hidden" id="data_result_search_text" name="data_result_search_text" />
                <input type="text" id="busqueda" autocomplete="off" />
                <div id="resultado" class="resultado"></div>
            </div>
        </div>
        <!--------------------------------FINALIZA BUSCADOR---------------------------------->


        <?php
    }
    if ($tipo == "empresas") {
        ?>
        <label>
            Organización a la que representa:
        </label>
        <input type="text" name="data_result_search_text" id="data_result_search_text" />
        <?php
    }
    ?>
</div>
<?php
if ($tipo == "empresas") {
    ?>
    <div class="conInput">
        <label>
            País:
        </label>
        <select name="pais" id="pais" class="pais" >
            <option value="">Seleccione</option>
            <?php
            print getTable("paises");
            ?>
        </select>
    </div>
    <div class="conInput">
        <label>
            Ciudad:
        </label>
        <input type="text" name="ciudad" id="ciudad" />
    </div>
    <?php
}
?>
<div class="conInput">
    <label>
        Cargo:
    </label>
    <input type="text" name="cargo" id="cargo" />
</div>