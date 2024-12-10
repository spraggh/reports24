
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT tblsubjects.subjectname as sn, 
tblusers.forename as fn,
tblusers.surname as ln
FROM tblpupilstudies
INNER JOIN tblsubjects ON tblsubjects.subjectid=tblpupilstudies.subjectid
INNER JOIN tblusers ON tblusers.userid=tblpupilstudies.userid");
$stmt->execute();
while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo($row["fn"]." ".$row["ln"]." studies ".$row["sn"]."<br>");
}

/*     include_once("connection.php");
    $stmt = $conn->prepare("SELECT * FROM tblpupilstudies");
    $stmt->execute();
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo($row["subjectid"]." ".$row["userid"]);
            $stmt1 = $conn->prepare("SELECT * FROM tblusers WHERE userid=:userid");
            $stmt1->bindParam(':userid', $row["userid"]);
            $stmt1->execute();
            while ($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
            {
                echo($row1["forename"]);
            }
            $stmt2 = $conn->prepare("SELECT * FROM tblsubjects WHERE subjectid=:subjectid");
            $stmt2->bindParam(':subjectid', $row["subjectid"]);
            $stmt2->execute();
            while ($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
            {
                echo($row2["subjectname"]);
            }
            echo("<br>");
        }
 */
    ?>
