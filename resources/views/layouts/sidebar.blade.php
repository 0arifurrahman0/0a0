<aside class="sidebar-wrapper navbar-default">
	<div class="text-center pd15">
		<img src="{{ asset('images/avatar')}}/{{ Auth::user()->avatar }}" class="avatar" alt="{{ Auth::user()->name }}"> <br>

	    <h5 class="text-success">{{ Auth::user()->name }}</h5>
	</div>
	<nav class="sidebar-menu" role="navigation">
		<ul>

			<li>
				<a href="#" class="btn-primary">
					<i class="fa fa-dashboard" aria-hidden="true"></i>
					<span>Dashboard</span>
				</a>
			</li>
			
			{{-- Products menu --}}
			<li>
				<a class="btn-primary" href="{{ url('product') }}">
					<i class="fa fa-product-hunt" aria-hidden="true"></i>
					Products
				</a>
			</li>

			{{-- People menu --}}
			<li class="dropdown">
				<a class="dropdown-toggle btn-primary" href="#" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-users" aria-hidden="true"></i>
					Peoples
					<i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-top:3px;"></i>
				</a>
				<ul class="dropdown-menu" role="menu">
					{{-- Supplier menu --}}
					<li class=" dropdown">
						<a href="{{ url('supplier') }}" class="btn-primary">
							<i class="fa fa-user-o" aria-hidden="true"></i>
							<span>Suppliers</span>
						</a>
					</li>
					{{-- Customer menu --}}
					<li class=" dropdown">
						<a href="{{ url('customer') }}" class="btn-primary">
							<i class="fa fa-handshake-o" aria-hidden="true"></i>
							<span>Customers</span>
						</a>
					</li>
					
					{{--Employee--}}
					<li class=" dropdown">
						<a href="{{ url('employee') }}" class="btn-primary">
							<i class="fa fa-male" aria-hidden="true"></i>
							<span>Employees</span>
						</a>
					</li>								
				</ul>
			</li>			
			
			{{-- Accounts menu --}}
			<li class="dropdown">
				<a class="dropdown-toggle btn-primary" href="#" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-money" aria-hidden="true"></i>
					Accounts
					<i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-top:3px;"></i>
				</a>
				<ul class="dropdown-menu" role="menu">
					{{-- Income menu --}}
					<li class=" dropdown">
						<a href="{{ url('income') }}" class="btn-primary">
							<i class="fa fa-usd" aria-hidden="true"></i>
							<span>Incomes</span>
						</a>
					</li>

					{{-- Expense menu --}}
					<li class=" dropdown">
						<a href="{{ url('expense') }}" class="btn-primary">
							<i class="fa fa-bomb" aria-hidden="true"></i>
							<span>Expenses</span>
						</a>
					</li>
					{{-- Invoice Items --}}
					{{-- <li class=" dropdown">
						<a href="{{ url('invoice') }}" class="btn-primary">
							<i class="fa fa-keyboard-o" aria-hidden="true"></i>
							<span>Invoices</span>
						</a>
					</li>	 --}}

					{{-- Warehouse Items --}}
					<li class=" dropdown">
						<a href="{{ url('warehouse') }}" class="btn-primary">
							<i class="fa fa-keyboard-o" aria-hidden="true"></i>
							<span>Warehouse</span>
						</a>
					</li>	
				</ul>
			</li>
			
			{{-- Category menu --}}
			<li class="dropdown">
				<a class="dropdown-toggle btn-primary" href="#" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-th" aria-hidden="true"></i>
					Category
					<i class="fa fa-angle-down pull-right" aria-hidden="true" style="margin-top:3px;"></i>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ url('category') }}">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
							Categories
						</a>
					</li>
					<li>
						<a href="{{ url('subcategory') }}">
							<i class="fa fa-angle-double-down" aria-hidden="true"></i>
							Sub Categories
						</a>
					</li>										
				</ul>
			</li>		
			
			{{-- Purchase menu --}}
			<li class=" dropdown">
				<a href="{{ url('purchase') }}" class="btn-primary">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					<span>Purchases</span>
				</a>
			</li>

			{{-- Sales menu --}}
			<li class=" dropdown">
				<a href="{{ url('sale') }}" class="btn-primary">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<span>Sales</span>
				</a>
			</li>		
		</ul>
	</nav>
</aside>