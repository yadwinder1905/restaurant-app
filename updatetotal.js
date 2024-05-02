<script>
    document.addEventListener("DOMContentLoaded", function () {

        function updateTotal() {
            let total = 0;
            const cartItems = document.querySelectorAll('.cart-item');
            cartItems.forEach(item => {
                const price = parseFloat(item.querySelector('.item-price').innerText.replace('$', ''));
                const quantity = parseInt(item.querySelector('.item-quantity').value);
                const itemTotal = price * quantity;
                total += itemTotal;
            });
            document.getElementById('totalPrice').innerText = '$' + total.toFixed(2);

            sessionStorage.setItem('totalAmount', total.toFixed(2));
        }

                const quantityInputs = document.querySelectorAll('.item-quantity');
                quantityInputs.forEach(input => {
        input.addEventListener('change', updateTotal);
                });

    updateTotal();
            });
</script>