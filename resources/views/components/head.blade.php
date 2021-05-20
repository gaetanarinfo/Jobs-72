<div style="background-color: rgb(35, 9, 57); padding: 5rem 2rem 8rem 2rem !important;">
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="text-left mt-4 mb-0 text-white" style="margin-left: 1em;">Trouvez le job qui vous convient
                vraiment.</h3>
            <div class="row row-cols-1 row-cols-md-3 mt-4">
                <form action="{{ route('search') }}" method="POST" style="width: 100%;" id="search_form">
                    <div class="input-group">
                        <input style="height: 60px;" type="search" name="q" class="form-control rounded form-p"
                            placeholder="Titre de poste ou mot-clé" id="q">
                        <button type="submit" class="btn btn-info ripple-surface"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            
            <hr id="search_hr" style="background-color: white;opacity: 0.45;max-width: 717px;margin: 0 auto;margin-top: 20px;margin-bottom: 4px; display: none;">

            <div id="load" class="text-center mt-2"></div>

            <div class="row mb-2 mt-3" id="search_res"></div>

            <div class="text-left mt-4 mb-0" style="margin-left: 1em;" id="search_cat">
                <p class="text-white">Recherches fréquentes</p>

                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Télétravail') }}" class="text-white">Télétravail</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'RH') }}" class="text-white">RH</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Commercial') }}" class="text-white">Commercial</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Distribution') }}" class="text-white">Distribution</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'IT') }}" class="text-white">IT</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Logistique') }}" class="text-white">Logistique</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Finance') }}" class="text-white">Finance</a></span>
                <span class="badge badge-p mr-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Alternance') }}" class="text-white">Alternance</a></span>
                <span class="badge badge-p mr-2 mb-2"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Marketing') }}" class="text-white">Marketing</a></span>
                <span class="badge badge-p"><i class="fas fa-search"></i> <a href="{{ route('search_mot', 'Ingénierie') }}" class="text-white">Ingénierie</a></span>
            </div>
        </div>
    </div>
</div>
