<aside class="main-sidebar elevation-4 sidebar-light-teal">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/erstate-icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ER State</span>
      <span class="brand-text font-weight-light text-info">!! {{ Auth::user()->role }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' :''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->role=='project-manager' || Auth::user()->role=='admin')
          <li class="nav-item has-treeview {{ request()->is('project/*') ? ' menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('project/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-project-diagram text-pink"></i>
              <p>
                Project
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allProject') }}" class="nav-link {{ request()->is('project/all-project') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>All Project</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddProject') }}" class="nav-link {{ request()->is('project/add-project') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Create Project</p>
                </a>
              </li>

            </ul>
          </li>
        @endif

          {{-- // product menu  --}}
          @if(Auth::user()->role=='product-manager' || Auth::user()->role=='admin')
          <li class="nav-item has-treeview {{ request()->is('product/*') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('product/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-boxes bg-amber"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allProduct') }}" class="nav-link {{ request()->is('product/all-product') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon bg-amber"></i>
                  <p>All Product</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddProduct') }}" class="nav-link {{ request()->is('product/add-product') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon bg-amber"></i>
                  <p>Create Product</p>
                </a>
              </li>

            </ul>
          </li>
        @endif
          {{-- //end product menu --}}

          {{-- // land owner menu  --}}
          <li class="nav-item has-treeview {{ request()->is('landowner/*') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('landowner/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-chart-area text-danger"></i>
              <p>
                Land Owner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allLandowner') }}" class="nav-link {{ request()->is('/landowner/all-landowner') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>All Land Owner</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddLandowner') }}" class="nav-link {{ request()->is('/landowner/add-landowner') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Create Land Owner</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- //end land owner menu --}}

            {{-- // installment menu  --}}
            <li class="nav-item has-treeview {{ request()->is('installment/*') ? 'menu-open' :''}}">
              <a href="#" class="nav-link {{ request()->is('installment/*') ? 'active' :''}}">
                <i class="nav-icon fas fa-credit-card text-green"></i>
                <p>
                 Land Installment
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/installment/all') }}" class="nav-link {{ request()->is('/installment/all') ? 'active' :''}}">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>All Installment</p>
                  </a>
                </li>
      
                <li class="nav-item">
                  <a href="{{ url('/installment/create') }}" class="nav-link {{ request()->is('/installment/create') ? 'active' :''}}">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Create Installment</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- //end land installment menu --}}


          {{-- // land buy book menu  --}}
          <li class="nav-item has-treeview {{ request()->is('landbuybook/*') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('landbuybook/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-book text-blue"></i>
              <p>
                Land Buy Book
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allLandbuybook') }}" class="nav-link {{ request()->is('/landbuybook/all-landowner') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>All Land Buy Book</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddLandbuybook') }}" class="nav-link {{ request()->is('/landbuybook/add-landbuybook') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Create Land Buy Book</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end land buy book menu --}}

            {{-- // Sell menu  --}}
            @if(Auth::user()->role=='sells-manager' || Auth::user()->role=='admin')
            <li class="nav-item has-treeview {{ request()->is('sales/*') ? ' menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('sales/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-dolly text-green"></i>
              <p>
                Sell
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allSales') }}" class="nav-link {{ request()->is('sales/all-sales') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>All Sell</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddSales') }}" class="nav-link {{ request()->is('sales/add-sales') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Create Sell</p>
                </a>
              </li>

            </ul>
          </li>
        @endif
          {{-- //end Sell menu --}}

          {{-- // Item menu  --}}
          <li class="nav-item has-treeview {{ request()->is('item/*') ? ' menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('item/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-dolly text-pink"></i>
              <p>
                Item
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allItem') }}" class="nav-link {{ request()->is('item/all-item') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>All Item</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddItem') }}" class="nav-link {{ request()->is('item/add-item') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Create Item</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- //end Item menu --}}

            {{-- // Purchase menu  --}}
          @if(Auth::user()->role=='purchage-manager' || Auth::user()->role=='admin')
            <li class="nav-item has-treeview {{ request()->is('requisition/*') ? 'menu-open' :''}}">
              <a href="#" class="nav-link {{ request()->is('requisition/*') ? 'active' :''}}">
                <i class="nav-icon fas fa-shopping-cart text-danger"></i>
                <p>
                  Purchase
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview " style="display: none;">
                <li class="nav-item has-treeview {{ request()->is('requisition/all-requisition') ? 'menu-open' :''}}">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>
                      Requisition
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{ route('allRequisition') }}" class="nav-link {{ request()->is('requisition/all-requisition') ? 'active' :''}}">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p> All Requisition</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('showAddRequisition') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p>Create Requisition</p>
                      </a>
                    </li>
                  </ul>
                </li>

                {{-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>
                      Requisition Details
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{ route('allRequisitionDetails') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p> All Requisition Details</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('showAddRequisitionDetails') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p>create Requisition Details</p>
                      </a>
                    </li>
                  </ul>
                </li> --}}

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>
                      RQN Confirmed
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{ route('allRQNConfirmed') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p> All RQN</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('showAddRQNConfirmed') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p>Create RQN</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>
                      Order
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{ route('allOrder') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p> All Order</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('showAddOrder') }}" class="nav-link">
                        <i class="far fa-dot-circle nav-icon text-danger"></i>
                        <p>create Order</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          @endif
          {{-- //end Purchase menu --}}

          {{-- // Vendor menu  --}}
        @if(Auth::user()->role=='purchage-manager' || Auth::user()->role=='admin')
          <li class="nav-item has-treeview {{ request()->is('vendor/*') ? 'menu-open' :''}}">
          <a href="#" class="nav-link {{ request()->is('vendor/*') ? 'active' :''}}">
            <i class="nav-icon fas fa-industry text-orange"></i>
            <p>
              Vendor
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('allVendor') }}" class="nav-link {{ request()->is('vendor/all-vendor') ? 'active' :''}}">
                <i class="far fa-circle nav-icon text-orange"></i>
                <p>All Vendor</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('showAddVendor') }}" class="nav-link {{ request()->is('vendor/add-vendor') ? 'active' :''}}">
                <i class="far fa-circle nav-icon text-orange"></i>
                <p>Create Vendor</p>
              </a>
            </li>

          </ul>
        </li>
      @endif
        {{-- //end Vendor menu --}}

        {{-- // Employee menu  --}}
      @if(Auth::user()->role=='purchage-manager' || Auth::user()->role=='admin')
        <li class="nav-item has-treeview {{ request()->is('employee/*') ? 'menu-open' :''}}">
          <a href="#" class="nav-link {{ request()->is('employee/*') ? 'active' :''}}">
            <i class="nav-icon fas fa-user-graduate text-red"></i>
            <p>
              Employee
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('allEmployee') }}" class="nav-link {{ request()->is('employee/all-employee') ? 'active' :''}}">
                <i class="far fa-circle nav-icon text-red"></i>
                <p>All Employee</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('showAddEmployee') }}" class="nav-link {{ request()->is('employee/add-employee') ? 'active' :''}}">
                <i class="far fa-circle nav-icon text-red"></i>
                <p>Create Employee</p>
              </a>
            </li>

          </ul>
        </li>
      @endif
        <!-- End Employee menu  -->

           <!--Start Customer menu -->  
          <li class="nav-item has-treeview {{ request()->is('customer/*') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('customer/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-user-tie text-blue"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('allCustomer') }}" class="nav-link {{ request()->is('customer/all-customer') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>All Customer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('showAddCustomer') }}" class="nav-link {{ request()->is('customer/add-customer') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon text-blue"></i>
                  <p>Create Customer</p>
                </a>
              </li>

            </ul>
          </li>
        <!--   end customer menu  -->

          <!-- Start Ledger menu  -->

          @if(Auth::user()->role=='admin' || Auth::user()->role=='accountent')
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar text-purple"></i>
              <p>
                Ledger
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-purple"></i>
                  <p>
                    Type
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{ route('showAddLadger') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-purple"></i>
                      <p> All </p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-purple"></i>
                  <p>
                    Group
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{ route('showAddLadgerGroup') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-purple"></i>
                      <p> All Group</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ledgergroup.create') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-purple"></i>
                      <p>create Group</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-purple"></i>
                  <p>
                    Name
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{ route('showAddLadgerName') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-purple"></i>
                      <p> All Name</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ledgername.create') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-purple"></i>
                      <p>create Name</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
         @endif 
        <!-- End Ledger menu  -->

         <!-- Bank Cash menu  -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-university text-blue-grey "></i>
            <p>
              Bank Cash
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('showAddBank')}}" class="nav-link">
                <i class="far fa-circle nav-icon text-blue-grey "></i>
                <p>All Bank Cash</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('banks.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon text-blue-grey "></i>
                <p>Create Bank Cash</p>
              </a>
            </li>

          </ul>
        </li>
        <!-- end Bank Cash menu  -->

        <!-- Initial Balance menu  --> 
        <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-dollar-sign text-orange"></i>
        <p>
          Initial Balance
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{url('initial/balance/list')}}" class="nav-link">
            <i class="far fa-circle nav-icon text-orange"></i>
            <p>All Inital Balance</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('initial/balance')}}" class="nav-link">
            <i class="far fa-circle nav-icon text-orange"></i>
            <p>Create Inital Balance</p>
          </a>
        </li>
      </ul>
    </li>
<!-- ******** -->
	  <!--  <li class="nav-item has-treeview">
	    <a href="#" class="nav-link">
	      <i class="nav-icon fas fa-dollar-sign text-orange"></i>
	      <p>
	        Project Wise Total Amount
	        <i class="right fas fa-angle-left"></i>
	      </p>
	    </a>
	    <ul class="nav nav-treeview">
	      <li class="nav-item">
	        <a href="{{url('projectwise/total/amount')}}" class="nav-link">
	          <i class="far fa-circle nav-icon text-orange"></i>
	          <p>Show Project Wise Total Amount</p>
	        </a>
	      </li>
	    </ul>
	  </li> -->

    <!-- ****** -->
    <!-- <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-dollar-sign text-orange"></i>
        <p>
          Fund Transaction Form
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{url('transaction/fund')}}" class="nav-link">
            <i class="far fa-circle nav-icon text-orange"></i>
            <p>Transferd Fund</p>
          </a>
        </li>
      </ul>
    </li> -->

    <!--  end Initial Balance menu  -->
     @if(Auth::user()->role=='admin' || Auth::user()->role=='accountent')
      <li class="nav-header" style=" font-size: 15px; ">
        <b><i class="far fa-list-alt nav-icon text-green"></i>&nbsp &nbsp
        Voucher</b>
      </li>

        <li class="nav-item has-treeview {{ request()->is('voucher/credit*') ? 'menu-open' :''}}">
        <a href="#" class="nav-link {{ request()->is('voucher/credit*') ? 'active' :''}}">
          <i class="nav-icon fas fa-credit-card text-blue"></i>
          <p>
            Credit
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('allCreditVoucher') }}" class="nav-link {{ request()->is('voucher/credit/all') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-blue"></i>
              <p>All Credit</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('createCreditVoucher') }}" class="nav-link {{ request()->is('voucher/credit/create') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-blue"></i>
              <p>Create Credit</p>
            </a>
          </li>

        </ul>
      </li>

        <li class="nav-item has-treeview {{ request()->is('voucher/debit*') ? 'menu-open' :''}}">
        <a href="#" class="nav-link {{ request()->is('voucher/debit*') ? 'active' :''}}">
          <i class="nav-icon fas fa-credit-card text-red"></i>
          <p>
            Debit
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('alldebitvoucher') }}" class="nav-link {{ request()->is('voucher/debit/all') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-red"></i>
              <p>All Debit</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('debitvoucher') }}" class="nav-link {{ request()->is('voucher/debit/create') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-red"></i>
              <p>Create Debit</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item has-treeview {{ request()->is('voucher/adjustment*') ? 'menu-open' :''}}">
        <a href="#" class="nav-link {{ request()->is('voucher/adjustment*') ? 'active' :''}}">
          <i class="nav-icon fas fa-credit-card text-blue-grey"></i>
          <p>
            Adjustment
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('allAdjustment') }}" class="nav-link {{ request()->is('voucher/adjustment/all') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-blue-grey"></i>
              <p>All Adjustment</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('createAdjustment') }}" class="nav-link {{ request()->is('voucher/adjustment/create') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-blue-grey"></i>
              <p>Create Adjustment</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item has-treeview {{ request()->is('voucher/journal*') ? 'menu-open' :''}}">
        <a href="#" class="nav-link {{ request()->is('voucher/journal*') ? 'active' :''}}">
          <i class="nav-icon fas fa-credit-card text-orange"></i>
          <p>
            Journal
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('alljournalvoucher') }}" class="nav-link {{ request()->is('voucher/alljournalvoucher') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>All Journal</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('journalvoucher') }}" class="nav-link {{ request()->is('voucher/journalvoucher') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-orange"></i>
              <p>Create Journal</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item has-treeview {{ request()->is('voucher/contra*') ? 'menu-open' :''}}">
        <a href="#" class="nav-link {{ request()->is('voucher/contra*') ? 'active' :''}}">
          <i class="nav-icon fas fa-credit-card text-green"></i>
          <p>
            Contra
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('allContraVoucher') }}" class="nav-link {{ request()->is('voucher/contra/all') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-green"></i>
              <p>All Contra</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('createContraVoucher') }}" class="nav-link {{ request()->is('voucher/contra/create') ? 'active' :''}}">
              <i class="far fa-circle nav-icon text-green"></i>
              <p>Create Contra</p>
            </a>
          </li>

        </ul>
      </li>
    @endif
     @if(Auth::user()->role=='admin' || Auth::user()->role=='accountent' || Auth::user()->role=='sells-manager' || Auth::user()->role=='purchage-manager')
      <li class="nav-header" style=" font-size: 15px; ">
        <b><i class="far fa-file nav-icon text-red"></i>&nbsp &nbsp
        Report</b>
      </li>

           <li class="nav-item has-treeview {{ request()->is('report/*') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('report/*') ? 'active' :''}}">
              <i class="nav-icon fas fa-user-tie text-blue"></i>
              <p>
                Accounts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

<!--             <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon text-blue"></i>
                  <p>Ledger</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{ url('/report/account/trading') }}" class="nav-link {{ request()->is('report/account/trading') ? 'active' :''}}">
                  <i class="far fa-dot-circle nav-icon text-blue"></i>
                  <p> Trading Account</p>
                </a>
              </li>

                   <li class="nav-item">
                    <a href="{{ url('/report/account/balance-sheet') }}" class="nav-link {{ request()->is('report/account/balance-sheet') ? 'active' :''}}">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Balance Sheet</p>
                    </a>
                  </li>
                    <li class="nav-item">
                    <a href="{{ url('/report/account/profit_loss') }}" class="nav-link {{ request()->is('report/account/profit_loss') ? 'active' :''}}">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Profit Or Loss Account</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/report/account/trialbalance') }}" class="nav-link {{ request()->is('report/account/trialbalance') ? 'active' :''}}">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Trial Balance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/report/account/daily/expenditure_summery/sheet') }}" class="nav-link {{ request()->is('report/account/daily/expenditure_summery/sheet') ? 'active' :''}}">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Daily Expenditure Summary</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/report/account/daily/income_summery/sheet')}}" class="nav-link {{ request()->is('report/account/daily/income_summery/sheet') ? 'active' :''}}">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Daily Income Summary</p>
                    </a>
                  </li>
                 <!--  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Cost Of Revenue</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Retained earnings</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Fixed Asset Schedule</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Cash flow</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p> Receive Payment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-blue"></i>
                      <p>Notes</p>
                    </a>
                  </li> -->

            </ul>
          @endif
             @if(Auth::user()->role=='sells-manager' || Auth::user()->role=='admin')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart text-green"></i>
                  <p>
                    Sells
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart text-red"></i>
                  <p>
                    Purchase
                  </p>
                </a>
              </li>

               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list-alt text-warning"></i>
                  <p>
                    General
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-warning"></i>
                      <p> Project</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-warning"></i>
                      <p> Ledger</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-warning"></i>
                      <p> Bank Cash</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-warning"></i>
                      <p> Voucher</p>
                    </a>
                  </li>
                </ul>
              </li>
          </li>
        @endif
          <br>
          <!-- <li class="nav-header"></li> -->

     <!--      End Report menu  -->

         <!--  {{-- // User menu --}} -->
         @if(Auth::user()->role=='admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user text-orange"></i>
              <p>
                System User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('new/system/user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-orange"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('system/user/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-orange"></i>
                  <p>User List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

          {{-- // Role manage menu --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-lock text-red"></i>
              <p>
                Role manage
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>All Role manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Create Role manage</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- // Setting menu --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog text-warning"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>System</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>