<?php



include_once "../controllers/membership-controller.php";
$data = $_POST['value'];
$membershipController = new MembershipController();
$memberships = $membershipController->searchMembership($data);
// var_dump($memberships);
$count = 1;
$output = "";

foreach($memberships as $membership){

    $output .= "
    <tr id=" . $membership['member_id'].">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" ."GM-" . $membership['member_id'] . "</td>
                                <td class='align-middle'>" . $membership['user_name'] . "</td>
                                <td class='align-middle'>" . $membership['user_address'] . "</td>
                               <td>
                                <a class='btn btn-info mx-1' href='membership-detail.php?id=" . $membership['member_id'] . "'><i class='fa-solid fa-circle-info'></i> Detail</a>
                                <a class='btn btn-success mx-1' href='membership-progress.php?id= " . $membership['member_id'] . "'><i class='fa-solid fa-bars-progress'></i> Progress</a>
                                <a class='btn btn-warning mx-1' href='edit-membership.php?id= " . $membership['member_id'] . "'><i class='fa-solid fa-pen-to-square'></i> Edit</a>
                                <a class='btn btn-danger btnDeleteMembership'><i class='fa-solid fa-trash'></i> Delete</a>
                               </td>
                            </tr>
    ";
   
    
}

echo $output;
?>