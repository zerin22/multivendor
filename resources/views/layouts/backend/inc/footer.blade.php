@stack('modal')

<footer class="main-footer font-xs">
    <div class="row pb-30 pt-15">
        <div class="col-sm-6">
            <script>
                document.write(new Date().getFullYear());
            </script>
            &copy; Nest - HTML Ecommerce Template .
        </div>
        <div class="col-sm-6">
            <div class="text-sm-end">All rights reserved</div>
        </div>
    </div>
</footer>
</main>
<script src="{{ asset('backend') }}/assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/vendors/select2.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/vendors/perfect-scrollbar.js"></script>
<script src="{{ asset('backend') }}/assets/js/vendors/jquery.fullscreen.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/vendors/chart.js"></script>
<!-- Main Script -->
<script src="{{ asset('backend') }}/assets/js/main.js?v=1.1" type="text/javascript"></script>
<script src="{{ asset('backend') }}/assets/js/custom-chart.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> --}}

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

    @if (Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}")
    </script>
    @endif

    @if (Session::has('fail'))
    <script>
        toastr.error("{!! Session::get('fail') !!}")
    </script>
    @endif

    {{-- Bootstarp Form Validation --}}
    {{-- <script>
        (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script> --}}

@yield('script')
