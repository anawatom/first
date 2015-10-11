
<!DOCTYPE html>
<html xmlns="http://www.w3c.org/1999/xhtml"><head><link type="text/css" rel="stylesheet" href="/trnWeb/javax.faces.resource/theme.css.jsf?ln=primefaces-trn" /><link rel="stylesheet" type="text/css" href="/trnWeb/javax.faces.resource/watermark/watermark.css.jsf?ln=primefaces&amp;v=5.0.9" /><script type="text/javascript" src="/trnWeb/javax.faces.resource/jquery/jquery.js.jsf?ln=primefaces&amp;v=5.0.9"></script><script type="text/javascript" src="/trnWeb/javax.faces.resource/primefaces.js.jsf?ln=primefaces&amp;v=5.0.9"></script><script type="text/javascript" src="/trnWeb/javax.faces.resource/watermark/watermark.js.jsf?ln=primefaces&amp;v=5.0.9"></script><link rel="stylesheet" type="text/css" href="/trnWeb/javax.faces.resource/primefaces.css.jsf?ln=primefaces&amp;v=5.0.9" /><script type="text/javascript" src="/trnWeb/javax.faces.resource/jquery/jquery-plugins.js.jsf?ln=primefaces&amp;v=5.0.9"></script><script type="text/javascript" src="/trnWeb/javax.faces.resource/dialog-custom.js.jsf?ln=js"></script><script type="text/javascript" src="/trnWeb/javax.faces.resource/validation/validation.js.jsf?ln=primefaces&amp;v=5.0.9"></script><script type="text/javascript" src="/trnWeb/javax.faces.resource/validation/beanvalidation.js.jsf?ln=primefaces&amp;v=5.0.9"></script><script type="text/javascript">PrimeFaces.settings.locale = 'th_TH';
    PrimeFaces.settings.validateEmptyFields = true;
    PrimeFaces.settings.considerEmptyStringNull = true;</script><script type="text/javascript">PrimeFaces.settings.legacyWidgetNamespace = true;</script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>เข้าสู่ระบบ ฝึกอบรมกรมพลศึกษา</title><script type="text/javascript" src="/trnWeb/javax.faces.resource/site-min.js.jsf?ln=js"></script>
        <link type="text/css" rel="stylesheet" href="http://ipeshd.dpe.go.th/trnWeb/css/login.css" />
        <link rel="shortcut icon" href="/trnWeb/javax.faces.resource/images/favicon.ico.jsf" type="image/x-icon" /></head><body class="bg_login_page">
        <form id="form" name="form" method="post" action="<?php echo site_url('/login/loginExc'); ?>" enctype="application/x-www-form-urlencoded">
            <body>
                <div class="login">
                    <div class="watermark">© Copyright 2014, Institute of Physical Education and Sports Human Development. All rights reserved.</div>
                    <div class="logo"></div>
                    <div class="txt_login">เข้าสู่ระบบ ฝึกอบรมกรมพลศึกษา</div>
                    <div class="img_input">
                        <div><script id="j_id_a_s" type="text/javascript">$(function () {
            PrimeFaces.cw("Watermark", "widget_j_id_a", {id: "j_id_a", widgetVar: "widget_j_id_a", value: "รหัสผู้ใช้", target: "userid"}, "watermark");
        });</script><input id="userid" name="userid" type="text" value="" maxlength="20" class="input_login" autocomplete="off" />
                        </div>
                        <div><script id="j_id_d_s" type="text/javascript">$(function () {
                                PrimeFaces.cw("Watermark", "widget_j_id_d", {id: "j_id_d", widgetVar: "widget_j_id_d", value: "รหัสผ่าน", target: "password"}, "watermark");
                            });</script><input type="password" id="password" name="password" maxlength="20" class="input_psw" autocomplete="off" /><input type="hidden" id="clientRequestURL" name="clientRequestURL" value="" />
                        </div>
                    </div>
                    <div class="row_remember"><input id="rememberme" type="checkbox" name="rememberme" value="true" /><label class="remember" title="ระบบจะจำการเข้าใช้งานไว้ 30 วัน" for="rememberme">จดจำฉัน</label>
                    </div>
                    <div class="btt_ok"><button id="j_id_k" name="j_id_k" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit"><span class="ui-button-text ui-c">เข้าสู่ระบบ</span></button>
			</div>
                </div><div id="j_id_n" class="ui-dialog ui-widget ui-widget-content ui-overlay-hidden ui-corner-all ui-shadow"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="j_id_n_title" class="ui-dialog-title"></span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content"></div></div><script id="j_id_n_s" type="text/javascript">$(function () {
                        PrimeFaces.cw("Dialog", "widget_j_id_n", {id: "j_id_n", widgetVar: "widget_j_id_n", closeOnEscape: true, cache: true});
                    });</script>
                <script type="text/javascript">
                    function collectServerUrl() {
                        var srvPort = window.location.port;
                        var srvURL = window.location.protocol + "//" + window.location.host;
                        if (srvPort != "") {
                            if (srvURL.indexOf(":") == -1) {
                                if (srvPort.indexOf(":") == -1) {
                                    srvURL += (":" + srvPort);
                                } else {
                                    srvURL += srvPort;
                                }
                            }
                        }
                        var pathName = window.location.pathname;
                        srvURL += "/" + pathName.split("/")[1];
                        $('#clientRequestURL').val(srvURL);
                    }
                </script><input type="hidden" name="form_SUBMIT" value="1" /><input type="hidden" name="javax.faces.ViewState" id="j_id__v_0_javax.faces.ViewState_1" value="mMLFlv/5vBR/zEUjsDdoR2fivfhrbFTQhEzVOLzw+TjZTQf5" /></form></body>
</body>
</html>