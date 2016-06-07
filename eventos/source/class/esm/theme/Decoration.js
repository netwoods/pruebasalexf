/* ************************************************************************
 
 Copyright:
 
 License:
 
 Authors:
 
 ************************************************************************ */

qx.Theme.define("esm.theme.Decoration",
        {
            extend: qx.theme.modern.Decoration,
            decorations: {
                "table": {
                    decorator: [
                        qx.ui.decoration.MSingleBorder,
                        qx.ui.decoration.MBoxShadow
                    ],
                    style: {
                        width: 1,
                        color: "#000000",
                        shadowBlurRadius: 5,
                        shadowLength: 4,
                        shadowColor: "table-shadow"
                    }
                },
                "selected": {
                    decorator: qx.ui.decoration.Decorator,
                    style: {
                        startColorPosition: 0,
                        endColorPosition: 100,
                        startColor: "#3379D4",
                        endColor: "#007fba"
                    }
                },
                "selected-css": {
                    decorator: [qx.ui.decoration.MLinearBackgroundGradient],
                    style: {
                        startColorPosition: 0,
                        endColorPosition: 100,
                        startColor: "#3379D4",
                        endColor: "#007fba"
                    }
                }
            }
        });