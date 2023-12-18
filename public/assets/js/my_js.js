function searchFunction() {
    // Get the input value
    var input = document.getElementById("myInput");
    var filter = input.value.toUpperCase();

    // Get all elements with the class name "item"
    var items = document.getElementsByClassName("searchable");

    // Loop through all items and hide those that don't match the search query
    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var text = item.textContent || item.innerText;

        if (text.toUpperCase().indexOf(filter) > -1) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    }
}


// function deleteAdmin() {
//     if (confirm("Are you sure you want to delete this admin?")) {
//         document.getElementById("deleteForm").submit();
//     }
// }


function showConfirmationDialog(message, onConfirm) {
    Swal.fire({
        title: "Are you sure?",
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, proceed!",
    }).then((result) => {
        if (result.isConfirmed) {
            onConfirm();
        }
    });
}

function deleteItem(itemId, itemName) {
    const message = `You'll delete this ${itemName} permanently!`;

    // Callback function to handle deletion
    function confirmDelete() {
        const formId = `deleteForm_${itemId}`;
        document.getElementById(formId).submit();
    }

    // Show the confirmation dialog with the specified message and callback function
    showConfirmationDialog(message, confirmDelete);
}

