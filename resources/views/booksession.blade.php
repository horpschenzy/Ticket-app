<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Ticket System</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.7/vue.min.js" integrity="sha512-PhuYrdDBtBeUjY7KTmjRYFFadw8uXXdTmzZyhCHZewYsqZJ0pxFCwU528jRoil42LXMW3ksegQT5zdjkfiR1IA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .container {
        max-width: 960px;
    }
    </style>
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Checkout form</h2>
      <p class="lead">Welcome to Ticket System. Kindly provide the following details to proceed</p>
    </div>

    <div class="row g-5" id="ticket">
      <div class="col-md-2 col-lg-2"></div>
      <div class="col-md-8 col-lg-8">
        <h4 class="mb-3">Book A Session</h4>
        <form @submit.prevent="submit" method="POST" class="needs-validation">
            @csrf
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Full Name</label>
              <input type="text" v-model="form.name" class="form-control" id="name" placeholder="" value="" required>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" v-model="form.email" class="form-control" id="email" placeholder="you@example.com" required>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" v-model="form.phone" id="address" placeholder="+234-1234" required>
              <div class="invalid-feedback">
                Please enter your Phone Number.
              </div>
            </div>

            <div class="col-12">
              <label for="country" class="form-label">Department</label>
              <select class="form-select" v-model="form.department" id="country" required>
                @forelse($departments as $d)
                <option value="{{$d->id}}">{{$d->name}}</option>
                @empty
                <option value="">No departments yet</option>
                @endforelse
              </select>
              <div class="invalid-feedback">
                Please select a Department.
              </div>
            </div>
          </div>


          {{-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div> --}}

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
        </form>
      </div>
      <div class="col-md-2 col-lg-2"></div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2022 Ticket System</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/toastr.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
  <script>
    let ticketCreation = new Vue({
          el: "#ticket",
          data() {
            return {
              form: {
                name: '',
                email: '',
                phone: '',
                department: ''
              }
            }
          },
          methods: {
            submit(){
              axios.post("/create/ticket", this.form)
              .then(response => {
                this.form.name = '';
                this.form.email = '';
                this.form.phone = '';
                this.form.department = '';
                toastr.success(response.data.message,response.data.title, {timeOut: 20000});
                setTimeout(() => {
                  window.location = '/'
                }, 5000);
              }).catch(error => {
                toastr.error(error.data.message);
              });
            }
          },
          mounted() {
            // alert('Hello');
          },
    })
  </script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif
    </script>
    {{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script> --}}
  </body>
</html>
