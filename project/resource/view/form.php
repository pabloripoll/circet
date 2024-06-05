<?= $this->view('_common.head'); ?>

<?= $this->view('_common.header', ['page' => $page]); ?>

<div class="py-5 text-center">
    <h2>Register Page</h2>
    <p class="lead"></p>
</div>
<div class="row g-5">
    <div class="col-md-12">
        <h4 class="mb-3">Inscription Form <?= (! isset($register) ? : '- Update ID: '.($register->id ?? 'NOT FOUND')) ?></h4>
        <input type="hidden" id="formType" value="<?= (! isset($register) ? 'create' : 'update') ?>">
        <input type="hidden" id="formTypeId" value="<?= $register->id ?? '' ?>">
        <form id="inscription" class="needs-validation" onsubmit="return false" novalidate>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">First name</label>
                    <input type="text" class="form-control" id="name" value="<?= $register->name ?? '' ?>" placeholder="" required>
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>
                <div class="col-sm-6">
                    <label for="surname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="surname" placeholder="" value="<?= $register->surname ?? '' ?>" required>
                    <div class="invalid-feedback">Valid last name is required.</div>
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?= $register->email ?? '' ?>" required>
                    <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label">Phone <span class="text-body-secondary">(Optional)</span></label>
                    <input type="phone" class="form-control" id="phone" placeholder="+34 555 555 555" value="<?= $register->phone ?? '' ?>">
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?= $register->address ?? '' ?>" required>
                    <div class="invalid-feedback">Please enter your shipping address.</div>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terms" value="1" checked>
                <label class="form-check-label" for="terms">I agreed with with <a href="#">"Terms of Use"</a></label>
            </div>
            <hr class="my-4">
            <div id="submit-status" class="alert alert-light" role="alert">&nbsp;</div>
            <button class="w-100 btn btn-primary btn-lg" type="submit" id="submit-button">Confirm and Send</button>
        </form>
    </div>
</div>

<script>

let checkbox = document.getElementsByClassName('form-check-input')[0]
checkbox.addEventListener('change', function(){this.value = this.checked})

const form = document.getElementById("inscription")
const formType = document.querySelector('#formType')
const formTypeId = document.querySelector('#formTypeId')
const submitStatus = document.querySelector('#submit-status')
const submitButton = document.querySelector('#submit-button')
const formFields = document.querySelectorAll('.form-control')

function formAvailability(state = true) {
    if (state == false) {
        submitButton.classList.add(`btn-secondary`)
        submitButton.classList.remove(`btn-primary`)
        submitButton.innerHTML = `Wait...`

        for (var i = 0, l = form.length; i < l; ++i) {
            form[i].disabled = true
        }

        return
    }

    if (state == 'finished') {
        submitButton.classList.add(`btn-success`)
        submitButton.classList.remove(`btn-primary`)
        submitButton.innerHTML = `Done!`

        for (var i = 0, l = form.length; i < l; ++i) {
            form[i].readOnly = true
        }

        return
    }

    submitButton.classList.add(`btn-primary`)
    submitButton.classList.remove(`btn-success`)
    submitButton.classList.remove(`btn-secondary`)
    submitButton.innerHTML = `Confirm and Send`

    for (var i = 0, l = form.length; i < l; ++i) {
        form[i].disabled = false
    }

    return
}

function formStatus(state = 'neutral') {
    if (state == 'neutral') {
        submitStatus.innerHTML = '&nbsp;'
        submitStatus.classList.add(`alert-light`)
        submitStatus.classList.remove(`alert-danger`)
        submitStatus.classList.remove(`alert-success`)

        return
    }

    if (state == 'danger') {
        submitStatus.classList.add(`alert-danger`)
        submitStatus.classList.remove(`alert-light`)

        return
    }

    if (state == 'success') {
        submitStatus.innerHTML = formType.value == 'create' ? `Register Created!` : `Register Updated!`
        submitStatus.classList.add(`alert-success`)
        submitStatus.classList.remove(`alert-light`)

        return
    }
}

function formHandler(response) {
    if (response.error) {
        submitStatus.innerHTML = response.error
        formAvailability(true)
        formStatus('danger')
        setTimeout(formStatus, 3000, 'neutral')
    }
    if (response.created || response.updated) {
        formAvailability('finished')
        formStatus('success')
    }
}

function formErrorHandler(error) {
    submitStatus.innerHTML = error
    formAvailability(true)
    formStatus('danger')
    setTimeout(formStatus, 3000, 'neutral')
}

function formSender(event) {

    formAvailability(false)

    let bundle = {}
    bundle.url  = formType.value == 'create' ? `/api/inscription` : `/api/inscription/${formTypeId.value}`,
    bundle.data = {
        terms: document.querySelector('#terms').value,
        name: document.querySelector('#name').value,
        surname: document.querySelector('#surname').value,
        email: document.querySelector('#email').value,
        phone: document.querySelector('#phone').value,
        address: document.querySelector('#address').value,
        terms: document.querySelector('#terms').value
    }

    if (formType.value == 'create') {
        jsonPost(bundle).then((response) => {
            formHandler(response)
        }).catch((error) => {
            formErrorHandler(error)
        })
    }

    if (formType.value == 'update') {
        jsonPut(bundle).then((response) => {
            formHandler(response)
            setTimeout(formAvailability, 3000, true)
            setTimeout(formStatus, 3000, 'neutral')
        }).catch((error) => {
            formErrorHandler(error)
        })
    }

    event.preventDefault()
}


form.addEventListener("submit", formSender)

</script>

<?= $this->view('_common.footer'); ?>