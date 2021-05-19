<link rel="stylesheet" type="text/css" href="{{ asset('css/input-file.css') }}">

<section class="about section bg-2" id="about">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 align-self-center text-center">
                <!-- Image Content -->
                <div class="image-block">
                    <img class="phone-thumb-md"
                        src="images/png-clipart-tool-boxes-computer-icons-itunes-s-website-pages.png"
                        style="max-width: 254px;" alt="image-feature">
                </div>
            </div>
            <div class="col-lg-6 col-md-10 m-md-auto align-self-center ml-auto">
                <div class="about-block">
                    <!-- About 01 -->
                    <div class="about-item">
                        <div class="icon">
                            <i class="ti-star"></i>
                        </div>
                        <div class="content">
                            <h5>DES TARIFS UNIQUES</h5>
                            <p>Des tarifs attractifs pour tout les budgets et tous les professionnels qui désire
                                recruter sans se ruiner à travers diverse offre que nous proposons.</p>
                            <button data-mdb-toggle="modal" data-mdb-target="#modalDevis"
                                class="btn btn-warning ripple-surface ripple-surface-dark">Demandez un devis</button>
                        </div>
                    </div>
                    <!-- About 02 -->
                    <div class="about-item active">
                        <div class="icon">
                            <i class="ti-panel"></i>
                        </div>
                        <div class="content">
                            <h5>FACILE À UTILISER</h5>
                            <p>Un panel complet intuitif et facile d'utilisation, notre espace recruteur est là pour
                                vous alors venez le découvrir.</p>
                        </div>
                    </div>
                    <!-- About 03 -->
                    <div class="about-item">
                        <div class="icon">
                            <i class="ti-vector"></i>
                        </div>
                        <div class="content">
                            <h5>MEILLEURE EXPÉRIENCE UTILISATEUR</h5>
                            <p>Notre site internet et simple d'utilisation avec différentes fonctionnalités inscrivez
                                vous en quelques clics et postuler sur de nombreuses offres d'emploi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal Devis -->
<div class="modal fade" id="modalDevis" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Demande de devis</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('devis') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-4">
                        <div class="input-group">
                            <div class="input-group-text"><i class="far fa-building"></i></div>
                            <input type="text" name="society" @error('society') is-invalid @enderror
                                    placeholder="Nom de votre société" required class="form-control" />

                                @error('society')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-sort-numeric-up"></i></div>
                                <input type="text" @error('socialD') is-invalid @enderror
                                        placeholder="Votre SIRET ou SIREN (9) / (14) Chiffres" name="socialD"
                                        oninput="maxLengthCheck(this)" min="9" max="99999999999999" maxlength="14" required
                                        class="form-control" />

                                    @error('socialD')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <script>
                                    function maxLengthCheck(object) {
                                        if (object.value.length > object.maxLength)
                                            object.value = object.value.slice(0, object.maxLength)
                                    }

                                </script>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" @error('name') is-invalid @enderror name="name" required class="form-control" />
                                    <label class="form-label">Votre nom</label>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                        <input @error('phone') is-invalid @enderror type="text" placeholder="02-00-00-00-00"
                                                pattern="[0-2]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" name="phone" required
                                                class="form-control" />
                                        </div>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                            <input type="email" name="email" @error('email') is-invalid @enderror
                                                    placeholder="Votre adresse email" required class="form-control" />

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <select class="select form-control" @error('salarie') is-invalid @enderror required name="salarie">
                                                    <option value="" disabled selected hidden>Nombre de salarié dans l'entreprise</option>
                                                    <option value="0 > 10">0 > 10</option>
                                                    <option value="10 > 30">10 > 30</option>
                                                    <option value="30 > 50">30 > 50</option>
                                                    <option value="+ 50">+ 50</option>
                                                </select>

                                                @error('salarie')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <select class="select form-control" @error('typePoste') is-invalid @enderror name="typePoste" required>
                                                        <option value="" disabled selected hidden>Type de poste (En moyenne)</option>
                                                        <option value="0 > 10">0 > 10</option>
                                                        <option value="10 > 20">10 > 20</option>
                                                        <option value="20 > 30">20 > 30</option>
                                                        <option value="+ 30">+ 30</option>
                                                    </select>

                                                    @error('typePost')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="fas fa-map-pin"></i></div>
                                                        <input type="text" name="adress" @error('adress') is-invalid @enderror
                                                            placeholder="Votre adresse" required class="form-control" />

                                                        @error('adress')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="text" name="city" required class="form-control" />
                                                    <label class="form-label">Ville</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="text" name="cp" @error('cp') is-invalid @enderror required class="form-control" />
                                                    <label class="form-label">Code postal</label>

                                                    @error('cp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <select class="select form-control" @error('pays') is-invalid @enderror name="pays" required>
                                                        <optgroup label="Afrique">
                                                            <option value="afriqueDuSud">Afrique Du Sud</option>
                                                            <option value="algerie">Algérie</option>
                                                            <option value="angola">Angola</option>
                                                            <option value="benin">Bénin</option>
                                                            <option value="botswana">Botswana</option>
                                                            <option value="burkina">Burkina</option>
                                                            <option value="burundi">Burundi</option>
                                                            <option value="cameroun">Cameroun</option>
                                                            <option value="capVert">Cap-Vert</option>
                                                            <option value="republiqueCentre-Africaine">République Centre-Africaine</option>
                                                            <option value="comores">Comores</option>
                                                            <option value="republiqueDemocratiqueDuCongo">République Démocratique Du Congo
                                                            </option>
                                                            <option value="congo">Congo</option>
                                                            <option value="coteIvoire">Côte d'Ivoire</option>
                                                            <option value="djibouti">Djibouti</option>
                                                            <option value="egypte">Égypte</option>
                                                            <option value="ethiopie">Éthiopie</option>
                                                            <option value="erythrée">Érythrée</option>
                                                            <option value="gabon">Gabon</option>
                                                            <option value="gambie">Gambie</option>
                                                            <option value="ghana">Ghana</option>
                                                            <option value="guinee">Guinée</option>
                                                            <option value="guinee-Bisseau">Guinée-Bisseau</option>
                                                            <option value="guineeEquatoriale">Guinée Équatoriale</option>
                                                            <option value="kenya">Kenya</option>
                                                            <option value="lesotho">Lesotho</option>
                                                            <option value="liberia">Liberia</option>
                                                            <option value="libye">Libye</option>
                                                            <option value="madagascar">Madagascar</option>
                                                            <option value="malawi">Malawi</option>
                                                            <option value="mali">Mali</option>
                                                            <option value="maroc">Maroc</option>
                                                            <option value="maurice">Maurice</option>
                                                            <option value="mauritanie">Mauritanie</option>
                                                            <option value="mozambique">Mozambique</option>
                                                            <option value="namibie">Namibie</option>
                                                            <option value="niger">Niger</option>
                                                            <option value="nigeria">Nigeria</option>
                                                            <option value="ouganda">Ouganda</option>
                                                            <option value="rwanda">Rwanda</option>
                                                            <option value="saoTomeEtPrincipe">Sao Tomé-et-Principe</option>
                                                            <option value="senegal">Séngal</option>
                                                            <option value="seychelles">Seychelles</option>
                                                            <option value="sierra">Sierra</option>
                                                            <option value="somalie">Somalie</option>
                                                            <option value="soudan">Soudan</option>
                                                            <option value="swaziland">Swaziland</option>
                                                            <option value="tanzanie">Tanzanie</option>
                                                            <option value="tchad">Tchad</option>
                                                            <option value="togo">Togo</option>
                                                            <option value="tunisie">Tunisie</option>
                                                            <option value="zambie">Zambie</option>
                                                            <option value="zimbabwe">Zimbabwe</option>
                                                        </optgroup>
                                                        <optgroup label="Amérique">
                                                            <option value="antiguaEtBarbuda">Antigua-et-Barbuda</option>
                                                            <option value="argentine">Argentine</option>
                                                            <option value="bahamas">Bahamas</option>
                                                            <option value="barbade">Barbade</option>
                                                            <option value="belize">Belize</option>
                                                            <option value="bolivie">Bolivie</option>
                                                            <option value="bresil">Brésil</option>
                                                            <option value="canada">Canada</option>
                                                            <option value="chili">Chili</option>
                                                            <option value="colombie">Colombie</option>
                                                            <option value="costaRica">Costa Rica</option>
                                                            <option value="cuba">Cuba</option>
                                                            <option value="republiqueDominicaine">République Dominicaine</option>
                                                            <option value="dominique">Dominique</option>
                                                            <option value="equateur">Équateur</option>
                                                            <option value="etatsUnis">États Unis</option>
                                                            <option value="grenade">Grenade</option>
                                                            <option value="guatemala">Guatemala</option>
                                                            <option value="guyana">Guyana</option>
                                                            <option value="haiti">Haïti</option>
                                                            <option value="honduras">Honduras</option>
                                                            <option value="jamaique">Jamaïque</option>
                                                            <option value="mexique">Mexique</option>
                                                            <option value="nicaragua">Nicaragua</option>
                                                            <option value="panama">Panama</option>
                                                            <option value="paraguay">Paraguay</option>
                                                            <option value="perou">Pérou</option>
                                                            <option value="saintCristopheEtNieves">Saint-Cristophe-et-Niévès</option>
                                                            <option value="sainteLucie">Sainte-Lucie</option>
                                                            <option value="saintVincentEtLesGrenadines">Saint-Vincent-et-les-Grenadines</option>
                                                            <option value="salvador">Salvador</option>
                                                            <option value="suriname">Suriname</option>
                                                            <option value="triniteEtTobago">Trinité-et-Tobago</option>
                                                            <option value="uruguay">Uruguay</option>
                                                            <option value="venezuela">Venezuela</option>
                                                        </optgroup>
                                                        <optgroup label="Asie">
                                                            <option value="afghanistan">Afghanistan</option>
                                                            <option value="arabieSaoudite">Arabie Saoudite</option>
                                                            <option value="armenie">Arménie</option>
                                                            <option value="azerbaidjan">Azerbaïdjan</option>
                                                            <option value="bahrein">Bahreïn</option>
                                                            <option value="bangladesh">Bangladesh</option>
                                                            <option value="bhoutan">Bhoutan</option>
                                                            <option value="birmanie">Birmanie</option>
                                                            <option value="brunei">Brunéi</option>
                                                            <option value="cambodge">Cambodge</option>
                                                            <option value="chine">Chine</option>
                                                            <option value="coreeDuSud">Corée Du Sud</option>
                                                            <option value="coreeDuNord">Corée Du Nord</option>
                                                            <option value="emiratsArabeUnis">Émirats Arabe Unis</option>
                                                            <option value="georgie">Géorgie</option>
                                                            <option value="inde">Inde</option>
                                                            <option value="indonesie">Indonésie</option>
                                                            <option value="iraq">Iraq</option>
                                                            <option value="iran">Iran</option>
                                                            <option value="israel">Israël</option>
                                                            <option value="japon">Japon</option>
                                                            <option value="jordanie">Jordanie</option>
                                                            <option value="kazakhstan">Kazakhstan</option>
                                                            <option value="kirghistan">Kirghistan</option>
                                                            <option value="koweit">Koweït</option>
                                                            <option value="laos">Laos</option>
                                                            <option value="liban">Liban</option>
                                                            <option value="malaisie">Malaisie</option>
                                                            <option value="maldives">Maldives</option>
                                                            <option value="mongolie">Mongolie</option>
                                                            <option value="nepal">Népal</option>
                                                            <option value="oman">Oman</option>
                                                            <option value="ouzbekistan">Ouzbékistan</option>
                                                            <option value="pakistan">Pakistan</option>
                                                            <option value="philippines">Philippines</option>
                                                            <option value="qatar">Qatar</option>
                                                            <option value="singapour">Singapour</option>
                                                            <option value="sriLanka">Sri Lanka</option>
                                                            <option value="syrie">Syrie</option>
                                                            <option value="tadjikistan">Tadjikistan</option>
                                                            <option value="taiwan">Taïwan</option>
                                                            <option value="thailande">Thaïlande</option>
                                                            <option value="timorOriental">Timor oriental</option>
                                                            <option value="turkmenistan">Turkménistan</option>
                                                            <option value="turquie">Turquie</option>
                                                            <option value="vietNam">Viêt Nam</option>
                                                            <option value="yemen">Yemen</option>
                                                        </optgroup>
                                                        <optgroup label="Europe">
                                                            <option value="allemagne">Allemagne</option>
                                                            <option value="albanie">Albanie</option>
                                                            <option value="andorre">Andorre</option>
                                                            <option value="autriche">Autriche</option>
                                                            <option value="bielorussie">Biélorussie</option>
                                                            <option value="belgique">Belgique</option>
                                                            <option value="bosnieHerzegovine">Bosnie-Herzégovine</option>
                                                            <option value="bulgarie">Bulgarie</option>
                                                            <option value="croatie">Croatie</option>
                                                            <option value="danemark">Danemark</option>
                                                            <option value="espagne">Espagne</option>
                                                            <option value="estonie">Estonie</option>
                                                            <option value="finlande">Finlande</option>
                                                            <option value="france">France</option>
                                                            <option value="grece">Grèce</option>
                                                            <option value="hongrie">Hongrie</option>
                                                            <option value="irlande">Irlande</option>
                                                            <option value="islande">Islande</option>
                                                            <option value="italie">Italie</option>
                                                            <option value="lettonie">Lettonie</option>
                                                            <option value="liechtenstein">Liechtenstein</option>
                                                            <option value="lituanie">Lituanie</option>
                                                            <option value="luxembourg">Luxembourg</option>
                                                            <option value="exRepubliqueYougoslaveDeMacedoine">Ex-République Yougoslave de
                                                                Macédoine</option>
                                                            <option value="malte">Malte</option>
                                                            <option value="moldavie">Moldavie</option>
                                                            <option value="monaco">Monaco</option>
                                                            <option value="norvege">Norvège</option>
                                                            <option value="paysBas">Pays-Bas</option>
                                                            <option value="pologne">Pologne</option>
                                                            <option value="portugal">Portugal</option>
                                                            <option value="roumanie">Roumanie</option>
                                                            <option value="royaumeUni">Royaume-Uni</option>
                                                            <option value="russie">Russie</option>
                                                            <option value="saintMarin">Saint-Marin</option>
                                                            <option value="serbieEtMontenegro">Serbie-et-Monténégro</option>
                                                            <option value="slovaquie">Slovaquie</option>
                                                            <option value="slovenie">Slovénie</option>
                                                            <option value="suede">Suède</option>
                                                            <option value="suisse">Suisse</option>
                                                            <option value="republiqueTcheque">République Tchèque</option>
                                                            <option value="ukraine">Ukraine</option>
                                                            <option value="vatican">Vatican</option>
                                                        </optgroup>
                                                        <optgroup label="Océanie">
                                                            <option value="australie">Australie</option>
                                                            <option value="fidji">Fidji</option>
                                                            <option value="kiribati">Kiribati</option>
                                                            <option value="marshall">Marshall</option>
                                                            <option value="micronesie">Micronésie</option>
                                                            <option value="nauru">Nauru</option>
                                                            <option value="nouvelleZelande">Nouvelle-Zélande</option>
                                                            <option value="palaos">Palaos</option>
                                                            <option value="papouasieNouvelleGuinee">Papouasie-Nouvelle-Guinée</option>
                                                            <option value="salomon">Salomon</option>
                                                            <option value="samoa">Samoa</option>
                                                            <option value="tonga">Tonga</option>
                                                            <option value="tuvalu">Tuvalu</option>
                                                            <option value="vanuatu">Vanuatu</option>
                                                        </optgroup>
                                                    </select>

                                                    @error('pays')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <textarea class="form-control" required @error('content') is-invalid @enderror name="content"
                                                        rows="4"></textarea>
                                                    <label class="form-label">Votre message</label>

                                                    @error('content')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-4">
                                                    <input type="file" name="doc" @error('doc') is-invalid @enderror"
                                                        accept=".pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*"
                                                        id="doc" class="form-control" />

                                                    @error('doc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-block mb-4">Envoyer le devis</button>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                                Fermer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script src="{{ asset('js/input-file.js') }}"></script>
                            <script type="text/javascript">
                                new InputFile({
                                    // options
                                });

                            </script>
