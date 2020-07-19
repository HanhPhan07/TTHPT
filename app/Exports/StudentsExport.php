<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
//, WithMultipleSheets
class StudentsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents 
{

    use Exportable;
    
    // public function __construct(string $id_school)
    // {
    //     $this->id_school = $id_school;
    // }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        // $student=Student::whereYear('created_at',date('Y'));
        // dd($student->schoolList()->school()->value('name')->get());

        foreach (Student::whereYear('created_at',date('Y'))
                        ->with('schoolList')
                        ->with('examSubject')
                        ->get() 
                        as $row => $value) {
            $student[] = array(
                '0' => $row + 1,
                '1' => $value->username,
                '2' => $value->password,
                '3' => $value->fullname,
                '4' => $value->cmnd,
                '5' => $value->date_of_birth->format('d/m/Y'),
                '6' => $value->gender,
                '7' => $value->nation,
                //'8' => $value->schoolList,
                '8' => $value->address,
                //'10'=> $value->examSubject->name,
                '9' => $value->created_at->format('d/m/Y H:m:s'),
            );
        }

        return (collect($student));
    }

    public function headings() :array {
    	return ["STT", "Mã đăng nhập", "Mật khẩu", "Họ và tên", "CMND", "Ngày sinh", "Giới tính","Dân tộc", "Địa chỉ","Ngày tạo"];
    }

    // public function sheets(): array
    // {
    //     $sheets = [];

    //     foreach ($this->id_school as $key =>$value) {
    //         $name="ahihi";
    //         $sheets[] = new StudentSchoolSheet($this->id_school, $name);
    //     }
    //     return $sheets;
    // }

    public function registerEvents(): array
    {
        $normal_style = array('font' => array('name' => 'Calibri','size' => 12));

        return [
            BeforeSheet::class  => function(BeforeSheet $event)  use($normal_style) {
                
            },

            AfterSheet::class    => function(AfterSheet $event) use($normal_style) {
                $styleArrayheading = [
                    'font'=>[
                        'bold'=>'true'
                    ],
                    'alignment' => array(
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    )
                    
                ];
                $event->sheet->getDelegate()->getStyle('A1:L1')->applyFromArray($styleArrayheading);
                
                $styleArray = array(
                    'borders' => array(
                        'outline' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => array('argb' => '000000'),
                        ),
                    ),
                );
                
                // $event->sheet->getDelegate()->mergeCells('A1:L1');

                // $event->sheet->getDelegate()->row(1, function ($row) {
                //     $row->setFontFamily('Comic Sans MS');
                //     $row->setFontSize(30);
                // });

                // $event->sheet->getDelegate()->row(1, array('Some big header here'));

                // // second row styling and writing content
                // $event->sheet->getDelegate()->row(2, function ($row) {

                //     // call cell manipulation methods
                //     $row->getDelegate()->setFontFamily('Comic Sans MS');
                //     $row->getDelegate()->setFontSize(15);
                //     $row->getDelegate()->setFontWeight('bold');

                // });

                //  $event->$sheet->row(2, array('Something else here'));

        // // getting data to display - in my case only one record
        // $event->$users = User::get()->toArray();

        // // setting column names for data - you can of course set it manually
        // $sheet->appendRow(array_keys($users[0])); // column names

        // // getting last row number (the one we already filled and setting it to bold
        // $sheet->row($sheet->getHighestRow(), function ($row) {
        //     $row->setFontWeight('bold');
        // });
                //$worksheet->getParent()->getDefaultStyle()->applyFromArray($styleArray);
                //$event->sheet->applyFromArray($styleArray);
            },
        ];
    }

    

}