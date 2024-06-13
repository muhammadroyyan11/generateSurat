document.addEventListener("DOMContentLoaded", function () {
    // Your code here
    let batchingPlantSelect = document.getElementById("batchingPlantSelect");
    let otherBatchingPlantInput = document.getElementById("otherBatchingPlantInput");

    batchingPlantSelect.addEventListener("change", function () {
        if (batchingPlantSelect.value === "other") {
            otherBatchingPlantInput.style.display = "block";
        } else {
            otherBatchingPlantInput.style.display = "none";
        }
    });

    let methodPaymentSelect = document.getElementById("methodPaymentSelect");
    let otherMethodPaymentInput = document.getElementById("otherMethodPaymentInput");

    methodPaymentSelect.addEventListener("change", function () {
        if (methodPaymentSelect.value === "other") {
            otherMethodPaymentInput.style.display = "block";
        } else {
            otherMethodPaymentInput.style.display = "none";
        }
    });
});
