/* ************************************************************************
 
 Copyright:
 
 License:
 
 Authors:
 
 ************************************************************************ */

/**
 * This is the main application class of your custom application "esm"
 *
 * @asset(esm/*)
 */
qx.Class.define("esm.Application", {
    extend: qx.application.Standalone,
    members: {
        root: null,
        main: function () {
            this.base(arguments);
            var self = this;
            if (qx.core.Environment.get("qx.debug")) {
                qx.log.appender.Native;
                qx.log.appender.Console;
            }
            qxnw.local.setAppTitle("ESM");
            qxnw.local.setAppVersion("6.6");
//            qxnw.local.setAppVersion("6.4");
            qxnw.userPolicies.setNwlibVersion("6");
            qxnw.local.start();
            qxnw.userPolicies.setMethod("session");
            qxnw.userPolicies.setRpcUrl("/rpcsrv/server.php");
            qxnw.userPolicies.setDB("esm");
            qxnw.userPolicies.setMainMethod("master");

            var rpc = new qxnw.rpc(qxnw.userPolicies.rpcUrl(), "session");
            rpc.exec("isSessionStarted");
            if (rpc.isError()) {
                qxnw.utils.populateInitSettings(this);
                var login = new qxnw.login();
                login.setMethod("session");
                login.settings.accept = function () {
                    self.loadMain();
                };
                login.show();
                return;
            }

            self.loadMain();

        },
        loadMain: function loadMain() {
            main = new esm.main();
            this.getRoot().add(main.getWidget(), {
                edge: 0
            });
        }
    }
});
