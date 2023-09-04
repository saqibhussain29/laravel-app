<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

  .navbar {
    background-color: #f8f9fa; /* Customize the background color */
    padding: 10px; /* Adjust the padding as desired */
  }

  .navbar-brand {
    font-weight: bold; /* Customize the font weight */
    color:#333 ; /* Customize the text color */
  }

  .navbar-nav .nav-link {
    color: #333; /* Customize the text color of the links */
  }

  .navbar-nav .nav-item.active .nav-link {
    font-weight: bold; /* Customize the font weight of the active link */


    
  }
  .corner-button {
      position: absolute;

      right: 10px;
    }
    .custom-button {
  background-color: whitesmoke; /* Set the background color */
  color: #fff; /* Set the text color */
  border: none; /* Remove the border */
  padding: 5px 5px; /* Add padding to the button */

  
}
 .btn-close{
       background-color: transparent;
       border: 0;
       font-size: 10px;
       position: absolute;
       right :31px;
       top :700px;


    }
 
    .open {
        display: block !important;
    }
 
    /* Style for the confirmation modal */
    .confirmation-modal {
        background-color: #ffffff;
        border-radius: 5px;
        max-width: 400px;
        margin: auto;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Style for the buttons in the modal */
    .confirmation-modal button {
        margin-top: 10px;
    }

    /* Style for the cancel button */
    .confirmation-modal .cancel-btn {
        background-color: #ddd;
        color: #333;
    }

    /* Style for the delete button */
    .confirmation-modal .delete-btn {
        background-color: #e74c3c;
        color: #fff;
    }
    .btn-close{
       background-color: transparent;
       border: 0;
       font-size: 10px;
       position: absolute;
       right :31px;
       top :700px;


    }
 
    .open {
        display: block !important;
    }
</style>


</head>
<body>