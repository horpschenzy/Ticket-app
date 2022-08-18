<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Ticket System</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font.css') }}" rel="stylesheet">
	<script src="{{ asset('js/vue.min.js') }}"> </script>
	<script src="{{ asset('js/axios.min.js') }}"> </script>
  
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
    .blink_me {
      animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
    </style>
  </head>
  <body class="bg-light">
    
<div class="row">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Wait List</h2>
      <p class="lead">Welcome to Ticket System. Kindly check for your details below</p>
    </div>
    <div class="row" style="max-width: 140%; margin-right: -250px " id="waitlist">
      <div class="col-2" v-for="department in departments">
        <table class="table table-stripped" >
          <thead>
            <tr>
              <th scope="col" style="font-size: 15px">@{{department.name}}</th>
            </tr>
          </thead>
          <tbody>
              
            <tr v-for="(ticket, index) in department.ticket">
                <td class="blink_me" v-if="index == 0" v-show="ticket.department_id == department.id" style="font-size: 22px; color:red; width:100%">@{{ ticket.ticket_no }}</td>
                <td v-else v-show="ticket.department_id == department.id" style="font-size: 20px; width:100%">@{{ ticket.ticket_no }}</td>
            </tr>
          </tbody>
        </table>
      </div>
        
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
<script>
  let waitList = new Vue({
			  el: "#waitlist",
			  data() {
				return {
            waitlists: [],
            departments: [],
            departmentIds: JSON.parse("{{$departmentIds}}")
          }
			  },
			  methods: {
				waitList(){	
				  axios.post('/waitlists', {"department_ids":this.departmentIds})
				  .then(response => {
            this.departments = response.data.departments;
            this.waitlists = response.data.data;
				  }).catch(error => {
					toastr.error(error.data.message);
				  });
				}
			  },
        mounted: function () {
          console.log();
            this.$nextTick(function () {
                window.setInterval(() => {
                    this.waitList();
                },3000);
            })
        }
		})
</script>
{{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="form-validation.js"></script> --}}
</body>
</html>