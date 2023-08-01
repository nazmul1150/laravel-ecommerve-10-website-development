<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{route('admin.dashboard')}}">
				<img src="{{asset('admin/vendors/images/deskapp-logo.svg')}}" alt="" class="dark-logo">
				<img src="{{asset('admin/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="{{route('admin.dashboard')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="{{route('admin.homepage')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-book-1"></span><span class="mtext">Home Page</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="{{route('admin.sliderhomepage')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-image"></span><span class="mtext">Slider Home</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Product</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('admin.product.category')}}">Category</a></li>
							<li><a href="{{route('admin.product.subcategory')}}">Sub Category</a></li>
							<li><a href="{{route('admin.brand')}}">Brand</a></li>
							<li><a href="{{route('admin.product')}}">Product Items</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="{{route('admin.coupon')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-image"></span><span class="mtext">Coupons</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Orders</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('admin.order')}}">New Order</a></li>
							<li><a href="{{route('admin.order.panding')}}">Pending Order</a></li>
							<li><a href="{{route('admin.order.delivery')}}">Delivery Order</a></li>
							<li><a href="{{route('admin.order.cancel')}}">Cancel Order</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="{{route('admin.setting')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-image"></span><span class="mtext">Setting</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="{{route('admin.contact')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-image"></span><span class="mtext">Contact</span>
						</a>
					</li>
					
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Tables</span>
						</a>
						<ul class="submenu">
							<li><a href="basic-table.html">Basic Tables</a></li>
							<li><a href="datatable.html">DataTables</a></li>
						</ul>
					</li>
					<li>
						<a href="calendar.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Calendar</span>
						</a>
					</li> -->

					
				</ul>
			</div>
		</div>
	</div>