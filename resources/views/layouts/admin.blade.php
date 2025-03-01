<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />

	<title>Ticket System</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.7/vue.min.js" integrity="sha512-PhuYrdDBtBeUjY7KTmjRYFFadw8uXXdTmzZyhCHZewYsqZJ0pxFCwU528jRoil42LXMW3ksegQT5zdjkfiR1IA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('dashboard')}}">
					<span class="align-middle">AdminKit</span>
				</a>

				<ul class="sidebar-nav">
					@if(auth()->user()->role =='ADMIN')
					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{ route('dashboard')}}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('department')}}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Department</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('ticket')}}">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Ticket</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('users')}}">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Users</span>
                        </a>
					</li>
					@endif
					@if(auth()->user()->role =='FRONTDESK')
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('create.ticket')}}">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Add Ticket</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('ticket')}}">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Tickets</span>
                        </a>
					</li>
					@endif
					@if(auth()->user()->role =='OFFICER')
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('ticket')}}">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Tickets</span>
                        </a>
					</li>
					@endif
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<div class="d-grid">
							<a href="{{ route('logout')}}" class="btn btn-primary">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('img/avatars/avatar-2.jpg') }}" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('img/avatars/avatar-4.jpg') }}" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('img/avatars/avatar-3.jpg') }}" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								{{-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a> --}}
								{{-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a> --}}
								{{-- <div class="dropdown-divider"></div> --}}
								{{-- <a class="dropdown-item" href="{{ route('dashboard')}}"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a> --}}
								{{-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a> --}}
								<div class="dropdown-divider"></div>
								<a href="{{ route('logout')}}" class="dropdown-item">Logout</a>
								{{-- <a class="dropdown-item" href="#">Log out</a> --}}
							</div>
						</li>
					</ul>
				</div>
			</nav>
            <main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
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
		let adminTicketCreation = new Vue({
			  el: "#addticket",
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
				  }).catch(error => {
					toastr.error(error.data.message);
				  });
				}
			  },
			  mounted() {
				// alert('Hello');
			  },
		});

		let waitList = new Vue({
			  el: "#waitlist",
			  data() {
				return {
				  waitlists: []
				}
			  },
			  methods: {
				waitList(){	
				  axios.get('/waitlists')
				  .then(response => {
					console.log(response);
				  }).catch(error => {
					toastr.error(error.data.message);
				  });
				}
			  },
			  mounted() {
				this.waitList();
			  },
		})
	  </script>
	  <script>
		let ticketCreation = new Vue({
			  el: "#addRemark",
			  data() {
				return {
				  form: {
					name: '',
					email: '',
					phone: '',
					department: '',
					remarks: ''
				  }
				}
			  },
			  methods: {
				submit(){	
				  axios.put(`/view-ticket/${ticket.id}`, this.form)
				  .then(response => {
					this.form.name = '';
					this.form.email = '';
					this.form.phone = '';
					this.form.department = '';
					this.form.remarks = '';
					toastr.success(response.data.message,response.data.title, {timeOut: 20000});
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

</body>

</html>