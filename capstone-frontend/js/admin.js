$(document).ready(function() {
    // Load inquiry data on page load
    fetchInquiries();

    // Reload button event listener
    $("#reloadbutton").click(function() {
        fetchInquiries(); // Reload inquiry data
    });
});



function fetchInquiries() {

  $.ajax({
      type: "GET",
      url: "http://127.0.0.1:8000/api/inquiries",
      dataType: 'json',
      success: function (response) {
          
          console.log(response.data); 
          $("#inquiryTable tbody").empty();
          // Create a table row for each inquiry
          response.data.forEach(function(inquiry) {
              var newRow = "<tr><td>" + inquiry.created_at + "</td><td>" + inquiry.name + "</td><td>" + inquiry.number + "</td><td>" + inquiry.email + "</td><td>" + inquiry.message + "</td></td>" + "<td><button class='action-button reply-button' data-email='" + inquiry.email + "'>REPLY</button><i class='fas fa-sync-alt reload-icon'></i></td></tr>";;
              $("#inquiryTable tbody").append(newRow);
          });

          $('.reply-button').click(function() {
            var recipientEmail = $(this).data('email');
            composeEmail(recipientEmail);
          });
      },
      error: function (error) {
          console.error('Error: ' + error.statusText);
        
      }
  });
}

function composeEmail(recipientEmail) {
    
    window.location.href = "mailto:" + recipientEmail;
  }



let menuicn = document.querySelector(".menuicn"); 
let nav = document.querySelector(".navcontainer"); 
  
menuicn.addEventListener("click", () => { 
    nav.classList.toggle("navclose"); 
})