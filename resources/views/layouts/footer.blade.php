
<script src="{{ asset('assets/js/jquery-3.4.0.min.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#a-submit').click(function () {
            $('#s-form').submit();
        });
    });
</script>

</body>
</html>