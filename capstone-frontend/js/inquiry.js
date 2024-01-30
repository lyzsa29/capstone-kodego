function clientInfo() {
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/api/inquiry",
        data: {
            name: $("#name").val(),
            number: $("#number").val(),
            email: $("#email").val(),
            message: $("#message").val(),
        },
        success: function (response) {
            // Handle success, show modal, etc.
            alert(response.message);
        },
        error: function (error) {
            // Handle error, show modal, etc.
            alert(response.message);
            console.error('Failed to perform user login');
        }
    });
}
