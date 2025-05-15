function selectPayment(method) {
    document.getElementById('selectedMethod').value = method; // Set selected method in hidden input
    document.getElementById('selectedPayment').textContent = method; // Display selected method to the user
}
