<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use framework\Registry as Registry;
use framework\RequestMethods as RequestMethods;

class Academics extends Controller {
 	/**
 	*
 	* @before _secure
 	*/
    public function index() {

        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $this->authorize();

        
        echo file_exists(APP_PATH."/application/controllers/uni-logo.jpg") ? "yes" : "no";
     }

     /**
    *
    * @before _secure
    */
    public function Exam() {

        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $this->authorize();
     }
     /**
    *
    * @before _secure
    */
    public function tDirectory() {
        
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $this->authorize();

        if (RequestMethods::get("action")=="start_letter") {
                $sl = RequestMethods::get("char");
                $tclist = Employee::all(array("name  LIKE ?"=>"{$sl}%"));
                if($tclist){
                $view->set("tclist", $tclist);
                $view->set("query", true);
                }
                else{
                    $view->set("nf", true);}
                }
            
        else{
            $teachers = Employee::all();
            $view->set("teachers", $teachers);
        }
        
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }
    /**
    *
    * @before _secure
    */
    public function studentProfile() {
        
        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $this->authorize();

        $courselist = Course::all();

        if (RequestMethods::post("action")=="list") {
            $branch = RequestMethods::post("branch");
            $sem = RequestMethods::post("semester");

            $studentlist = StudentDetail::all(array("branch_id = ?" =>$branch));
            if($studentlist){
                $view->set("list_found", true);
                $view->set("studentlist", $studentlist);

            }
            else{
                $view->set("fail", true);
            }
        }

        //view profile by post method

        if(RequestMethods::post("action")=="search_enroll"){
            $enroll = trim(RequestMethods::post("enrollment"));
            $student = Student::first(array("enrollment_no = ?"=>$enroll));
            if($student){
                $studentdetail = StudentDetail::first(array("student_id = ?" => $student->id));
                $guardian = Guardian::first(array("student_id =?" =>$student->id));
                $branch = Branch::first(array("id = ?" =>$studentdetail->branch_id));
                $course = Course::first(array("id = ?" => $branch->course_id));
                $marks = Mark::all(array("student_id = ?"=>$student->id), array("*"), "id", "asc", 100, 1);
                $sem = SemResult::all(array("student_id = ?"=>$student->id));
                $view->set("found", true);
                $view->set("sem", $sem);
                $view->set("marks", $marks);
                $view->set("branch", $branch);
                $view->set("course", $course);
                $view->set("student", $student);
                $view->set("guardian", $guardian);
                $view->set("studentdetail", $studentdetail);
            }
            else{
                $view->set("fail", true);
            }
        }
        $branches = Branch::all();
        $view->set("branches", $branches);
        $view->set("courselist", $courselist);
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }


    /**
    *
    * @before _secure
    */
    public function updatenotice() {

        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $this->authorize();
    }

    /**
    *
    * @before _secure
    */
    public function exportCenter() {

        $this->changeLayout();
        $this->seo(array("title" => "Admin Panel","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $this->authorize();

        if(RequestMethods::post("action")=="xlsexport"){
            $branch = RequestMethods::post("branch_id");
            $bname = Branch::first(array("id = ?"=>$branch));
            $sd = StudentDetail::all(array("branch_id =?"=>$branch));
            if($sd)
            {
                $file = new PHPExcel();
                $file->setActiveSheetIndex(0)
            ->setCellValue('A1', "Name")
            ->setCellValue('B1', "Email ID")
            ->setCellValue('C1',"Mobile NO.")
            ->setCellValue('D1', "ID Card NO.");

            $file->getActiveSheet()->getColumnDimension('A')->setWidth(25);
            $file->getActiveSheet()->getColumnDimension('B')->setWidth(25);
            $file->getActiveSheet()->getColumnDimension('C')->setWidth(25);
            $file->getActiveSheet()->getColumnDimension('D')->setWidth(25);

            $file->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                $file->getActiveSheet()->getStyle('A1:D1')->getFill()->getStartColor()->setARGB('29bb04');
                
                $i =2;
                foreach ($sd as $sdsingle) {
                    $student = Student::first(array("id = ?"=>$sdsingle->student_id));
            $file->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $student->name)
            ->setCellValue('B'.$i, $student->email)
            ->setCellValue('C'.$i, $student->phone)
            ->setCellValue('D'.$i, $student->enrollment_no);
            $i++;
                }
                $this->export($file, "student semester wise list", "ece_student" );

            }else{
                $view->set("expfailed", "No data to be exported");
            }
        }
        
     }

    public function changeLayout() {
        $this->defaultLayout = "layouts/academics";
        $this->setLayout();
        }

    public function authorize(){
        $admin = Administrator::first(array("employee_id = ?" => $this->user->id));
        if ($admin->department != "academics")
        {
            $alert = "Tried to access un authorized department";
            $user = Employee::first(array("id = ?" => $this->user->id));
            $user->warning = $alert;
            $user->save();
            self::redirect("/admin/" . $admin->department);
        }
        else{
            return true;
        }
    }

    protected function export($arg, $title, $filename){
        $creator = $this->user;
        $arg->getProperties()->setCreator($creator->name)->setLastModifiedBy($creator->email)->SetTitle($title)->setSubject("Subject")->setDescription("This is a test File being created to check how php excell is working")->setKeywords("Export, Data, Academics, Sudent")->setCategory("Data Export");            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $arg->setActiveSheetIndex(0);
            //header and footer
            $arg->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
            $arg->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $arg->getProperties()->getTitle() . '&RPage &P of &N');


            // Set page orientation and size
            $arg->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            $arg->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
            //
            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename={$filename}.xlsx");
            header("Cache-Control: max-age=0");
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');
            // If you're serving to IE over SSL, then the following may be needed
            header ('Expires: Mon, 05 Sept 1992 04:00:00 GMT+05:30'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0
            $objWriter = PHPExcel_IOFactory::createWriter($arg, 'Excel2007');
            $objWriter->save("php://output");


    }

}