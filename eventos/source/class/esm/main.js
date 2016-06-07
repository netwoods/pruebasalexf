qx.Class.define("esm.main", {
    extend: qxnw.main,
    construct: function () {
        this.base(arguments);
    },
    destruct: function () {
    },
    statics: {
    },
    members: {
        menu: null,
        isCreated: null,
        permisos: [],
        slotProgramas: function slotProgramas() {
            var self = this;
            var d = new entrenamientos.tree.programas();
            self.addSubWindow("Programas", d);
        },
        slotColegios: function slotColegios() {
            var self = this;
            var d = new qxnw.lists();
            d.setSelectMultiCell(true);
            d.setTableMethod("master");
            d.createFromTable("nweventos_colegios");
            d.applyFilters();
            d.execSettings();
            d.ui.newButton.setEnabled(true);
            d.ui.editButton.setEnabled(true);
            d.ui.deleteButton.setEnabled(true);
            d.ui.unSelectButton.set({
                label: "Generar Codigos",
                icon: qxnw.config.execIcon("view-refresh.png")
            });
            d.ui.unSelectButton.addListener("execute", function () {
                var sl = d.selectedRecords();
                self.slotGenerar(sl);
            });
            self.addSubWindow("Colegios", d);
        },
        slotGenerar: function slotGenerar(sl) {
            var self = this;
            var fields = [
                {
                    name: "id",
                    label: self.tr("Colegio"),
                    type: "textField",
                    visible: false
                },
                {
                    name: "n_codigos",
                    label: self.tr("N° Codigos"),
                    type: "textField"
                },
                {
                    name: "fecha_caducidad",
                    label: self.tr("Fecha Caducidad"),
                    type: "dateField"
                }];
            var d = new qxnw.forms;
            d.setFields(fields);
            d.ui.accept.addListener("click", function () {
                var data = d.getRecord();
                data.tipo = "colegios";
                data.detalle = sl;
                var func = function () {
                    d.accept();
                    qxnw.utils.information("Codigo generados Correctamente");
                    return;
                };
                qxnw.utils.fastAsyncRpcCall("colegios", "makeCodes", data, func);
            });
            d.ui.cancel.addListener("click", function () {
                d.reject();
            });
            d.show();
        },
        slotGenerarEmpresas: function slotGenerarEmpresas(sl) {
            var self = this;
            var fields = [
                {
                    name: "id",
                    label: self.tr("Colegio"),
                    type: "textField",
                    visible: false
                },
                {
                    name: "n_codigos",
                    label: self.tr("N° Codigos"),
                    type: "textField"
                },
                {
                    name: "fecha_caducidad",
                    label: self.tr("Fecha Caducidad"),
                    type: "dateField"
                }];
            var d = new qxnw.forms;
            d.setFields(fields);
            d.ui.accept.addListener("click", function () {
                var data = d.getRecord();
                data.tipo = "empresas";
                var func = function () {
                    d.accept();
                    qxnw.utils.information("Codigo generados Correctamente");
                    return;
                };
                qxnw.utils.fastAsyncRpcCall("colegios", "makeCodes", data, func);
            });
            d.ui.cancel.addListener("click", function () {
                d.reject();
            });
            d.show();
        }
    }
});