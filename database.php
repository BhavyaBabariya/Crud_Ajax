<?php
require 'dbcon.php';
if ($_POST['action'] == 'fetchUser') {
    if (isset($_POST['start'])) {
        $start = $_POST['start'];       
    } else {
        $start = 0 ;
    }

    $limit = 2;
     ?>
   
        <?php
        require 'dbcon.php'; 
        $count_query = "SELECT count(*) as allcount FROM student";
        $count_result = mysqli_query($connection,$count_query);
        $count_fetch = mysqli_fetch_array($count_result);
        $postCount = $count_fetch['allcount'];
        $limit = 2;
            $query = "SELECT * FROM student LIMIT ".($start*$limit).",".$limit;
              //$query = "SELECT * FROM student";
            $query_run = mysqli_query($connection, $query);
            // if(mysqli_num_rows ($query_run)>0)
            if($query_run->num_rows > 0)
            {
                // foreach($query_run as $student)
                while($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
    <tbody>
    <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['gender'] ?></td>
    <td><?= $row['phone'] ?></td>
    <td>
        <button type="button" onclick="" class="btn btn-info">View</a>
        <button type="button" value="<?=  $row['id']; ?>" class="editStudentBtn btn btn-success">Edit</button>
        <button type="button"  onclick="deleteUsers(<?=  $row['id']; ?>)" class="btn btn-danger">Delete</button>
    </td>
</tr>    
    </tbody>
    
        <?php
        "</table>";
                }
                
            }
        ?>
    </tbody>
     
<?php
  die;
}


if( $_POST['action'] == 'deleteUser'){
 
    $student_id = $_POST['student_id'];
    $query = "DELETE FROM `student` WHERE id = $student_id";
    $query_run = mysqli_query($connection,$query);
   
}

// if ($_POST['update_student']) {
//     $student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
//     $name = mysqli_real_escape_string($connection, $_POST['name']);
//     $email = mysqli_real_escape_string($connection, $_POST['email']);
//     $gender = mysqli_real_escape_string($connection, $_POST['gender']);
//     $phone = mysqli_real_escape_string($connection, $_POST['phone']);


//     if($name == NULL || $email == NULL || $gender == NULL || $phone == NULL ){
//         $res = [
//             'status' => 422,
//             'message' => 'All fields are required'
//         ];
//         echo json_encode($res);
//         return false;
//     }

//     $query = "UPDATE student SET name='$name',email='$email',gender='$gender',phone='$phone' 
//               WHERE id = '$student_id'";
//     $query_run = mysqli_query($connection,$query);

//     if($query_run){
//         $res = [
//             'status' => 200,
//             'message' => 'Student updated Successfully'
//         ];
//         echo json_encode($res);
//         return false;
//     }else{
//     $res = [
//         'status' => 500,
//         'message' => 'Student not updated'
//     ];
//     echo json_encode($res);
//     return false;
// }
// }
// Add User
    
if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);


    if($name == NULL || $email == NULL || $gender == NULL || $phone == NULL ){
        $res = [
            'status' => 422,
            'message' => 'All fields are required'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO student(name,email,gender,phone) VALUES('$name','$email','$gender','$phone')";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        $res = [
            'status' => 200,
            'message' => 'Student created Successfully'
        ];
        echo json_encode($res);
        return false;
    }else{
    $res = [
        'status' => 500,
        'message' => 'Student not Created'
    ];
    echo json_encode($res);
    return false;
}
}



//Update User

// if(isset($_GET['student_id'])){
//     $student_id = mysqli_real_escape_string($connection,$_GET['student_id']);

//     $query = "SELECT * FROM student WHERE id = '$student_id'";
//     $query_run = mysqli_query($connection,$query);

//     if(mysqli_num_rows($query_run)==1)
//     {
//         $student = mysqli_fetch_array($query_run);

//         $res = [
//             'status' => 200,
//             'message' => 'Student fetch Successfully',
//             'data' => $student
//         ];
//         echo json_encode($res);
//         return false;
//     }
//     }else{
//         $res = [
//             'status' => 404,
//             'message' => 'Student id not found'
//         ];
//         echo json_encode($res);
//         return false;
//     }
  

?>