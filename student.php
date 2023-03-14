<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title></title>
</head>

<body>

    <!-- Add Student -->
    <div class="modal fade" id="StudentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveStudent">
                    <div class="modal-body">
                        <div class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Gender</label>
                            <select name="gender">
                                <option value="Male" class="form-control">Male</option>
                                <option value="Female" class="form-control">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Student</button>
                    </div>
                </form>
            </div>
        </div>



        <!-- Edit Modal -->
        <!-- <div class="modal fade" id="StudentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateStudent">
                            <div class="modal-body">
                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                <input type="hidden" name="student_id" id="student_id">

                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="Male" class="form-control">Male</option>
                                        <option value="Female" class="form-control">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                </div>
            </div>
        </div> -->




        <!-- <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateStudent">
      <div class="modal-body">
        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

        <input type="text" id="student_id" name="student_id">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Gender</label>
            <select name="gender" id="gender">
            <option value="Male"  class="form-control">Male</option>
            <option value="Female" class="form-control">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Student</button>
      </div>
      </form>
    </div>
  </div> -->


    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Php Ajax crud operation
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#StudentAddModal">
                                Add Student
                            </button>
                        </h4>
                        
 
  
   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
var start = 0;
    $(document).ready(function() {
 
        fetchUsers(0);
    });

    function loadMore(){
        start++;
        fetchUsers(start)
    }
    function fetchUsers(start) {
        $.ajax({
            type: "POST",
            data: {
                'action': 'fetchUser',
                'start': start
            },
            url: "database.php",
            success: function(response) {
              //  $('#user_listing').html(response);
                $('#myTable').append(response);
                //$('#data').append(response);
            }
        })
    }

    
    function deleteUsers(student_id){
      $.ajax({
        type: "POST",
        data: {
          'action':'deleteUser',
          'student_id':student_id,
        },
        url: "database.php",
        success: function(response){   
          fetchUsers();
        }
      });
    }


    $(document).on('submit', '#saveStudent', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_student", true);
        $.ajax({
            type: "POST",
            url: "database.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessage').addClass('d-none');
                    $('#StudentAddModal').modal('hide');
                    $('#saveStudent')[0].reset();
                    fetchUsers();
                   $('#myTable').load(location.href + " #myTable");
                }
            }
        });
    });

    $(document).on('click', '.editStudentBtn', function() {
        var student_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "database.php?student_id=" + student_id,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    alert(res.message);
                } else if (res.status == 200) {
                    $('#student_id').val(res.data.id);
                    $('#name').val(res.data.name);
                    $('#email').val(res.data.email);
                    $('#gender').val(res.data.gender);
                    $('#phone').val(res.data.phone);

                    $('#StudentEditModal').modal('show');
                }
            }
        });
    });

    // $(document).on('submit', '#updateStudent', function(e) {
    //     e.preventDefault();

    //     var formData = new FormData(this);
    //     formData.append("update_student", true);
    //     $.ajax({
    //         type: "POST",
    //         url: "database.php",
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function(response) {
    //             var res = jQuery.parseJSON(response);
    //             if (res.status == 422) {
    //                 $('#errorMessageUpdate').removeClass('d-none');
    //                 $('#errorMessageUpdate').text(res.message);
    //             } else if (res.status == 200) {
    //                 $('#errorMessageUpdate').addClass('d-none');
    //                 $('#StudentAddModal').modal('hide');
    //                 $('#saveStudent')[0].reset();

    //                 $('#myTable').load(location.href + " #myTable");
    //             }
    //         }
    //     });
    // });
    </script>
   <table id="myTable" class="table table-bordered table-dtriped">
 <div class="loadmore" onclick="loadMore();">
 
      <input type="button" id="loadBtn" value="Load More" class="btn btn-success">
      <input type="hidden" id="row" value="0">
      <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
    </div>
                <tr>
                    <td><b>Id</td>
                    <td><b>Name</td>
                    <td><b>Email</td>
                    <td><b>Gender</td>
                    <td><b>Phone</td>
                    <td><b>Action</td>
                </tr>
                 
</body>

</html>