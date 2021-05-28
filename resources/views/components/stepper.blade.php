<style>
    .steps .step {
        display: block;
        width: 100%;
        margin-bottom: 35px;
        text-align: center
    }

    .steps .step .step-icon-wrap {
        display: block;
        position: relative;
        width: 100%;
        height: 80px;
        text-align: center
    }

    .steps .step .step-icon-wrap::before,
    .steps .step .step-icon-wrap::after {
        display: block;
        position: absolute;
        top: 50%;
        width: 50%;
        height: 3px;
        margin-top: -1px;
        background-color: #e1e7ec;
        content: '';
        z-index: 1
    }

    .steps .step .step-icon-wrap::before {
        left: 0
    }

    .steps .step .step-icon-wrap::after {
        right: 0
    }

    .steps .step .step-icon {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        border: 1px solid #e1e7ec;
        border-radius: 50%;
        background-color: #f5f5f5;
        color: #374250;
        font-size: 38px;
        line-height: 81px;
        z-index: 5
    }

    .steps .step .step-title {
        margin-top: 16px;
        margin-bottom: 0;
        color: #606975;
        font-size: 14px;
        font-weight: 500
    }

    .steps .step:first-child .step-icon-wrap::before {
        display: none
    }

    .steps .step:last-child .step-icon-wrap::after {
        display: none
    }

    .steps .step.completed .step-icon-wrap::before,
    .steps .step.completed .step-icon-wrap::after {
        background-color: #0da9ef
    }

    .steps .step.completed .step-icon {
        border-color: #0da9ef;
        background-color: #0da9ef;
        color: #fff
    }

    @media (max-width: 576px) {

        .flex-sm-nowrap .step .step-icon-wrap::before,
        .flex-sm-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 768px) {

        .flex-md-nowrap .step .step-icon-wrap::before,
        .flex-md-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 991px) {

        .flex-lg-nowrap .step .step-icon-wrap::before,
        .flex-lg-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 1200px) {

        .flex-xl-nowrap .step .step-icon-wrap::before,
        .flex-xl-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

</style>

<div class="container padding-bottom-3x mb-1 mt-5">

    <h4 class="mb-3 text-center"><strong>Déposer votre <strong>CV</strong> en un clic</strong></h4>

    <div class="text-center mb-3">
        <img src="images/cv.png" width="120px" alt="cv" class="clignote" />
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-add-user"></i></div>
                    </div>
                    <h4 class="step-title">Crée un compte.</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-config"></i></div>
                    </div>
                    <h4 class="step-title">Modifier votre profil.</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-medal"></i></div>
                    </div>
                    <h4 class="step-title">Déposer votre CV.</h4>
                </div>
                <div class="step completed">
                    <div class="step-icon-wrap">
                        <div class="step-icon"><i class="pe-7s-car"></i></div>
                    </div>
                    <h4 class="step-title">Postuler aux offres d'emploi.</h4>
                </div>
            </div>
        </div>
    </div>
