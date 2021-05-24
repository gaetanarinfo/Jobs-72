function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear(),
        hours = d.getUTCHours(),
        minutes = d.getUTCMinutes();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [day, '/', month, '/', year, ' à', ' ', hours, ':', minutes].join('');
}

const form = document.getElementById('search_form_news');

form.addEventListener('submit', function(e) {

    e.preventDefault();

    const token = document.querySelector('meta[name="csrf-token"]').content,
        url = this.getAttribute('action'),
        countNews = document.getElementById('search_count_news'),
        search_input = document.getElementById('search_input').value;

    fetch(url, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        method: 'post',
        body: JSON.stringify({
            search_input: search_input
        })
    }).then(res => {
        res.json().then(data => {

            const posts = document.getElementById('search_res_news'),
                loading = document.getElementById('load_news');

            loading.style.display = 'block';

            loading.innerHTML = `<div class="spinner-grow text-info" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>`;

            posts.innerHTML = '';
            countNews.innerHTML = '';
            countNews.removeAttribute('class', 'mb-2');

            setTimeout(() => {

                if (countNews.innerHTML == '') {

                    const dataNews = data.news.data;

                    countNews.setAttribute('class', 'mb-2');

                    countNews.innerHTML = `Nous avons trouvé <b>${ dataNews.length } article(s)</b> pour vous.`;

                    dataNews.forEach(e => {
                        posts.innerHTML += `<div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="images/news/${ e.image }" class="img-fluid" />
                            <a href="article/${ e.id }">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${ e.title }</h5>
                            <div class="mb-1 text-muted"><i class="fas fa-clock text-warning" aria-hidden="true"></i> Mise
                                en ligne le ${ formatDate(e.created_at) }</div>
                            <p class="card-text">
                                ${ e.smallContent }
                            </p>
                            <a href="article/${ e.id }"
                                class="btn btn-outline-success ripple-surface ripple-surface-dark">Lire la
                                suite</a>
                        </div>
                    </div>
                </div>
                    `
                    });

                }

            }, 2500);

            setTimeout(() => {

                loading.innerHTML = '';
                loading.style.display = 'none';

            }, 2600);

        })
    }).catch(error => {

    })

})

const form2 = document.getElementById('search_form_news_cat');

form2.addEventListener('submit', function(e) {

    e.preventDefault();

    const token = document.querySelector('meta[name="csrf-token"]').content,
        url = this.getAttribute('action'),
        countNews = document.getElementById('search_count_news_cat'),
        search_cat = document.getElementById('search_cat_input').value;

    fetch(url, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        method: 'post',
        body: JSON.stringify({
            search_cat: search_cat
        })
    }).then(res => {
        res.json().then(data => {

            const posts = document.getElementById('search_res_news'),
                loading = document.getElementById('load_news');

            loading.style.display = 'block';

            loading.innerHTML = `<div class="spinner-grow text-info" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>`;

            posts.innerHTML = '';
            countNews.innerHTML = '';
            countNews.removeAttribute('class', 'mb-2');

            setTimeout(() => {

                if (countNews.innerHTML == '') {

                    const dataNews = data.news.data;

                    countNews.setAttribute('class', 'mb-2');

                    countNews.innerHTML = `Nous avons trouvé <b>${ dataNews.length } article(s)</b> pour vous.`;

                    dataNews.forEach(e => {
                        posts.innerHTML += `<div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="images/news/${ e.image }" class="img-fluid" />
                            <a href="article/${ e.id }">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${ e.title }</h5>
                            <div class="mb-1 text-muted"><i class="fas fa-clock text-warning" aria-hidden="true"></i> Mise
                                en ligne le ${ formatDate(e.created_at) }</div>
                            <p class="card-text">
                                ${ e.smallContent }
                            </p>
                            <a href="article/${ e.id }"
                                class="btn btn-outline-success ripple-surface ripple-surface-dark">Lire la
                                suite</a>
                        </div>
                    </div>
                </div>
                    `
                    });

                }

            }, 2500);

            setTimeout(() => {

                loading.innerHTML = '';
                loading.style.display = 'none';

            }, 2600);

        })
    }).catch(error => {

    })

})