<!-- This file contains QR of website -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(function(){
        Swal.fire({
            title: "KWYK | City's best to your doorstep",
            text: '#justKWYKit',
            imageUrl: 'https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl=https://www.kwyk.one/en/list',
            imageWidth: 300,
            imageHeight: 300,
            imageAlt: 'Custom image',
            animation: true,
            customClass: {
                popup: 'animated tada'
            }
        })
    });

</script>