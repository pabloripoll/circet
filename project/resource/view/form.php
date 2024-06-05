<?= $this->view('_common.head'); ?>

<?= $this->view('_common.header', ['page' => $page]); ?>

<div class="py-5 text-center">
    <h2>Register Page</h2>
    <p class="lead">
        Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be
        triggered by attempting to submit the form without completing it.
    </p>
</div>
<div class="row g-5">
    <div class="col-md-12">
        <h4 class="mb-3">Inscription Form</h4>
        <form id="inscription" class="needs-validation" onsubmit="return false" novalidate>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">First name</label>
                    <input type="text" class="form-control" id="name" value="" placeholder="" required>
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>
                <div class="col-sm-6">
                    <label for="surname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="surname" placeholder="" value="" required>
                    <div class="invalid-feedback">Valid last name is required.</div>
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label">Phone <span class="text-body-secondary">(Optional)</span></label>
                    <input type="phone" class="form-control" id="phone" placeholder="+34 555 555 555">
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">Please enter your shipping address.</div>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terms" value="false">
                <label class="form-check-label" for="terms">I agreed with with <a href="#">"Terms of Use"</a></label>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Confirm and Send</button>
        </form>
    </div>
</div>

<script>
function captureFormFields(event) {

    let bundle = {}
    bundle.url  = `/api/inscription`,
    bundle.data = {
        name: document.querySelector('#name').value,
        surname: document.querySelector('#surname').value,
        email: document.querySelector('#email').value,
        phone: document.querySelector('#phone').value,
        address: document.querySelector('#address').value,
        terms: document.querySelector('#terms').value
    }

    jsonPost(bundle).then((response) => {


        console.log(response)
    })

    event.preventDefault()
}

const form = document.getElementById("inscription")
form.addEventListener("submit", captureFormFields)

</script>

<?= $this->view('_common.footer'); ?>