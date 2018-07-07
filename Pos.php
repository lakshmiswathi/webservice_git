<?php
/* 
A domain Class to demonstrate RESTful web services
*/
//require_once('config.php');
Class Pos
{
    function db_connect()
    {
        static $con;
        $con = @mysqli_connect('localhost', 'baappay_baapadmi', 'dl&qu7PV8qy[', 'baappay_baapadmin');
        if (!$con) {
            echo "Error: " . mysqli_connect_error();
            exit();
        }
        return $con;
    }
   
   public function loginEmployee($username, $pswd)
    {
        if ((!empty($username)) && (!empty($pswd))) {
            $connection = @mysqli_connect('localhost', 'baappay_baapadmi', 'dl&qu7PV8qy[', 'baappay_baapadmin');
            if (!$connection) {
                echo "Error: " . mysqli_connect_error();
                exit();
            }
             $password = md5($pswd);
              $sql      = "select username, person_id from `phppos_employees` where  username = '" . $username . "' AND password ='" . $password . "' ";
            if ($result = mysqli_query($connection, $sql)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows($result);
                if ($rowcount == 1) {
                    while ($row = mysqli_fetch_array($result)) {
                        $data = array(
                            'username' => $row['username'],
                            'person_id' => $row['person_id']
                        );
                    }
                }
                else{
	            	$data = array(
	                'status' => '0',
	                'msg' => 'User or Password is wrong'
	            );
            }
                $json = $data;
            }
           
        } else {
            $json = array(
                'status' => '0',
                'msg' => 'User ID not define'
            );
        }
        return $json;
    }
   
   
	 
}
?>