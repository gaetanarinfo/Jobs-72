@if (Session::get('cookie-consent') == 'accord-ok')

@else

<!-- Modal -->
<div class="modal fade" id="cookie" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static"
    data-mdb-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 776px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Les cookies sont là pour améliorer votre navigation !
                </h5>
            </div>
            <div class="modal-body">Notre objectif est de toujours vous montrer le contenu qui vous intéresse vous !
                Pour cela, nous utilisons des cookies. Miam Miam ! Ainsi, nous pouvons personnaliser notre site et nos
                publicités pour vous et, en analysant votre utilisation du site, notre équipe comprend quelles parties
                du site sont les plus pertinentes pour vous. En choisissant « Accepter tous les cookies », vous acceptez
                leur utilisation. Vous pouvez modifier vos paramètres à tout moment.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    Tout refuser
                </button>
                <a id="cookieConsent" data-mdb-dismiss="modal" class="btn btn-success">Accepter tous les cookies</a>
                <button type="button" data-mdb-target="#cookieSetting" data-mdb-toggle="modal" data-mdb-dismiss="modal"
                    class="btn btn-warning">Paramètres des cookies</button>
            </div>
        </div>
    </div>
</div>

<!-- Second modal dialog -->
<div class="modal fade" id="cookieSetting" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static"
    data-mdb-keyboard="false">
    <div class="modal-dialog" style="max-width: 860px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"">Centre de préférences de la confidentialité</h5>
            </div>
            <div class=" modal-body">
                    Lorsque vous consultez un site Web, des données peuvent être stockées dans votre navigateur ou
                    récupérées à partir de celui-ci, généralement sous la forme de cookies. Ces informations peuvent
                    porter sur vous, sur vos préférences ou sur votre appareil et sont principalement utilisées pour
                    s'assurer que le site Web fonctionne correctement. Les informations ne permettent généralement pas
                    de vous identifier directement, mais peuvent vous permettre de bénéficier d'une expérience Web
                    personnalisée. Parce que nous respectons votre droit à la vie privée, nous vous donnons la
                    possibilité de ne pas autoriser certains types de cookies. Cliquez sur les différentes catégories
                    pour obtenir plus de détails sur chacune d'entre elles, et modifier les paramètres par défaut.
                    Toutefois, si vous bloquez certains types de cookies, votre expérience de navigation et les services
                    que nous sommes en mesure de vous offrir peuvent être impactés. <a
                        href="https://cookiepedia.co.uk/giving-consent-to-cookies" target="_blank"
                        aria-label="Plus d’informations, S`ouvre dans une nouvelle fenêtre">Plus d’informations</a>

                    <hr>
                    <div class="text-center">
                        <a id="cookieConsent2" data-mdb-dismiss="modal" class="btn btn-success">Tout autoriser</a>
                    </div>
                    <hr>
                    <div class="text-left text-bold mb-2">
                        Gérer les préférences de consentement
                    </div>
                    <div class="accordion" id="cookiePolice">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-plus mr-2"></i>cookies strictement nécessaires <span
                                        class="ml-2 text-success">Toujours actif</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-mdb-parent="#cookiePolice">
                                <div class="accordion-body">
                                    Ces cookies sont indispensables au bon fonctionnement du site web et ne
                                    peuvent pas être désactivés. Ils ne sont généralement qu'activés en réponse à
                                    des actions que vous effectuez et qui correspondent à une demande de services,
                                    comme la configuration de vos préférences de confidentialité, la connexion ou le
                                    remplissage de formulaires. Vous pouvez configurer votre navigateur pour bloquer
                                    ou être alerté de l'utilisation de ces cookies.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fas fa-plus mr-2"></i>cookies de performance
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-mdb-parent="#cookiePolice">
                                <div class="accordion-body">
                                    Ces cookies nous permettent d’obtenir des statistiques de fréquentation et
                                    d’utilisation du site, afin d’en mesurer et d’en améliorer les performances en
                                    optimisant son ergonomie, sa navigation et ses contenus. Ils nous aident à connaître
                                    le nombre de visites, le nombre de pages vues et les sources de trafic, mais aussi à
                                    identifier où les utilisateurs arrivent et quittent notre site, quel est leurs
                                    parcours dans notre site et comment il est utilisé. Ils nous permettent également
                                    d’obtenir des statistiques à propos de la localisation géographique des utilisateurs
                                    (région, ville), du type d’appareil utilisé ainsi que des centres d’intérêt des
                                    utilisateurs. En désactivant ces cookies, nous ne pourrons pas analyser le trafic du
                                    site dans le but de l’optimiser.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <i class="fas fa-plus mr-2"></i>cookies de fonctionnalité
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-mdb-parent="#cookiePolice">
                                <div class="accordion-body">
                                    Ces cookies permettent de vous proposer une expérience et des fonctionnalités
                                    adaptées à votre utilisation. Ils peuvent être activés par nous-mêmes ou par des
                                    tiers dont les services sont utilisés sur les pages de notre site web. Si vous
                                    n'acceptez pas cette catégorie de cookies, certaines fonctionnalités sont
                                    susceptibles de ne pas fonctionner correctement.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFor">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                                    <i class="fas fa-plus mr-2"></i>cookies pour une publicité ciblée
                                </button>
                            </h2>
                            <div id="collapseFor" class="accordion-collapse collapse" aria-labelledby="headingFor"
                                data-mdb-parent="#cookiePolice">
                                <div class="accordion-body">
                                    Ces cookies sont activés sur notre site web par nos partenaires publicitaires. Ils
                                    peuvent être utilisés par ces entreprises pour établir des profils sur vos intérêts,
                                    afin de vous proposer des publicités ciblées sur d’autres sites. Si vous n'acceptez
                                    pas cette catégorie de cookies, des publicités moins ciblées sur vos intérêts vous
                                    seront proposées lors de votre navigation sur d'autres sites web.
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-mdb-target="#cookie" data-mdb-toggle="modal"
                    data-mdb-dismiss="modal" data-mdb-toggle="modal" data-mdb-dismiss="modal">Retour</button>
            </div>
        </div>
    </div>
</div>

<!-- Flexbox container for aligning the toasts -->
<div id="cookie_notif" aria-live="polite" aria-atomic="true" class="justify-content-center align-items-center"
    style="display: flex; position: fixed;min-height: 200px;top: -22px;left: 9px;z-index: 9;">

    <!-- Then put toasts within -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
        style="opacity: 1 !important;box-shadow: 0 0 4px #0000008c;background: #0000008c;">
        <div class="toast-header" style="background: #00000000;color: white;">
            <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
            <strong class="mr-auto">Consentement des cookies</strong>
        </div>
        <div class="toast-body text-center">
            <p class="text-white text-bold">Avant de continuer merci d'accepter les cookies.</p>
            <button type="button" class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#cookie">
                Afficher les cookies
            </button>
        </div>
    </div>
</div>

@endif

@if (Session::get('cookie-consent') == 'accord-ok')

@else
    <script type="text/javascript">
        if (localStorage.getItem("cookie-consent") === null) {

            document.getElementById('cookie_notif').style.display = 'flex';
            document.getElementById("cookieConsent").addEventListener('click', function() {
                localStorage.setItem("cookie-consent", "accord-ok")
                {{ Session::put('cookie-consent', 'accord-ok') }}
                document.getElementById('cookie_notif').style.display = 'none';
            });
            document.getElementById("cookieConsent2").addEventListener('click', function() {
                localStorage.setItem("cookie-consent", "accord-ok")
                document.getElementById('cookie_notif').style.display = 'none';
            });
        } else {
            {{ Session::put('cookie-consent', 'accord-ok') }}
            document.getElementById('cookie_notif').style.opacity = '0';
            document.getElementById('cookie_notif').style.display = 'none';
        }

    </script>
@endif
