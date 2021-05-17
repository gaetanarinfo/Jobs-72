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

const form = document.getElementById('search_form');

form.addEventListener('submit', function(e) {

    e.preventDefault();

    const token = document.querySelector('meta[name="csrf-token"]').content,
        url = this.getAttribute('action'),
        q = document.getElementById('q').value;

    fetch(url, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        method: 'post',
        body: JSON.stringify({
            q: q
        })
    }).then(res => {
        res.json().then(data => {

            const posts = document.getElementById('search_res'),
                cat = document.getElementById('search_cat'),
                hr = document.getElementById('search_hr'),
                loading = document.getElementById('load');

            hr.style.display = 'block';

            loading.style.display = 'block';

            loading.innerHTML = `<div class="spinner-grow text-info" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>`;

            setTimeout(() => {

                cat.style.display = 'none';
                posts.innerHTML = '';

                data.jobs.data.forEach(e => {
                    posts.innerHTML += `<div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250" style="min-height: 390px;">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-success">${ e.category }</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="emplois/${ e.id }/${ e.author }" target="_blank">${ e.title }</a>
                                </h3>
                                <div class="mb-1 text-muted mt-1"><i class="fas fa-clock text-warning" aria-hidden="true"></i> Mise en ligne le ${ formatDate(e.created_at) }</div>
                                <div class="mb-1 text-muted"> <i class="fas fa-map-pin text-secondary"></i> <strong>${ e.localisation }</strong></div>
                                <p class="card-text mb-auto">${ e.smallContent }</p>
                                <a href="emplois/${ e.id }/${ e.author }" target="_blank" class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Postuler</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block" alt="${ e.title }"
                                style="position: relative;width: 267px;top: 19px;left: -10px;height: 192px;"
                                src="images/jobs/${ e.image }">
                        </div>
                    </div>
                    `
                });

            }, 2500);

            setTimeout(() => {

                loading.innerHTML = '';
                loading.style.display = 'none';

            }, 2600);

        })
    }).catch(error => {

    })

})