<footer class="text-center text-white" style="background-color: rgb(35, 9, 57) !important;">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">

            <!-- Twitter -->
            <a class="btn btn-outline-white btn-floating m-1 text-white" href="https://twitter.com/OverGames72" role="button"><i
                    class="fab fa-twitter"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-white btn-floating m-1 text-white" href="https://www.linkedin.com/in/ga%C3%ABtan-seigneur-2b3357200/" role="button"><i
                    class="fab fa-linkedin-in"></i></a>

        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                    <p class="pt-2">
                        <strong>Inscrivez-vous à notre newsletter</strong>
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-auto">
                    <!-- Submit button -->
                    <a href="{{ url('/newsletter') }}" class="btn btn-outline-success mb-4 text-white">
                        S'abonner
                    </a>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Présent dans plus de 100 pays, jobs-72 est l'inventeur du recrutement en ligne et l'un des leaders en
                matière de recherche d'emploi. Grâce à ses algorithmes puissants, Jobs-72 vous propose des milliers
                d'emplois en TPE, PME et grandes entreprises en France. Saisissez dans notre moteur de recherche
                d'emploi un mot-clé lié au métier que vous souhaitez exercer ainsi que le nom de la ville ou de la
                région où vous souhaitez trouver votre nouveau poste ; nous vous montrerons une sélection d'annonces
                correspondant à vos critères de recherche. Pour être identifié(e) par les centaines de recruteurs qui
                chaque jour consultent la CVthèque JOBS-72, déposez votre CV sur JOBS-72 et mettez-le à jour
                régulièrement afin d'optimiser vos chances d'être contacté(e) par les entreprises qui recrutent des
                professionnels ayant votre profil.
            </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section>
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-warning">Espace candidats</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ url('offres-emploi') }}" class="text-white">Toutes les offres</a>
                        </li>
                        <li>
                            <a href="#career" class="text-white">Conseils Carrière</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="text-white">Mon espace</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-warning">Espace recruteurs</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#recruter" class="text-white">Nos produits</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="text-white">Espace recruteur</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-warning">Liens utiles</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="" data-mdb-toggle="modal" data-mdb-target="#mention" title="Mentions légales"
                                class="text-white">Mentions légales</a>
                        </li>
                        <li>
                            <a href="" data-mdb-toggle="modal" data-mdb-target="#cgu"
                                title="Conditions générale d’utilisation" class="text-white">Conditions générale
                                d’utilisation</a>
                        </li>
                        <li>
                            <a href="" data-mdb-toggle="modal" data-mdb-target="#cgv"
                                title="Conditions générale de vente" class="text-white">Conditions générale de vente</a>
                        </li>
                        <li>
                            <a href="" data-mdb-toggle="modal" data-mdb-target="#dp" title="Données personnelles"
                                class="text-white">Données personnelles</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright -
        <a class="text-white" href="">Gaëtan Seigneur - Jobs-72</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
