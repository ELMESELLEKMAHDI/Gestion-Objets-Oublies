
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(function () {
        $('#adminMenuBtn').on('click', function (e) {
            e.preventDefault();
            $('#adminSidebar').toggleClass('mobile-open');
            $('#adminOverlay').toggleClass('mobile-open');
        });
        $('#adminOverlay').on('click', function () {
            $('#adminSidebar').removeClass('mobile-open');
            $('#adminOverlay').removeClass('mobile-open');
        });
    });
</script>
</body>
</html>
