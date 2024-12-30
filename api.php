<?php  
    $conn = mysqli_connect("localhost", "root", "", "project245");

    // 1	id Primary	int(11)			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
	// 2	fname	varchar(100)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	// 3	lname	varchar(100)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	// 4	email	varchar(150)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	// 5	password	varchar(120)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	// 6	image	varchar(100)	utf8mb4_general_ci		Yes	NULL			Change Change	Drop Drop	
	// 7	mobile	varchar(20)	utf8mb4_general_ci		Yes	NULL			Change Change	Drop Drop	
	// 8	gender	enum('Male', 'Female', 'Others', '')	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	// 9	address_line_1	varchar(100)	utf8mb4_general_ci		Yes	NULL			Change Change	Drop Drop	
	// 10	address_line_2	varchar(100)	utf8mb4_general_ci		Yes	NULL			Change Change	Drop Drop	
	// 11	city	varchar(100)	utf8mb4_general_ci		Yes	NULL			Change Change	Drop Drop	
	// 12	zip	varchar(50)	utf8mb4_general_ci		Yes	NULL			Change Change	Drop Drop	
	// 13	role	enum('user', 'admin', '', '')	utf8mb4_general_ci		No	user			Change Change	Drop Drop	
	// 14	created_at	timestamp			No	current_timestamp()			Change Change	Drop Drop

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($rows);
    }

?>