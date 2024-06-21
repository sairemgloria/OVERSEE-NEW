function confirmDeleteAdmin(event, id) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag (navigation)

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, navigate to the delete script with the ID parameter
            window.location.href = `./includes/delete_admin_profile.php?q=${id}`;
        }
    });
}

function confirmDeleteEmployee(event, id) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag (navigation)

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, navigate to the delete script with the ID parameter
            window.location.href = `./includes/delete_employee_profile.php?q=${id}`;
        }
    });
}

function confirmDeleteDepartment(event, id) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag (navigation)

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, navigate to the delete script with the ID parameter
            window.location.href = `./includes/delete_department_profile.php?q=${id}`;
        }
    });
}

function confirmDeleteRole(event, id) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag (navigation)

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, navigate to the delete script with the ID parameter
            window.location.href = `./includes/delete_role_profile.php?q=${id}`;
        }
    });
}