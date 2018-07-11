@include("layouts.head")
<body class="fixed-nav sticky-footer color-lateral" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="mainNav">
    <a class="navbar-brand text-white" href="registro_datos">@lang("vista.name_company")</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" style="background-color: #e3f2fd;" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="@lang('vista.first_item_dashboard')">
           <a class="nav-link text-dark" href="registro_datos">
             <i class="fa fa-edit"></i>
             <span class="nav-link-text">@lang("vista.first_item_dashboard")</span>
           </a>
         </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="@lang('vista.second_item_dashboard')">
            <a class="nav-link text-dark" href="register_lots">
              <i class="fa fa-coffee"></i>
              <span class="nav-link-text">@lang("vista.second_item_dashboard")</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="@lang('vista.three_item_dashboard')">
             <a class="nav-link text-dark" href="process_lots">
               <i class="fa fa-tasks"></i>
               <span class="nav-link-text">@lang("vista.three_item_dashboard")</span>
             </a>
           </li>
      </ul>

      <ul class="navbar-nav sidenav-toggler bg-info text-white">
        <li class="nav-item ">
          <a class="nav-link text-center " id="sidenavToggler">
            <i class="fa fa-angle-double-right"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>@lang("vista.logout")</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
   @yield("content")
    </div>
  </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © @lang("vista.name_company") 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang("vista.title_logout")</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">@lang("vista.message_logout")</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">@lang("vista.cancel")</button>
            <a class="btn btn-info" href="/">@lang("vista.logout")</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  @include("layouts.footer")
