<?php

/**
*
*@author Meraj AHmad Siddiqui
*
*manages export of Excell  files
*/

class ExcelExport{

	public function index(){
		        //Test PHP

        $excell = new PHPExcel();

        $excell->setActiveSheetIndex(0)
            ->setCellValue('A1', "Name")
            ->setCellValue('B1', "Email ID")
            ->setCellValue('C1',"Mobile NO.")
            ->setCellValue('D1', "ID Card NO.");

for ($i=2; $i<10 ; $i++) { 
    # code...
$excell->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $user->name)
            ->setCellValue('B'.$i, $user->email)
            ->setCellValue('C'.$i, $user->phone)
            ->setCellValue('D'.$i, $user->id_card_no);

}

// Rename worksheet
$excell->getActiveSheet()->setTitle('Worksheet1');
$excell->getActiveSheet()->getProtection()->setSheet(true);

	}

	private function export($arg, $title, $filename){
		$creator = $this->user;
           $$arg->getProperties()->setCreator($creator->name)->setLastModifiedBy($creator->id_card_no)->SetTitle($title)->setSubject("Subject")->setDescription("This is a test File being created to check how php excell is working")->setKeywords("Export, Data, Academics, Sudent")->setCategory("Data Export");

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$arg->setActiveSheetIndex(0);
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename={$filename}.xlsx");
			header("Cache-Control: max-age=0");
			$objWriter = PHPExcel_IOFactory::createWriter($arg, 'Excel2007');
			$objWriter->save("php://output");

	}
}
?>