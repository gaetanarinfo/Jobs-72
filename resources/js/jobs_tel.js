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

const form_tel = document.getElementById('form_tel'),
    btn_check_valid = document.getElementById('btn_check_valid'),
    btn_check_reset = document.getElementById('btn_check_reset');

form_tel.addEventListener('submit', function(e) {

    e.preventDefault();

    const token = document.querySelector('meta[name="csrf-token"]').content,
        url = this.getAttribute('action'),
        q = document.getElementById('btn_check').value;

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
            const tel_res = document.getElementById('tel_res'),
                tel_res2 = document.getElementById('tel_res2'),
                loading = document.getElementById('load_tel');

            btn_check_valid.style.display = 'none';
            btn_check_reset.style.display = '';

            loading.style.display = 'block';

            loading.innerHTML = `<div class="spinner-grow text-info" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>`;

            setTimeout(() => {

                tel_res2.style.display = 'none';
                tel_res.innerHTML = '';

                data.jobs.data.forEach(e => {
                    tel_res.innerHTML += `<div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250" style="min-height: 390px;">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">${e.category}</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="emplois/${e.id}/${e.author}" target="_blank">${e.title}</a>
                    </h3>
                    <div class="mb-1 text-muted mt-1"><i class="fas fa-clock text-warning" aria-hidden="true"></i> Mise en ligne le ${formatDate(e.created_at)}</div>
                    <div class="mb-1 text-muted"> <i class="fas fa-map-pin text-secondary"></i> <strong>${e.localisation}</strong></div>
                    <p class="card-text mb-auto">${e.smallContent}</p>
                    <a href="emplois/${e.id}/${e.author}" target="_blank" class="btn btn-outline-success ripple-surface ripple-surface-dark mt-2">Postuler</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" alt="${e.title}"
                    style="position: relative;width: 267px;top: 19px;left: -10px;height: 192px;"
                    src="images/jobs/${e.image}">
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
    })
})

btn_check_reset.addEventListener('click', function(e) {

    e.preventDefault();

    const tel_res = document.getElementById('tel_res'),
        tel_res2 = document.getElementById('tel_res2'),
        btn_check = document.getElementById('btn_check');

    btn_check.checked = false;

    tel_res2.style.display = '';
    tel_res.style.display = 'none';

    btn_check_valid.style.display = '';
    btn_check_reset.style.display = 'none';

})