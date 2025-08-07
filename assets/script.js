// Simple confirmation when deleting a book
document.addEventListener("DOMContentLoaded", function () {
    const deleteLinks = document.querySelectorAll("a.delete-link");

    deleteLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            const confirmed = confirm("Are you sure you want to delete this book?");
            if (!confirmed) {
                e.preventDefault(); // cancel the click if not confirmed
            }
        });
    });
});
