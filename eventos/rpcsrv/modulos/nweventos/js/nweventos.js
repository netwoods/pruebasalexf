$(document).ready(function() {
    $("#nombre").focus();
    $(".buttonReservaYa").click(function() {
        loadCodeDialog();
    });

    $(".hourEvents").click(function() {
        var data = $(this).attr("data");
        var selected = $(this).attr("check-selected");
        var checked = $(this).prop('checked');
        var maxAsist = $(this).attr('max-asist');
        var actualAsist = $(this).attr('actual-asist');

        if (parseInt(actualAsist) >= parseInt(maxAsist)) {
            dialogAsist();
            return false;
        }

        if (selected == "true") {
            $(this).prop('checked', false);
            mensajeEventSelectedDouble();
            return;
        }
        if (checked == false) {
            $(".event_" + data).attr("check-selected", "false");
            $(".event_" + data).removeClass("checkboxdisabled");
            return;
        }

        $(".event_" + data).attr("check-selected", "true");
        $(this).attr("check-selected", "false");

        $(".event_" + data).addClass("checkboxdisabled");
        $(this).removeClass("checkboxdisabled");
    });

});

function dialogAsist() {
    $("<div class='nw_dialog'><h3>Lo sentimos, no hay cupo.</h3></div>").dialog({
        position: "center",
        title: "Mensaje",
        resizable: false,
        modal: true,
        height: '300',
        width: '400',
        show: {
            effect: "fade",
            duration: 500
        },
        hide: {
            effect: "scale",
            duration: 500
        },
        close: function() {
            $(this).empty();
            $(this).dialog('destroy');
        },
        buttons: {
            'Aceptar': function() {
                $(this).empty();
                $(this).dialog('destroy');
            }
        }
    });
}
function mensajeEventSelectedDouble() {
    $("<div class='nw_dialog'><h3>No puede seleccionar este curso, ya tiene otro seleccionado a la misma hora y fecha</h3></div>").dialog({
        position: "center",
        title: "Mensaje",
        resizable: false,
        modal: true,
        height: '300',
        width: '400',
        show: {
            effect: "fade",
            duration: 500
        },
        hide: {
            effect: "scale",
            duration: 500
        },
        close: function() {
            $(this).empty();
            $(this).dialog('destroy');
        },
        buttons: {
            'Aceptar': function() {
                $(this).empty();
                $(this).dialog('destroy');
            }
        }
    });
}
function dialogAll(data) {
    $("<div class='nw_dialog'>" + data + "</div>").dialog({
        position: "center",
        title: "Mensaje",
        resizable: false,
        modal: true,
        height: '300',
        width: '400',
        show: {
            effect: "fade",
            duration: 500
        },
        hide: {
            effect: "scale",
            duration: 500
        },
        close: function() {
            $(this).empty();
            $(this).dialog('destroy');
            reloadWindow();
        },
        buttons: {
            'Aceptar': function() {
                $(this).empty();
                $(this).dialog('destroy');
            }
        }
    });
}
function dialogCodeNone() {
    $("<div class='nw_dialog'><h3>El código no es válido</h3></div>").dialog({
        position: "center",
        title: "Mensaje",
        resizable: false,
        modal: true,
        height: '300',
        width: '400',
        show: {
            effect: "fade",
            duration: 500
        },
        hide: {
            effect: "scale",
            duration: 500
        },
        close: function() {
            $(this).empty();
            $(this).dialog('destroy');
            reloadWindow();
        },
        buttons: {
            'Aceptar': function() {
                $(this).empty();
                $(this).dialog('destroy');
                reloadWindow();
            }
        }
    });
}
function reloadWindow() {
    window.location = "/rpcsrv/modulos/nweventos/index.php";
//    window.location.reload();
//    parent.location.reload();
}
function loadCodeDialog() {
    $("<div class='nw_dialog'></div>").dialog({
        position: "center",
        title: "Reservar",
        resizable: false,
        modal: true,
        height: '200',
        width: '300',
        show: {
            effect: "fade",
            duration: 500
        },
        hide: {
            effect: "scale",
            duration: 500
        },
        open: function(event, ui) {
        },
        create: function(event, ui) {
            $(".ui-dialog-titlebar").remove();
            $.ajax({
                type: "POST",
                url: "forms/code.php",
                error: function() {
                    alert("La operación no pudo ser procesada. Inténtelo de nuevo.");
                },
                success: function(data) {
                    $(".nw_dialog").append(data);
                }
            });
        },
        close: function() {
            $(this).empty();
            $(this).dialog('destroy');
        },
        buttons: {
            'Cancelar': function() {
                $(this).empty();
                $(this).dialog('destroy');
            }
        }
    });
}
function validate() {
    var mensaje = "<span class='error'>Requerido</span>";
    var input = "";

    input = $("#nombre");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }

    input = $("#cedula");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }
    input = $("#email");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }
    input = $("#celular");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }


//búsqueda
    input = $("#data_result_search_text");
    var input2 = $("#busqueda");
    if (input.val() == "") {
        input2.after(mensaje);
        input2.focus();
        $(input2).keydown(function() {
            $(".error").remove();
        });
        return false;
    }
    input = $("#data_result_search");
    var input2 = $("#busqueda");
    if (input.val() == "") {
        input2.after(mensaje);
        input2.focus();
        $(input2).keydown(function() {
            $(".error").remove();
        });
        return false;
    }
    input = $("#busqueda");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }
    //fin búsqueda

    input = $("#cargo");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }


    var div = $(".hourEvents");
    var total = div.length;
    var checkeados = 0;
    for (var i = 0; i < total; i++) {
        var check = $(div[i]).prop('checked');
        if (check == true) {
            checkeados++;
        }
    }
    if (checkeados == 0) {
        dialogAll("Debe seleccionar por lo menos un evento.");
        return false;
    }


//    var data = $('#nwevents').serialize();
//    return false;

    return true;
}

function sendEvent() {
    if (validate() == false) {
        return false;
    }
    $.ajax({
        url: "srv/send.php",
        data: $('#nwevents').serialize(),
        type: 'post',
        typeData: "json",
        beforeSend: function() {
        },
        error: function() {
            alert("La operación no pudo ser procesada. Inténtelo de nuevo. ");
            return;
        },
        success: function(data) {
            data = JSON.parse(data);
            if (data != "OK") {
                dialogAll(data);
                return;
            }
            reservarEventos();
            return true;

            if (data == true) {
                reservarEventos();
            } else {
                alert(data);
            }
        }
    });
}

function reservarEventos() {
    var data = {};
    var eventos = {};
    data["documento"] = $("#cedula").val();
    data["eventos"] = eventos;

    var div = $(".hourEvents");
    var total = div.length;

    var x = 0;
    for (var i = 0; i < total; i++) {
        var eventDiv = div[i];
        var checked = $(eventDiv).prop('checked');
        if (checked == true) {
            var evento = $(eventDiv).attr("data-evento");
            var sesion = $(eventDiv).attr("data-sesion");
            var add = {};
            add["evento"] = evento;
            add["sesion"] = sesion;
            eventos[x] = add;
            x++;
        }
    }
    $.ajax({
        url: "srv/reservarEvento.php",
        data: data,
        type: 'post',
        typeData: "json",
        beforeSend: function() {
        },
        error: function() {
            alert("La operación no pudo ser procesada. Inténtelo de nuevo. ");
            return;
        },
        success: function(data) {
            if (data) {
                mensajeFinal();
            } else {
                alert(data);
            }
        }
    });
}

function mensajeFinal() {
    $('#nwevents').trigger("reset");
    $("<div class='nw_dialog'><h3>Tu reserva  a los talleres de nuestro I Foro de reflexión sobre la escuela y neuroeducación ha sido confirmada.</h3></div>").dialog({
        position: "center",
        title: "Mensaje",
        resizable: false,
        modal: true,
        height: '300',
        width: '400',
        show: {
            effect: "fade",
            duration: 500
        },
        hide: {
            effect: "scale",
            duration: 500
        },
        close: function() {
            $(this).empty();
            $(this).dialog('destroy');
            $('#nwevents').trigger("reset");
            reloadWindow();
        },
        buttons: {
            'Aceptar': function() {
                $(this).empty();
                $(this).dialog('destroy');
                $('#nwevents').trigger("reset");
                reloadWindow();
            }
        }
    });
}

function sendCode() {
    var mensaje = "<span class='error'>Requerido</span>";
    var input = "";
    input = $("#code");
    if (input.val() == "") {
        input.after(mensaje);
        input.focus();
        $(input).keydown(function() {
            $(".error").remove();
        });
        return false;
    }
    window.location = "?tipo=col";
    return true;
    $.ajax({
        url: "srv/send.php",
        data: $('#nweventsCode').serialize(),
        type: 'post',
        typeData: "json",
        beforeSend: function() {
        },
        error: function() {
            alert("La operación no pudo ser procesada. Inténtelo de nuevo. ");
            return;
        },
        success: function(data) {
            if (data == true) {
                alert("Enviado correctamente");
                $('#nwevents').trigger("reset");
            } else {
                alert(data);
            }
        }
    });
}