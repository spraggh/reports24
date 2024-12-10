
<?php
include_once("connection.php");
header('Location: users.php');

array_map("htmlspecialchars", $_POST);
echo $_POST["forename"]; 
print_r($_POST);

$role = $_POST["role"] ?? null;
echo $role;

try {
    $stmt = $conn->prepare(
        "INSERT INTO tblpupilstudies (subjectid, userid, classposition, classgrade, exammark, comment) 
         VALUES (:subjectid, :userid, :classposition, :classgrade, :exammark, :comment)"
    );
    $stmt->bindParam(':subjectid', $_POST["subjectid"]);
    $stmt->bindParam(':userid', $_POST["userid"]);
    $stmt->bindParam(':classposition', $_POST["classposition"]);
    $stmt->bindParam(':classgrade', $_POST["classgrade"]);
    $stmt->bindParam(':exammark', $_POST["exammark"]);
    $stmt->bindParam(':comment', $_POST["comment"]);

   
    $stmt->execute();
    echo "Data inserted successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>