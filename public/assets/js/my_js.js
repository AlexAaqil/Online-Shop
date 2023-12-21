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



function dropDown(clickedButton) {
    // Get the corresponding dropdown list
    var list = clickedButton.nextElementSibling;

    // Close any open dropdown lists except the current one
    document.querySelectorAll(".dropdown_list").forEach(function (otherList) {
        if (otherList !== list) {
            otherList.classList.remove("active");
        }
    });

    // Toggle the "active" class on the clicked dropdown list
    list.classList.toggle("active");
    // Toggle the "clicked" class on the clicked button
    clickedButton.classList.toggle("clicked");
}




function showConfirmationDialog(message, onConfirm) {
    Swal.fire({
        title: "Are you sure?",
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete!",
    }).then((result) => {
        if (result.isConfirmed) {
            onConfirm();
        }
    });
}


// For forms: deleteItem(itemId, itemName);
// For links: deleteItem(itemId, itemName, url);

function deleteItem(itemId, itemName, url = null) {
    const message = `This ${itemName} will be deleted permanently!`;

    // Choose the appropriate confirmation action based on the presence of a URL
    const confirmAction = url
        ? () => (window.location.href = url)
        : () => {
              const formId = `deleteForm_${itemId}`;
              document.getElementById(formId).submit();
          };

    showConfirmationDialog(message, confirmAction);
}



// AJAX Image Sorting
// $(document).ready(function() {
//     $("#sortable").sortable({
//         update : function(event, ui) {
//             var photo_id = new Array();
//             $('.sortable_images').each(function() {
//                 var id = $(this).attr('id');
//                 photo_id.push(id);
//             });

//             $.ajax({
//                 type : "POST",
//                 url : "{{ url('admin/products/product_images_sort') }}",
//                 data : {
//                     "photo_id" : photo_id,
//                     "_token" : "{{ csrf_token() }}"
//                 },
//                 dataType : "json",
//                 success : function(data) {

//                 },
//                 error : function (data) {

//                 }
//             });
//         }
//     });
// });
