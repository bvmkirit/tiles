@extends('main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{totalUsers('customer')}}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Customers</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{totalUsers('manufacturer')}}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Manufacturers</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{totalUsers('dealer')}}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Dealers</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{totalUsers('retailer')}}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Retailers</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{totalUsers('wholesaler')}}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total WholeSalers</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{totalUsers('transporter')}}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Transporters</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{ totalProducts() }}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Products</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{ totalOrders() }}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card card-custom gutter-b" style="height: 150px">
                    <div class="card-body">
				<span class="svg-icon svg-icon-3x svg-icon-success">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"></polygon>
						<path
                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
						<path
                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                            fill="#000000" fill-rule="nonzero"></path>
						</g>
					</svg>
                </span>
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3"> ₹ {{ totalOrders(true) }}</div>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Total Revenue</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
