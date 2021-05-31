<div class="container mt-2 mb-5 fadeOn">

    <h4 class="mb-4 text-center"><strong>Trouver un emploi en France</strong></h4>

    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{ asset('images/france.png') }}" class="clignote" alt="france" width="120px"
                    height="120px" />
            </div>
        </div>
    </div>

    <div style="display: block;text-align: center;margin: 0 auto;">
        <div class="d-inline-block">
            <button class="btn btn-warning dropdown-toggle mr-2" type="button" id="cat1" data-mdb-toggle="dropdown"
                aria-expanded="false">
                Catégories les plus recherchées
            </button>
            <ul class="dropdown-menu" aria-labelledby="cat1" style="overflow: auto;max-height: 460px;">
                <li><a class="dropdown-item" href="{{ url('emplois', ['Ressources-Humaines']) }}"><span>
                            Emploi Ressources Humaines</span>
                    </a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Commercial']) }}"><span>
                            Emploi Commercial</span></a>
                </li>

                <li><a class="dropdown-item"
                        href="{{ url('emplois', ['Distribution-et-Grande-Distribution']) }}"><span>
                            Emploi Distribution et Grande Distribution</span>
                    </a></li>

                <li><a class="dropdown-item"
                        href="{{ url('emplois', ['Informatique-et-Technologie-de-l’information']) }}"><span>
                            Emploi Informatique et Technologie de l’information</span>
                    </a>
                </li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Logistique']) }}"><span>
                            Emploi Logistique</span></a>
                </li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Temps-partiel']) }}"><span>
                            Emploi Temps partiel</span>
                    </a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Maintenance-et-Réparation']) }}"><span>
                            Emploi Maintenance et Réparation</span>
                    </a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Tourisme']) }}"><span>
                            Emploi Tourisme</span></a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Finance']) }}"><span>
                            Emploi Finance</span></a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Alternance']) }}"><span>
                            Emploi Alternance</span></a>
                </li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Fashion']) }}"><span>
                            Emploi Fashion</span></a></li>

                <li><a class="dropdown-item" href={{ url('emplois', ['Marketing-et-Communication']) }}"><span>
                            Emploi Marketing et Communication</span>
                    </a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Restauration']) }}"><span>
                            Emploi Restauration</span>
                    </a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Transport']) }}"><span>
                            Emploi Transport</span></a></li>

                <li><a class="dropdown-item"
                        href="{{ url('emplois', ['Environnement-et-Développement-durable']) }}"><span>
                            Emploi Environnement et Développement durable</span>
                    </a>
                </li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Sécurité']) }}"><span>
                            Emploi Sécurité</span></a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Banque']) }}"><span>
                            Emploi Banque</span></a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Psychologue']) }}"><span>
                            Emploi Psychologue</span></a>
                </li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Hôtellerie']) }}"><span>
                            Emploi Hôtellerie</span></a>
                </li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Cadres-et-Direction']) }}"><span>
                            Emploi Cadres et Direction</span>
                    </a></li>

                <li><a class="dropdown-item" href="{{ url('emplois', ['Santé']) }}"><span>
                            Emploi Santé</span></a></li>
            </ul>
        </div>
        <div class="d-inline-block">
            <button class="btn btn-warning dropdown-toggle mr-2" type="button" id="cat3" data-mdb-toggle="dropdown"
                aria-expanded="false">
                Villes les plus recherchées
            </button>
            <ul class="dropdown-menu" aria-labelledby="cat3" style="overflow: auto;max-height: 460px;">
                <li name="dropdown-item-emploi paris "><a class="dropdown-item"
                        href="{{ route('order_city', 'paris') }}" data-name="dropdown-item-emploi paris ">Emploi
                        Paris
                    </a></li>
                <li name="dropdown-item-emploi marseille "><a class="dropdown-item"
                        href="{{ route('order_city', 'marseille') }}"
                        data-name="dropdown-item-emploi marseille ">Emploi Marseille </a></li>
                <li name="dropdown-item-emploi lyon "><a class="dropdown-item"
                        href="{{ route('order_city', 'lyon') }}s" data-name="dropdown-item-emploi lyon ">Emploi
                        Lyon </a></li>
                <li name="dropdown-item-emploi lille "><a class="dropdown-item"
                        href="{{ route('order_city', 'lille') }}" data-name="dropdown-item-emploi lille ">Emploi
                        Lille </a></li>
                <li name="dropdown-item-emploi montpellier"><a class="dropdown-item"
                        href="{{ route('order_city', 'montpellier') }}"
                        data-name="dropdown-item-emploi montpellier">Emploi
                        Montpellier</a></li>
                <li name="dropdown-item-emploi nantes "><a class="dropdown-item"
                        href="{{ route('order_city', 'nantes') }}" data-name="dropdown-item-emploi nantes ">Emploi
                        Nantes
                    </a></li>
                <li name="dropdown-item-emploi rennes"><a class="dropdown-item"
                        href="{{ route('order_city', 'rennes') }}" dropdown-item-emploi rennes">Emploi
                        Rennes</a></li>
                <li name="dropdown-item-emploi strasbourg"><a class="dropdown-item"
                        href="{{ route('order_city', 'strasbourg') }}"
                        data-name="dropdown-item-emploi strasbourg">Emploi
                        Strasbourg</a></li>
                <li name="dropdown-item-emploi nice"><a class="dropdown-item"
                        href="{{ route('order_city', 'nice') }}" data-name="dropdown-item-emploi nice">Emploi
                        Nice</a></li>
                <li name="dropdown-item-emploi toulouse"><a class="dropdown-item"
                        href="{{ route('order_city', 'toulouse') }}" data-name="dropdown-item-emploi toulouse">Emploi
                        Toulouse</a></li>
                <li name="dropdown-item-emploi bordeaux"><a class="dropdown-item"
                        href="{{ route('order_city', 'bordeaux') }}" data-name="dropdown-item-emploi bordeaux">Emploi
                        Bordeaux</a></li>
                <li name="dropdown-item-emploi reims"><a class="dropdown-item"
                        href="{{ route('order_city', 'reims') }}" dropdown-item-emploi reims">Emploi
                        Reims</a></li>
                <li name="dropdown-item-emploi saint-etienne"><a class="dropdown-item"
                        href="{{ route('order_city', 'saint-etienne') }}"
                        data-name="dropdown-item-emploi saint-etienne">Emploi Saint-Etienne</a></li>
                <li name="dropdown-item-emploi toulon"><a class="dropdown-item"
                        href="{{ route('order_city', 'toulon') }}" data-name="dropdown-item-emploi toulon">Emploi
                        Toulon</a></li>
                <li name="dropdown-item-emploi le havre"><a class="dropdown-item"
                        href="{{ route('order_city', 'le-havre') }}" data-name="dropdown-item-emploi le havre">Emploi
                        Le Havre</a></li>
                <li name="dropdown-item-emploi grenoble"><a class="dropdown-item"
                        href="/emploi/{{ route('order_city', 'grenoble') }}"
                        data-name="dropdown-item-emploi grenoble">Emploi
                        Grenoble</a></li>
                <li name="dropdown-item-emploi dijon"><a class="dropdown-item"
                        href="{{ route('order_city', 'dijon') }}" data-name="dropdown-item-emploi dijon">Emploi
                        Dijon</a></li>
                <li name="dropdown-item-emploi angers"><a class="dropdown-item"
                        href="{{ route('order_city', 'angers') }}" data-name="dropdown-item-emploi angers">Emploi
                        Angers</a></li>
                <li name="dropdown-item-emploi nîmes"><a class="dropdown-item"
                        href="{{ route('order_city', 'nîmes') }}" dropdown-item-emploi nîmes">Emploi
                        Nîmes</a></li>
                <li name="dropdown-item-emploi perpignan"><a class="dropdown-item"
                        href="{{ route('order_city', 'perpignan') }}"
                        data-name="dropdown-item-emploi perpignan">Emploi Perpignan</a></li>
            </ul>
        </div>
    </div>
</div>
