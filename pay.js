<script>
    document.addEventListener("DOMContentLoaded", function () {
                    // Retrieve total amount from sessionStorage
                    var totalAmount = parseFloat(sessionStorage.getItem('totalAmount'));

    // Display the total amount in the summary
    const totalAmountElement = document.getElementById("totalAmount");
    totalAmountElement.textContent = "$" + totalAmount.toFixed(2);
                });

</script>