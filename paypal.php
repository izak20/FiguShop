<?php require 'layout/navbar.php' ?>

<script src="https://www.paypal.com/sdk/js?client-id=AV5ds9tzC7T_OIyF09FSGLNzBFWH-QcbVE_8bWvYeBsp5bK21ghDIxScyMGFtb3hIACmEv3fz9v8XeKV"></script>

<div id="paypal-button-container"></div>

<script>
    paypal.Buttons({
        style:{
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions){
            return actions.order.create({
                purchase_units: [{
                    amount:{
                        value: 100
                    }
                }]
            });
        },

        onApprove: function(data, actions){
            actions.order.capture().then(function(detalles){
                console.log(detalles);
            });
        },

        onCancel: function(data) {
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>

<?php require 'layout/footer.php' ?>


</body>
</html>