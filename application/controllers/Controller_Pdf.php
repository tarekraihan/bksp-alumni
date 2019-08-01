<?php 

class Doc extends Admin_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->library('pdf'); // Load library
    $this->pdf->fontpath = 'assets/font/'; // Specify font folder
     //$this->load->database('select_model');
  }
  public function attendance_report()
  {
      $user_id=$_POST["employee_name"];
      if($user_id==0)
      {
          redirect('en/attendance_report_pdf/error');
      }else
      {

              if(isset($_POST["employee_name"]) && isset($_POST['byDate'])){

                  $start_date=date("Y-m-d",strtotime($_POST["Start_Date"]));

                  $end_date=date("Y-m-d",strtotime($_POST["End_Date"]));
                  $query="SELECT b.user_id,b.full_name,a.attendance_id,a.entry_date,a.entry_time,a.exit_time,a.remarks,a.attendance_day,a.entry_meridiem,a.exit_meridiem  FROM `attendance` AS a INNER JOIN `user` AS b ON a.user_id=b.user_id WHERE (a.user_id='$user_id' OR a.special_day_id <> '0') AND a.entry_date BETWEEN '$start_date' AND '$end_date' ORDER BY  a.entry_date ASC";
                  $result=mysql_query($query);
                  $q="SELECT a.user_id, a.full_name, b.designation from user as a inner join designation as b on a.designation_id=b.designation_id where a.user_id='$user_id'";
                  $result1=mysql_query($q);
                  $data1=mysql_fetch_array($result1);
                  // Generate PDF by saying hello to the world
                  $this->pdf->AddPage();
                  $this->pdf->AliasNbPages();

                  $this->pdf->SetFont('Times','B',15);
                  $this->pdf->SetFillColor(192,192,192);

                  $this->pdf->Cell(0,10,'Employee Attendance Report',0,1,'C',1);
                  $this->pdf->SetFont('Times','I',12);
                  $this->pdf->Cell(130,10,'',0,0);
                  $date = date('d-m-Y');
                  $this->pdf->Cell(50,10,'Date : '.$date,0,1,'R');
                  $this->pdf->SetFont('Times','B',12);
                  $this->pdf->Cell(0,10,'Employee Name : '.$data1[1].' ('.$data1[2].')',1,1,'C',1);
                  $this->pdf->Cell(30,10,'Date ',1,0,'C');
                  $this->pdf->Cell(30,10,' Day ',1,0,'C');
                  $this->pdf->Cell(25,10,'Entry Time ',1,0,'C');
                  $this->pdf->Cell(25,10,'Exit Time',1,0,'C');
                  $this->pdf->Cell(70,10,'Remarks ',1,1,'C');
                  $this->pdf->SetFont('Times','',12);
                  //$query="Select * from user";

                  while($data=mysql_fetch_array($result))
                  {
                      $entry_date=date('d-m-Y',strtotime($data[3]));
                      $this->pdf->Cell(30,10,$entry_date,1,0,'C');
                      $this->pdf->Cell(30,10,$data[7],1,0,'C');
                      $this->pdf->Cell(25,10,$data[4].' '.$data["entry_meridiem"],1,0,'C');
                      $this->pdf->Cell(25,10,$data[5].' '.$data["exit_meridiem"],1,0,'C');
                      $this->pdf->Cell(70,10,$data[6],1,1,'C');
                  }

                  $this->pdf->SetFont('Times','I',12);
                  $this->pdf->Cell(0,10,'',0,1);

                  $this->pdf->Cell(0,10,'N. B: This is a system generated report and requires no signature.',0,1,'C',0);

                  $this->pdf->Output($data1[1].'_Attendance_Report.pdf','D');


              }
              if(isset($_POST["employee_name"]) && !isset($_POST['byDate'])){

                  $query="SELECT b.user_id,b.full_name,a.attendance_id,a.entry_date,a.entry_time,a.exit_time,a.remarks,a.attendance_day,a.entry_meridiem,a.exit_meridiem FROM `attendance` AS a INNER JOIN `user` AS b ON a.user_id=b.user_id WHERE (a.user_id='$user_id' OR a.special_day_id <> '0') ORDER BY a.entry_date ASC";
                  $result=mysql_query($query);
                  $q="SELECT a.user_id, a.full_name, b.designation from user as a inner join designation as b on a.designation_id=b.designation_id where a.user_id='$user_id'";
                  $result1=mysql_query($q);
                  $data1=mysql_fetch_array($result1);
                  // Generate PDF by saying hello to the world
                  $this->pdf->AddPage();
                  $this->pdf->AliasNbPages();

                  $this->pdf->SetFont('Times','B',15);
                  $this->pdf->SetFillColor(192,192,192);

                  $this->pdf->Cell(0,10,'Employee Attendance Report',0,1,'C',1);
                  $this->pdf->SetFont('Times','I',12);
                  $this->pdf->Cell(130,10,'',0,0);
                  $date = date('d-m-Y');
                  $this->pdf->Cell(50,10,'Date : '.$date,0,1,'R');
                  $this->pdf->SetFont('Times','B',12);
                  $this->pdf->Cell(0,10,'Employee Name : '.$data1[1].' ('.$data1[2].')',1,1,'C',1);
                  $this->pdf->Cell(30,10,'Date ',1,0,'C');
                  $this->pdf->Cell(30,10,' Day ',1,0,'C');
                  $this->pdf->Cell(25,10,'Entry Time ',1,0,'C');
                  $this->pdf->Cell(25,10,'Exit Time',1,0,'C');
                  $this->pdf->Cell(70,10,'Remarks ',1,1,'C');
                  $this->pdf->SetFont('Times','',12);


                  while($data=mysql_fetch_array($result))
                  {
                      $entry_date=date('d-m-Y',strtotime($data[3]));
                      $this->pdf->Cell(30,10,$entry_date,1,0,'C');
                      $this->pdf->Cell(30,10,$data[7],1,0,'C');
                      $this->pdf->Cell(25,10,$data[4].' '.$data["entry_meridiem"],1,0,'C');
                      $this->pdf->Cell(25,10,$data[5].' '.$data["exit_meridiem"],1,0,'C');
                      $this->pdf->Cell(70,10,$data[6],1,1,'C');
                  }
                  $this->pdf->SetFont('Times','I',12);
                  $this->pdf->Cell(0,10,'',0,1);

                  $this->pdf->Cell(0,10,'N. B: This is a system generated report and requires no signature.',0,1,'C',0);

                  $this->pdf->Output($data1[1].'_Attendance_Report.pdf','D');

              }


      }

  }

    public function employee_profile()
    {
        $user_id=$_POST["employee_name"];
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();

        $this->pdf->SetFont('Times','B',15);
        $this->pdf->SetFillColor(192,192,192);


        $this->pdf->Output();
    }
}
?>