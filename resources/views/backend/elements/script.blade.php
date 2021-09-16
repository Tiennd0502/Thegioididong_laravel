<!-- jQuery -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- select2 -->
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
<!-- Sweetalert2 -->
<script type="text/javascript" src="{{ asset('js/plugins/sweetAlerts/sweetalert2.min.js') }}"></script>
<!-- my js -->
<script type="text/javascript" src="{{ asset('js/js-admin.js') }}"></script>

@if($current_page == 'dashboard')
  {{-- Peity chart --}}
  <script src="{{ asset('libs/peity/jquery.peity.min.js')}}"></script>
  {{-- C3 chart --}}
  <script src="{{ asset('libs/d3/d3.min.js')}}"></script>
  <script src="{{ asset('libs/c3/c3.min.js')}}"></script>
  <script src="{{ asset('libs/jquery-knob/jquery.knob.min.js')}}"></script>

  <script src="{{ asset('js/plugins/dashboard.init.js') }}"></script>
@endif