<?php  
include('connect.php');
include('header.php');


if(isset($_POST['btnSearch']))
{
    $rdoSearchType=$_POST['rdoSearchType'];
    $AttendanceNo=$_POST['cboAttendanceNo'];
 

    if($rdoSearchType==1) 
    {
        

 

        $Squery="SELECT DISTINCT a.*,ad.StudentID
                 FROM attendance a,attendancedetail ad 
                 WHERE a.AttendanceNo=ad.AttendanceNo
                 AND a.attendanceNo='$AttendanceNo'";
        $result=mysqli_query($connection,$Squery);
    }
    elseif ($rdoSearchType==2) 
    {
        $txtFrom=date('Y-m-d',strtotime($_POST['txtFrom']));
        $txtTo=date('Y-m-d',strtotime($_POST['txtTo']));

 

        $Squery="SELECT DISTINCT a.*,ad.StudentID
                 FROM attendance a,attendancedetail ad 
                 WHERE a.AttendanceNo=ad.AttendanceNo
                 AND a.AttendanceDate BETWEEN '$txtFrom' AND '$txtTo'";
        $result=mysqli_query($connection,$Squery);
    }
    else
    {
        $Squery="SELECT a.*,ad.StudentID
                 FROM attendance a,attendancedetail ad";
        $result=mysqli_query($connection,$Squery);
    }
}
elseif(isset($_POST['btnShowAll']))
{
    $Squery="SELECT DISTINCT a.*,ad.StudentID
            FROM attendance a,attendancedetail ad
            WHERE a.AttendanceNo=ad.AttendanceNo";
    $result=mysqli_query($connection,$Squery);
}
else
{
    $todayDate=date('Y-m-d');

 

    $Squery="SELECT DISTINCT a.*,ad.StudentID
             FROM attendance a,attendancedetail ad
             WHERE a.AttendanceNo=ad.attendanceNo
             AND a.AttendanceDate='$todayDate'";
    $result=mysqli_query($connection,$Squery);
}

 

?>
<form action="attendancereport.php" method="post">

 

<script>
$(document).ready( function () {
    $('#tableid').DataTable();
} );
</script>

 

<fieldset>

 

<table border="1">
<tr>
    <td>
        <input type="radio" name="rdoSearchType" value="1" checked />Search by AttendanceNo
        <br/>
        <select name="cboAttendanceNo">
            <option>Choose Attendance No</option>
            <?php  
            $query="SELECT * FROM attendance";
            $ret=mysqli_query($connection,$query);
            $count=mysqli_num_rows($ret);

 

            for($i=0;$i<$count;$i++) 
            { 
                $arr=mysqli_fetch_array($ret);
                $AttendanceDate=$arr['AttendanceDate'];
                $AttendanceNo=$arr['AttendanceNo'];


 

                echo "<option value='$AttendanceNo'>" . $AttendanceNo . "</option>";
            }

 

            ?>
        </select>
    </td>

 

    <td>
        <input type="radio" name="rdoSearchType" value="2"/>Search by Date
        <br/>
        From:<input type="text" name="txtFrom" value="<?php echo date('Y-m-d') ?>" onFocus="showCalender(calender,this)" />
        To  :<input type="text" name="txtTo" value="<?php echo date('Y-m-d') ?>"   onFocus="showCalender(calender,this)" />
    </td>

 

    <td>
    <br/>
    <input type="submit" name="btnSearch" value="Search"/>
    <input type="submit" name="btnShowAll" value="Show All"/>
    </td>
</tr>
</table>
</fieldset>

 

<fieldset>
<legend>Search Results :</legend>
<?php  
    $count=mysqli_num_rows($result);

 

    if($count==0) 
    {
        echo "<p>No Order Record Found.</p>";
        exit();
    }
    ?>
    <table id="tableid" class="display">
    <thead>
    <tr>
        <th>Attendance No</th>
        <th>AttendanceDate</th>
        <th>TotalPresent</th>
        <th>TotalAbsent</th>
        <th>TotalLeave</th>
        <th>Status</th>

    </tr>
    </thead>
    <tbody>    
    <?php
    for($i=0;$i<$count;$i++) 
    {
        $arr=mysqli_fetch_array($result);
        $AttendanceNo=$arr['AttendanceNo'];
        $AttendanceDate=$arr['AttendanceDate'];
        $TotalPresent=$arr['TotalPresent'];
        $TotalAbsent=$arr['TotalAbsent'];
        $TotalLeave=$arr['TotalLeave'];
        $Status=$arr['Status'];

        echo "<tr>";
            echo "<td>$AttendanceNo</td>";
            echo "<td>" . $arr['AttendanceDate'] . "</td>"; 
            echo "<td>" . $arr['TotalPresent'] . "</td>";
            echo "<td>" . $arr['TotalAbsent'] . "</td>";
            echo "<td>" . $arr['TotalLeave'] . "</td>";
            echo "<td>" . $arr['Status'] . "</td>";
            echo "<td> 
                     
                    <a href='attendancereportdetail.php?AttendanceNo=$AttendanceNo'>Detail</a>
                  </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
    </table>

 

<!--Print Button ___________________________________-->

 

<script>var pfHeaderImgUrl = '';var pfHeaderTagline = 'Order%20Report';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>
<a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-grnw20.png" alt="Print Friendly and PDF"/></a>

 

<!--Print Button ___________________________________-->
</fieldset>
</form>
<?php
include('footer.php')
?>